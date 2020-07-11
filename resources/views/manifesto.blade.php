@extends('layouts.main')

@section('activity')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Candidates's Manifesto
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('manifesto.update', Auth::user()) }}"
                        enctype="multipart/form-data">
                        @method('PATCH')
                        <div class="form-group">
                            <label for="manifesto">{{ __('Manifesto') }}</label>
                            <textarea name="manifesto" rows="10" class="form-control my-3"
                                required>{{Auth::user()->manifesto}}</textarea>
                            <button type="submit" class="btn btn-primary">{{ __('Update Manifesto') }} </button>
                        </div>
                        @csrf

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
@endsection