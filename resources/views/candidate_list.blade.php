@extends('layouts.main')

@section('activity')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Candidates List
                </div>
                <div class="card-body">
                    {{-- Content --}}
                    <table class="table table-bordered" id="user_table">
                        <thead>
                            <tr>
                                <th width="15%">Candidate's Image</th>
                                <th width="20%">Name</th>
                                <th width="65%">Manisfesto</th>
                            </tr>
                            @foreach ($candidates as $candidate)
                            <tr>
                                <td><img class="card-img-top" src="{{url('image/'.$candidate->image)}}"
                                        alt="{{$candidate->image}}"></td>
                                <td>{{$candidate->name}}</td>
                                <td>{{$candidate->manifesto}}</td>
                            </tr> @endforeach
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection