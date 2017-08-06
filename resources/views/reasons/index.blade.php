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
                            <td>
                                {{ $reason->name }}
                            
                                {{ Form::open(['route' => ['reasons.delete', $reason->id], 'method' => 'delete', 'class' => 'form-inline pull-right' ]) }}
                                    
                                    <div class="form-group">
                                        <a href="{{route('reasons.edit', ['id' => $reason->id]) }}" role="button" class="btn btn-default btn-xs">
                                          <span class="glyphicon glyphicon-edit"></span>
                                        </a>

                                        <button class="btn btn-default btn-xs">
                                          <span class="glyphicon glyphicon-remove"></span>
                                        </button>
                                    </div>

                                {{ Form::close() }}

                            </td>
                        </tr>
                    @endforeach

                </thead>
            </table>

            <a href="/admin/reasons/create" class="btn btn-info" role="button">Create reason</a>

        </div>
    </div>
@endsection