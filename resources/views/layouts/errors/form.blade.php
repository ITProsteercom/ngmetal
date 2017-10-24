@if(count($errors) > 0)
    <div class="form-group">
        <div class="alert alert-danger">
                
            @foreach($errors->all() as $error)
                <p>
                	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                	{{ $error }}
                </p>
            @endforeach
                
        </div>  
    </div>

@endif