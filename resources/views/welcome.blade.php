<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="/css/app.css">
        <script src="/js/app.js"></script>

        <title>NG Metal</title>

    </head>
    <body>
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="container">
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-area">  
                        <form role="form">
                            <br style="clear:both">
                            <h3 style="margin-bottom: 25px; text-align: center;">NG Metal</h3>
                            <div class="form-group">
                                <input type="text" class="form-control" id="package" name="package" placeholder="Номер пакування" disabled required>
                            </div>
                            <div class="form-group">
                                <div class="dropdown">
                                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Причина звернення
                                    <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li><a href="#">Все добре</a></li>
                                        <li><a href="#">Пошкоджена упаковка</a></li>
                                        <li><a href="#">Пошкодженний вміст</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" type="textarea" id="message" placeholder="Коментар" maxlength="140" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="file" multiple>
                            </div>  
                    
                            <button type="button" id="submit" name="submit" class="btn btn-primary pull-right">Відправити</button>
                        </form>
                    </div>
                </div>
            </div>
    </body>
</html>
