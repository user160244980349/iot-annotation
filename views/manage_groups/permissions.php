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

<div class="row my-4">
<div class="col-md-8 offset-2">
<div class="card">
<div class="card-body">

<div class="row card-title">
    <div class="col-md-6">
        <b>List of permissions for <?php echo $group['name'] ?></b>
    </div>
    <div class="col-md-6">
        <form action="" class="form-inline justify-content-end" method="post">
        <select class="form-control form-control-sm" name="permission">
        <?php 
            foreach ($all_permissions as $permission) {
                echo "<option value={$permission['id']}>{$permission['for']}</option>";
            }
        ?>
        </select>
        <input class="ml-1 btn btn-sm btn-success" type="submit" value="Assign">
        </form>
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
    <?php $i = 0; foreach ($permissions as $permission) { $i++;
        echo "
        <tr>
        <th scope='row'>{$i}</th>
        <td>{$permission['for']}</td>
        <td>
            <div class='d-flex justify-content-end'>
            <form action='' method='post' class='form-inline justify-content-end'>
                <input type='hidden' name='_method' value='delete'>
                <input type='hidden' name='permission' value='{$permission['id']}'>
                <input class='ml-1 btn btn-sm btn-outline-danger' type='submit' value='Disassign'>
            </form>
            </div>
        </td>
        </tr>
        ";
    } ?>
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
