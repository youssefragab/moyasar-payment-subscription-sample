    <div class="col-lg-4">
        <div class="card mb-4 box-shadow">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">{{$plan->name}}</h4>
        </div>
        <div class="card-body">
            <h1 class="card-title pricing-card-title">SAR {{$plan->price}} <small class="text-muted">/ mo</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
                <li>Feature 1</li>
                <li>Feature 2</li>
                <li>Feature 3</li>
                <li>Feature 4</li>
            </ul>
         
            @if(auth()->user())

                @if(auth()->user()->subscribedTo($plan->id))
                    <div class="subscribed">
                        <p>Current Plan</p>
                        <p>Valid until: {{auth()->user()->currentSubscription()->end_date}}</p>
                    </div>
                @else
                    <button data-name="{{$plan->name}}" data-amount="{{$plan->price}}" data-id="{{$plan->id}}" type="button" class="btn btn-lg btn-block btn-outline-primary subscribe">Subscribe</button>
                @endif

            @else
                <button data-name="{{$plan->name}}" data-amount="{{$plan->price}}" data-id="{{$plan->id}}" type="button" class="btn btn-lg btn-block btn-outline-primary subscribe">Subscribe</button>
            @endif            
        </div>
        </div>
    </div>