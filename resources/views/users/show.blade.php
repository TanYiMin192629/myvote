@extends('layouts.main')


@section('activity')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>User</strong>
                </div>
                <div class="card-body">


                    <TABLE BORDER="1" CELLSPACING="2" CELLPADDING="12" WIDTH=90%>

                        <tr>
                            <td><label for="">Name</label></td>
                            <td>{{$user->name}}</td>
                        </tr>
                        <tr>
                            <td><label for="">Email</label></td>
                            <td>
                                {{$user->email}}
                            </td>
                        </tr>
                        <tr>
                            <td><label for="">Role</label></td>
                            <td>{{$user->role}}</td>
                        </tr>
                    </TABLE>


                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection