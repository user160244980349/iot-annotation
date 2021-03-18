<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
    <script type="text/javascript" src="/js/index.js"></script>
</head>
<body>

<div class="container pt-5">

    <div class="row justify-content-center">
        <h1 class="display-4">Hello!</h1>
    </div>

    <div class="row justify-content-center">
        <p class="lead">
            Greetings! You are at the sign in page now. So you can sign in or <a href="/register">sign up</a>.
        </p>
    </div>

    <div class="row py-4">
        <div class="col-md-6 offset-3">

            <form method="post">
                <div class="form-group text-left">
                    <label for="inputUsername">Username</label>
                    <input type="text" name="user[name]" id="inputUsername" class="form-control"
                            placeholder="Enter username" required="" autofocus="">
                </div>
                <div class="form-group text-left">
                    <label for="inputPassword">Password</label>
                    <input type="password" name="user[password]" id="inputPassword" class="form-control"
                            placeholder="Enter password" required="">
                </div>
                <div class="form-group text-left py-4">
                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Sign in">
                </div>
            </form>

        </div>
    </div>

</div>

</body>
</html>
