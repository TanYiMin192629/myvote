@extends('layouts.main')

@section('activity')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Voter List
                </div>

                <div class="card-body">
                    <div class="col-sm-5">
                        {{-- Content --}}
                        @foreach ($voters as $voter)
                        <p>{{$voter->name}}</p>
                        <img class="card-img-top" src="{{url('image/'.$voter->image)}}" alt="{{$voter->image}}">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection