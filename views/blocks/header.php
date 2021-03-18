<?php use Engine\Packages\Auth\Facade as Auth; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="/js/index.js"></script>
    <title><?php echo $title ?></title>
</head>
<body class="pt-5">
    
<div class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
<div class="container">
    
    <div class="col col-md-10 offset-md-1 col-sm-12 offset-sm-0 col-12 offset-0">

        <div class="row">
        
            <div class="col">
            <div class="row">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="/">IOT Annotation Tool</a>
            </div>  
            </div>  
            
            <div class="col">
                    <div class="row collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <ul class="navbar-nav pl-2">
                        <?php if ($id) { ?>
                            <li class="nav-item">
                                <a class="nav-link pl-2" href="/home">Home</a>
                            </li>

                            <li class="nav-item pl-2">
                                <?php if (Auth::allowed($id, ['manage-users'])) { ?>
                                    <a class='nav-link' href='/users'>Users</a>
                                <?php } ?>
                            </li>

                            <li class="nav-item pl-2">
                                <?php if (Auth::allowed($id, ['manage-groups'])) { ?>
                                    <a class='nav-link' href='/groups'>Groups</a>
                                <?php } ?>
                            </li>

                            <li class="nav-item pl-2">
                                <form class="form-inline my-2 my-lg-0" action="/logout" method="post">
                                    <input class="btn btn-outline-danger my-2 my-sm-0" type="submit" value="Sign Out">
                                </form>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item pl-2">
                                <a class="btn btn-outline-success" href="/login" role="button">Sign In</a>
                            </li>
                            
                            <li class="nav-item pl-2">
                                <a class="btn btn-outline-primary" href="/register" role="button">Sign Up</a>
                            </li>
                        <?php } ?>
                        </ul>
                    </div>
            </div>
        </div>
    </div>

</div>
</div>