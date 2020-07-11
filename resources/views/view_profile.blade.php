@extends('layouts.main')

@section('activity')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    {{Auth::user()->name}} Profile
                </div>

                <div class="card-body">
                    @if($errors->first('old_password'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{$errors->first('old_password')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if($errors->first('new_password'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{$errors->first('new_password')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    @if($errors->first('new_password_confirmation'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{$errors->first('new_password_confirmation')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if(session()->has('message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{session()->get('message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session()->get('success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif


                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" value="{{Auth::user()->name}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" value="{{Auth::user()->email}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Role</label>
                        <input type="text" class="form-control" value="{{Auth::user()->role}}" readonly>
                    </div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update_password">
                        Change password
                    </button>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="update_password" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Change password</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('profile.update',Auth::user())}}" method="POST">
                            @method('PATCH')
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Current Password</label>
                                    <input type="password" class="form-control" name="old_password">
                                </div>
                                <div class="form-group">
                                    <label for="">New Password</label>
                                    <input type="password" class="form-control" name="new_password">
                                </div>
                                <div class="form-group">
                                    <label for="">Confirm New Password</label>
                                    <input type="password" class="form-control" name="new_password_confirmation">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" value="Change password">
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    Profile Picture
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('picture.update', Auth::user()) }}"
                        enctype="multipart/form-data">
                        @method('PATCH')
                        <div class="form-group">
                            <label for="photo">{{ __('Photo') }}</label><br>
                            <img class="card-img-top py-3" src="{{url('image/'.Auth::user()->image)}}"
                                alt="{{Auth::user()->image}}" style="width: 10rem;">
                            <input type="file" class="form-control-file" name="photo" />
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            Change Profile Picture
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection