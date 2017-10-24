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

                        <td>{{ $setting->name }}:</td>
                        <td>
                            {{ Form::open(['route' => ['admin.settings.update', $setting->id], 'method' => 'patch', 'class' => 'form-inline center' ]) }}

                                @foreach($setting->value as $key => $value)
                                    <input type="text" class="w-100" name="value[{{ $setting->id }}][]" value="{{ old("value.$setting->id.$key", $value) }}" disabled>
                                @endforeach

                                @if($setting->isMultiple)
                                    <button class="btn btn-xs btn-primary w-100 add-setting-input" disabled>
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </button>
                                @endif
                            {{ Form::close() }}
                        </td>
                        <td>
                            <div class="form-group center">

                                <a href="javascript:void(0);" role="button" class="setting-edit btn btn-default btn-xs">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>

                                <button class="btn btn-default btn-xs save-setting" disabled>
                                    <span class="glyphicon glyphicon-floppy-disk"></span>
                                </button>
                            </div>
                        </td>

                    </tr>

                @endforeach

                </tbody>
            </table>

        </div>
    </div>
@endsection