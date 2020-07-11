@extends('layouts.main')
@section('activity')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Election List
                </div>



                <div class="card-body">
                    {{-- Content --}}
                    @can('create', App\Election::class)
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#new_election_modal">Create New Election</button>
                    <hr>
                    @endcan

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($elections as $election)
                            <tr>
                                <td>{{$election->election_title}}</td>
                                <td><a href="{{route('election.show', $election->id)}}"
                                        class="btn btn-primary">Participate</a>
                                    @can('create', App\Election::class)
                                    <a href="{{route('election.show', $election->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{route('election.show', $election->id)}}"
                                        class="btn btn-danger">Delete</a>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

            <!-- Modal -->
            <div class="modal fade" id="new_election_modal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Election</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('election.store')}}" method="POST">
                                <div class="form-group row">
                                    <label for="election_title" class="col-sm-2 col-form-label">Election Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="election_title"
                                            name="election_title" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="election_candidate" class="col-sm-2 col-form-label">Candidates</label>
                                    <div class="col-sm-10">
                                        <select class="form-control selectpicker" name="election_candidate[]"
                                            data-live-search="true" data-size="8"
                                            title="Select the candidates for the election :" multiple required>
                                            @foreach($candidates as $candidate)
                                            <option value="{{$candidate->id}}">{{ $candidate->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="start_date" class="col-sm-2 col-form-label">Start Date</label>
                                    <div class="col-sm-10">
                                        <div class="input-group date" id="start_date" data-target-input="nearest">
                                            <input type="text" name="start_date"
                                                class="form-control datetimepicker-input" data-target="#start_date"
                                                required />
                                            <div class="input-group-append" data-target="#start_date"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="end_date" class="col-sm-2 col-form-label">End Date</label>
                                    <div class="col-sm-10">
                                        <div class="input-group date" id="end_date" data-target-input="nearest">
                                            <input type="text" name="end_date" class="form-control datetimepicker-input"
                                                data-target="#end_date" required />
                                            <div class="input-group-append" data-target="#end_date"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="election_description" class="col-sm-2 col-form-label">Election
                                        Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="election_description"
                                            name="election_description" rows="8"></textarea>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                        @csrf
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <script>
            $('#start_date').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss'
            });
            $('#end_date').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss'
            });
        </script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
    </div>
</div>
</div>

@endsection