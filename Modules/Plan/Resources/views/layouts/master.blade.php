<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Moyasar Subscription</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://cdn.moyasar.com/mpf/1.13.0/moyasar.css" />

        <script src="https://cdn.moyasar.com/mpf/1.13.0/moyasar.js"></script>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="/css/custom.css" rel="stylesheet">
    </head>
    <body>


        <input type="hidden" id="is-auth" value="{{auth()->user() ? 'true' : 'false'}}">

        <input type="hidden" id="moyasar-key" value="{{env('MOYASAR_PUBLISH_API_KEY')}}">
        <input type="hidden" id="moyasar-redirect-url" value="{{url('/')}}/subscription/payment">
        
        @include('plan::layouts.ui.login')

        @include('plan::layouts.ui.moyasar')

        @include('plan::layouts.ui.header')

        @yield('content')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="/js/login.js"></script>
        <script src="/js/subscribe.js"></script>
    </body>
</html>
