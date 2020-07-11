<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MyVote') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
    @yield('javascript')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    @yield('css')

    <style>
        .vertical-center {
            min-height: 100%;
            min-width: 100%;
            /* Fallback for browsers do NOT support vh unit */
            min-height: 100vh;
            /* These two lines are counted as one :-)       */

            display: flex;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="vertical-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-10">
                    <div class="card border-primary">
                        <div class=" card-header border-primary">Waiting for Approval</div>

                        <div class="card-body">
                            <p>
                                Your account is waiting for our administrator approval.
                            </p>
                            <p>
                                Please check back later.
                            </p>


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" ">
                                    @csrf
                                    <button type=" submit" class="btn btn-primary">Logout</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- <div class="jumbotron vertical-center">
        <!-- 
        ^--- Added class  -->
        <div class="container">
            ...asdasdad
        </div>
    </div> --}}
</body>

</html>