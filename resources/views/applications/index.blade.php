@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

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
                                {{ $application->reason_id }}
                            </td>
                            <td>
                                {{ $application->message }}
                            </td>
                            <td>
                                @foreach($application->files as $file)
                                    <img src="{{ asset($file->resizeImage()) }}" alt="{{ $file->original_name }}" title="{{ $file->original_name }}" />
                                @endforeach
                            </td>
                            {{--<td>--}}
                                {{--{{ Form::open(['route' => ['reasons.delete', $reason->id], 'method' => 'delete', 'class' => 'form-inline pull-right' ]) }}--}}

                                {{--<div class="form-group">--}}
                                    {{--<a href="{{route('reasons.edit', ['id' => $reason->id]) }}" role="button" class="btn btn-default btn-xs">--}}
                                        {{--<span class="glyphicon glyphicon-edit"></span>--}}
                                    {{--</a>--}}

                                    {{--<button class="btn btn-default btn-xs">--}}
                                        {{--<span class="glyphicon glyphicon-remove"></span>--}}
                                    {{--</button>--}}
                                {{--</div>--}}

                                {{--{{ Form::close() }}--}}

                            {{--</td>--}}
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
