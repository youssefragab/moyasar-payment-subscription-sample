@extends('plan::layouts.master')

@section('content')
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Pricing</h1>
    </div>

    <div class="container">
      <div class="card-deck mb-3 text-center">
        <div class="row">
            
            @foreach($plans as $plan)
                @include('plan::layouts.UI.plan', ['plan' => $plan])
            @endforeach

        </div>
      </div>
    </div>
@endsection
