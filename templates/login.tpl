<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Hello!</h1>
    <p class="lead">
        Greetings! You are at the sign in page now. So you can sign in or <a href="register">sign up</a>.
    </p>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">

                <form method="post">
                    <div class="form-group text-left">
                        <label for="inputUsername">Username</label>
                        <input type="text" name="username" id="inputUsername" class="form-control"
                               placeholder="Enter username" required="" autofocus="">
                    </div>
                    <div class="form-group text-left">
                        <label for="inputPassword">Password</label>
                        <input type="password" name="password" id="inputPassword" class="form-control"
                               placeholder="Enter password" required="">
                    </div>
                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Sign in">
                </form>

            </div>
        </div>
    </div>
</div>

</body>
</html>
