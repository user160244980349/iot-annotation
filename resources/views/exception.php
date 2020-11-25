<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo "Code {$exception->getCode()}" ?></title>
    <script type="text/javascript" src="/js/index.js"></script>
</head>
<body>

<div class="container">
    <div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4"><?php echo "Code {$exception->getCode()}" ?></h1>
        <p class="lead">
            <?php echo "Error! {$exception->getMessage()}" ?>
        </p>
    </div>
</div>

</body>
</html>