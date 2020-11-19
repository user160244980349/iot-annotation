<?php use Engine\Decorators\FSMap; ?>
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

<?php include FSMap::get("views")."/blocks/header.php" ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="card">
                <div class="card-body">

                    <div class="row card-title">
                        <div class="col">
                            <b>List of users</b>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <table class="table table-sm mb-0">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">
                                        <div class="d-flex justify-content-end">Actions</div>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; foreach ($users as $user) { $i++; ?>
                                    <tr>
                                        <th scope="row"><?php echo $i ?></th>
                                        <td><?php echo $user['name'] ?></td>
                                        <td>
                                            <div class="d-flex justify-content-end">
                                                <a style="margin-right:5px" class="btn btn-sm btn-outline-primary"
                                                    href="edit-groups/<?php echo $user['id'] ?>">Details</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include FSMap::get("views")."/blocks/footer.php" ?>

</body>
</html>
