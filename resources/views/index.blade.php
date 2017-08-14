@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-area">
                <form role="form" method="POST" action="/" name="application_form" enctype="multipart/form-data">

                    {{ csrf_field() }}

                    <br style="clear:both">

                    <h3 style="margin-bottom: 25px; text-align: center;">NG Metal</h3>

                    @include('layouts.errors.form')

                    <div class="form-group">
                        <input type="text" class="form-control" id="package_id" name="package_id" placeholder="Package ID" value="{{ $query['p'] }}" readonly required>
                        <input type="hidden" name="sent_date" value="{{ $query['d'] }}">
                    </div>

                    <div class="form-group">
                        <div class="row">

                            <label class="col-sm-6">Choose your appeal reason:</label>

                            <div class="col-sm-6">

                                <div class="dropdown pull-right">

                                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuReasons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <input type="hidden" name="reason_id" id="reason_id" value="{{ $reasons[0]->id }}">
                                        <span class="selected">{{ $reasons[0]->name }}</span>
                                        <span class="caret"></span>
                                    </button>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuReasons">

                                        @foreach($reasons as $reason)
                                            <li><a href="#" data-reason-id="{{ $reason->id }}">{{ $reason->name }}</a></li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control noresize" type="textarea" id="message" name="message" placeholder="Message" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <input type="file" id="input-files" name="files[]" multiple data-show-upload="false" data-show-remove="false" required>
                    </div>

                    <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Send</button>
                </form>
            </div>
        </div>
    </div>
@endsection