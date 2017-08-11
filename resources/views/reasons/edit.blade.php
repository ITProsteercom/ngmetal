@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-6 col-md-offset-3">

            <h1>Edit an appeal reason</h1>

            <hr>

            <form method="POST" action="/admin/reasons/{{ $reason->id }}">

            	{{ csrf_field() }}
                {{ method_field('PATCH') }}

                @include('layouts.form')

                <div class="form-group">
                    <label for="name">Reason name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $reason->name }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="/admin/reasons" class="btn btn-danger" role="button">Cancel</a>

            </form>
        </div>
    </div>

@endsection