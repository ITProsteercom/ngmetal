@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-area">
                <form role="form">
                    <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;">NG Metal</h3>
                    <div class="form-group">
                        <input type="text" class="form-control" id="package_id" name="package_id" placeholder="Package ID" value="{{ $query['p'] }}" disabled required>
                        <input type="hidden" name="date" value="{{ $query['d'] }}">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-6">Choose your appeal reason:</label>
                            <div class="col-sm-6">
                                <div class="dropdown pull-right">
                                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        Damaged packaging
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li><a href="#">Damaged packaging</a></li>
                                        <li><a href="#">Damaged content</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control noresize" type="textarea" id="message" placeholder="Message" maxlength="140" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" multiple>
                    </div>

                    <button type="button" id="submit" name="submit" class="btn btn-primary pull-right">Send</button>
                </form>
            </div>
        </div>
    </div>
@endsection