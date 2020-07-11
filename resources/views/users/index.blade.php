@extends('layouts.main')

@section('activity')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Managing Users
                </div>

                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="row"></div>
                <div class="card-body">
                    {{-- Content --}}
                    <table class="table table-hover table-sm">
                        <thead>
                            <th>ID</th>
                            <th>NAME</th>
                            {{-- <th>EMAIL</th> --}}
                            <th>ROLE</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}} </td>
                                <td>{{$user->name}} </td>
                                {{-- <td>{{$user->email}} </td> --}}
                                <td>{{$user->role}} </td>
                                <td>
                                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                        <a class="btn btn-info m-2" href="{{ route('users.show',$user->id) }}">Show</a>
                                        <a class="btn btn-outline-info m-2"
                                            href="{{ route('users.edit',$user->id) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger m-2">Delete</button>
                                    </form>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>

            </div>



        </div>
    </div>
</div>
@endsection