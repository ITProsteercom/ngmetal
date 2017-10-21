@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-6 col-md-offset-3">

            <h1>Settings</h1>

            <hr>

            @include('layouts.errors.form')

            <table class="table table-bordered table-hover ">
                <tbody>

                @foreach($settings as $k => $setting)
                    <tr>
                        {{ Form::open(['route' => ['admin.settings.update', $setting->id], 'method' => 'patch', 'class' => 'form-inline center' ]) }}
                            {{ method_field('PATCH') }}
                            <td>{{ $setting->name }}:</td>
                            <td>
                                <input type="text" class="w-100" name="value" value="{{ $setting->value }}" disabled>
                            </td>
                            <td>
                                <div class="form-group center">

                                    <a href="javascript:void(0);" role="button" class="setting-edit btn btn-default btn-xs">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>

                                    <button class="btn btn-default btn-xs" disabled>
                                        <span class="glyphicon glyphicon-floppy-disk"></span>
                                    </button>
                                </div>
                            </td>

                        {{ Form::close() }}
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
    </div>
@endsection