@extends('layouts.main')
@section('activity')
<div class="card text-center">
    <h4 class="card-header">
        {{$election->election_title}}
    </h4>
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-8">
                {!! $chart->container() !!}
                {!! $chart->script() !!}
            </div>
        </div>
        <div class="row pt-2 justify-content-center">
            <div class="col-sm-6 pt-2 pt-sm-0">
                <h5 class="card-text">Start Date and Time</h5>
                <p class="card-text">{{$election->start_date}}</p>
            </div>
            <div class="col-sm-6 pt-5 pt-sm-0">
                <h5 class="card-text">End Date and Time</h5>
                <p class="card-text">{{$election->end_date}}</p>
            </div>
        </div>
        <hr>
        <div class="row pt-2 justify-content-md-center">

            <div class="col-sm-4">
                <h5 class="card-text">Time Remaining</h5>
                <div class="container text-center countdowntimer">
                    <li class="li"
                        style="display: inline-block; list-style-type: none; padding: 0.5em; text-transform: uppercase;">
                        <span id="expired" style="display: block;"></span></li>
                    <ul>
                        <li class="li"
                            style="display: inline-block; list-style-type: none; padding: 0.5em; text-transform: uppercase;">
                            <span id="days" style="display: block;"></span>days</li>
                        <li class="li"
                            style="display: inline-block; list-style-type: none; padding: 0.5em; text-transform: uppercase;">
                            <span id="hours" style="display: block;"></span>Hours</li>
                        <li class="li"
                            style="display: inline-block; list-style-type: none; padding: 0.7em; text-transform: uppercase;">
                            <span id="minutes" style="display: block;"></span>Minutes</li>
                        <li class="li"
                            style="display: inline-block; list-style-type: none; padding: 0.5em; text-transform: uppercase;">
                            <span id="seconds" style="display: block;"></span>Seconds</li>
                    </ul>
                </div>
            </div>
        </div>

        <hr>
        <div class="py-4">
            <h5 class="card-text">Description</h5>
            <p class="card-text">{{$election->election_description}}</p>
        </div>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Candidate Name</th>
                    <th scope="col">Vote Count</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($election->candidates as $candidate)
                <tr>
                    <td>{{$candidate->name}}</td>
                    <td>{{$vote_data->where('user_id', $candidate->id)->count()}}</td>
                    @if (!$vote_data->contains('votedByID', Auth::user()->id))
                    <td><button type="button" class="btn btn-primary" id="vote_confirmation"
                            data-id="{{$candidate->id}}" data-name="{{$candidate->name}}" data-toggle="modal"
                            data-target="#vote_candidate">Vote</button>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="vote_candidate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Election</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to vote <span id="candidate_name"></span> ?</p>
            </div>
            <div class="modal-footer">
                <form action="{{route('vote.store')}}" method="POST">
                    <input type="hidden" name="candidate_id" id="candidate_id" value="">
                    <input type="hidden" name="election_id" value="{{$election->id}}">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Vote</button>
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
{{-- @endsection

@section('javascript') --}}
<script defer>
    $(document).on("click", "#vote_confirmation", function () {
        let candidate_id = $(this).data('id');
        let candidate_name = $(this).data('name');
        $(".modal-body #candidate_name").text( candidate_name );
        $(".modal-footer #candidate_id").val( candidate_id );
    });

    const second = 1000;
    const minute = second * 60;
    const hour = minute * 60;
    const day = hour * 24;

    let countDownDateTime = {{ strtotime("$election->end_date") }} * 1000;

    let timer = setInterval(function(){
        let now = new Date().getTime();
        let timeInterval = countDownDateTime - now;

        document.getElementById('days').innerText = Math.floor(timeInterval / day);
        document.getElementById('hours').innerText = Math.floor((timeInterval % day) / hour);
        document.getElementById('minutes').innerText = Math.floor((timeInterval % hour) / minute);
        document.getElementById('seconds').innerText = Math.floor((timeInterval % minute) / second);

        if (timeInterval<0){
            clearInterval(timer);
            document.getElementById('expired').innerText = "THE VOTING HAS EXPIRED";
            document.getElementById('days').innerText = '-';
            document.getElementById('hours').innerText = '-';
            document.getElementById('minutes').innerText = '-';
            document.getElementById('seconds').innerText = '-';
            document.getElementById('vote_confirmation').remove();
        }
    },1000);
</script>
@endsection