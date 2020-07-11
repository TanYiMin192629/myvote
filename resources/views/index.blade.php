@extends('layouts.main')
<style>
    /* * {
        box-sizing: border-box;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
    } */

    /* Float four columns side by side */
    /* .column {
        margin-bottom: 20px;
        float: left;
        width: 25%;
        padding: 0 10px;
    } */

    /* Remove extra left and right margins, due to padding */
    /* .row {
        margin: 0 -5px;
    } */

    /* Clear floats after the columns */
    /* .row:after {
        content: "";
        display: table;
        clear: both;
    } */

    /* Responsive columns */
    /* @media screen and (max-width: 600px) {
        .column {
            width: 100%;
            display: block;
            margin-bottom: 20px;
        }
    } */

    /* Style the counter cards */
    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        padding: 16px;
        text-align: center;
        background-color: #f1f1f1;
    }

    .countdown li {
        display: inline-block;
        text-align: left;
        font-size: 0.5em;
        list-style-type: none;
        text-transform: uppercase;
    }

    .countdown li span {
        display: block;
        font-size: 0.5rem;
    }
</style>
@section('activity')
<div class="container main " style="float: right; ">
    <div class="row">
        <div class="col" style="text-align: center;">
            <h1>Election Available</h1><br><br>
        </div>
    </div>

    <div class="row">

        @foreach ($elections as $key => $election)
        <div class="col-md-4 col-lg-3">
            <div class="card text-white bg-dark countdown">
                <div class="card-header">
                    <h1 class="card-title">{{$election->election_title}}</h1>
                </div>
                <div class="card-body">
                    <p class="card-text">Start Date :</p>
                    <p class="card-text" id="d_{{ $key }}">{{$election->start_date}}</p>
                    <p class="card-text">End Date :</p>
                    <p class="card-text" id="b_{{ $key }}">{{$election->end_date}}</p>
                    Time remaining (DD:HH:MM:SS)
                    <p class="li"><span id="days{{ $key }}"></span></p>
                    <p id="print_{{ $key }}"></p>
                    <button type="button" class="btn btn-primary" id="button{{ $key }}"
                        onclick="window.location.href='{{route('election.show',['election' => $election->id])}}'">Participate</button>
                </div>

                <script>
                    const second = 1000;
                    const minute = second * 60;
                    const hour = minute * 60;
                    const day = hour * 24;
                    const button = document.getElementById('button');


                    function myFunction(a, c, f, j) {

                        let timer = setInterval(function() {

                            let now = new Date().getTime();
                            let dt = new Date(c).getTime();
                            let timeInterval = dt - now;

                            document.getElementById(j).innerText = Math.floor(timeInterval / day) + ":" +
                                Math.floor((timeInterval % day) / hour) + ":" + Math.floor((timeInterval % hour) / minute) +
                                ":" + Math.floor((timeInterval % minute) / second);

                            if (timeInterval < 0) {
                                document.getElementById(f).disabled = true;
                                document.getElementById(f).innerHTML = "Expired";
                                document.getElementById(f).style.background = '#D1383D';
                                document.getElementById(f).style.border = '#D1383D';
                                document.getElementById(a).innerHTML = "Status : Expired";
                                document.getElementById(j).remove();
                            } else {
                                document.getElementById(a).innerHTML = "Status : Available";
                            }

                        }, 1000);
                    }
                </script>
                <script>
                    myFunction("print_{{ $key }}", document.getElementById('b_{{ $key }}').innerHTML, "button{{ $key }}", "days{{ $key }}");
                </script>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection