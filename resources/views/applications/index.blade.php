@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <h1>Applications</h1>

            <hr>

            <table class="table table-bordered table-hover ">
                <thead>
                    <th>№</th>
                    <th>Package ID</th>
                    <th>Purchase Date</th>
                    <th>Reason</th>
                    <th>Message</th>
                    <th>Files</th>
                    <th>Actions</th>
                </thead>

                <tbody>
                    @foreach($applications as $k => $application)
                        <tr>
                            <td>{{ ++$k  }}</td>
                            <td>
                                {{ $application->package_id }}
                            </td>
                            <td>
                                {{ $application->sent_date }}
                            </td>
                            <td>
                                {{ $application->reason->name }}
                            </td>
                            <td>
                                {{ $application->message }}
                            </td>
                            <td>
                                <div class="gallery">

                                    @foreach($application->files as $file)

                                        <a href="{{ "/storage/$file->path" }}">
                                            <img src="{{ asset($file->resizeImage()) }}"
                                                 alt="{{ $file->original_name }}"
                                                 title="{{ $file->original_name }}" />
                                        </a>
                                    @endforeach

                                </div>
                            </td>
                            <td>
                                {{ Form::open(['route' => ['applications.delete', $application->id], 'method' => 'delete', 'class' => 'form-inline pull-right' ]) }}

                                <div class="form-group">
                                    <button class="btn btn-default">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </button>
                                </div>

                                {{ Form::close() }}

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
