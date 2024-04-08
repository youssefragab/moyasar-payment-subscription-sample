@extends('plan::layouts.master')
@section('content')

<section class="verify">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if($status == "success")
                    <div class="alert alert-success" role="alert">
                        Subscription verified successfully
                    </div>
                @else
                    <div class="alert alert-danger" role="alert">
                        Subscription failed, try again with different payment method
                    </div>
                @endif
                <a href="/" class="btn btn-primary">Back to home</a>
            </div>
        </div>
    </div>
</section>

@endsection