<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <link href="/packages/bunbo/css/app.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            @include('bunbo::includes.notification')

            <div class="panel panel-default admin-login-panel">
                <div class="panel-heading">
                    <h4>LOGIN</h4>
                </div>
                <div class="panel-body">

                    <form action="{{route('admin.doLogin')}}" class="form-horizontal" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label for="email" class="control-label col-md-3">Email</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Email" placeholder="{{Input::old('email')}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="control-label col-md-3">Password</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <button class="btn btn-default pull-right" type="submit">Login</button>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
