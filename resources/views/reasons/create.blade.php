@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-6 col-md-offset-3">

            <h1>Create an appeal reason</h1>

            <hr>

            <form method="POST" action="/admin/reasons">

                {{ csrf_field() }}

                @include('layouts.errors')

                <div class="form-group">
                    <label for="name">Reason name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
                <a href="/admin/reasons" class="btn btn-danger" role="button">Cancel</a>

            </form>
        </div>
    </div>
@endsection