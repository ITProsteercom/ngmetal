@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-6 col-md-offset-3">

            <h1>Appeal reasons</h1>

            <hr>

            <table class="table table-bordered table-hover ">
                <thead>

                    @foreach($reasons as $k => $reason)
                        <tr>
                            <td>{{ ++$k  }}</td>
                            <td>{{ $reason->name }}</td>
                            <td>
                                <button type="button" class="btn btn-default btn-xs">
                                  <span class="glyphicon glyphicon-edit"></span>
                                </button>
                            
                                <button type="button" class="btn btn-default btn-xs">
                                  <span class="glyphicon glyphicon-remove"></span>
                                </button>
                            </td>
                        </tr>
                    @endforeach

                </thead>
            </table>

            <a href="/admin/reasons/create" class="btn btn-info" role="button">Create reason</a>

        </div>
    </div>
@endsection