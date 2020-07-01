@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row flex">
    <div class="col-md-3 col-xl-2 ">

      <nav class="navbar navbar-expand-md navbar-light bg-light justify-content-center">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#unimmmmmmmm"
          aria-controls="asas" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="unimmmmmmmm">
          <ul class="navbar-nav flex-column">
            <li class="nav-item"><a class="nav-link" href="{{route('profile.index')}}">Profile</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('manifesto.index')}}">Manifesto</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('candidate_list.index')}}">Candidates</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('voter_list.index')}}">Voter</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('election.index')}}">Elections</a></li>
          </ul>
        </div>
      </nav>
    </div>

    <main class="col-md-9 col-xl-8 py-md-3 pl-md-5">
      @yield('activity')
    </main>
  </div>
</div>
@endsection