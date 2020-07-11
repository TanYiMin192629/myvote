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
                    <form method="post" action="{{ route('users.update', $users->id) }}">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" value={{ $users->name }} />
                        </div>
                        <div class="form-group">
                            <label for="price">Email:</label>
                            <input type="text" class="form-control" name="email" value={{ $users->email }} />
                        </div>
                        <div class="form-group">
                            <label for="quantity">Role:</label>
                            <select name="role" class="form-control" value={{ $users->role }}>
                                <option value="1">Candidate</option>
                                <option value="2">Voter</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection