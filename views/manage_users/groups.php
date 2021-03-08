<?php include_once __DIR__ . '/../blocks/header.php' ?>

<div class="container">

<div class="row my-4">
<div class="col-md-8 offset-2">
<div class="card shadow-sm">
<div class="card-body">

<div class="row card-title">
    <div class="col-md-4">
        <b>List of groups  for <?php echo $name ?></b>
    </div>
    <div class="col-md-8">
    <?php if (count($all_groups) != count($groups)) { ?>
        <form action="" class="form-inline justify-content-end" method="post">
        <select class="form-control form-control-sm" name="group">
            <?php foreach ($all_groups as $group) { ?>
                <option value=<?php echo $group['id'] ?>><?php echo $group['name'] ?></option>
            <?php } ?>
        </select>
        <input class="ml-1 btn btn-sm btn-success" type="submit" value="Assign">
        </form>
    <?php } ?>
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
    <?php $i = 0; foreach ($groups as $group) { $i++;
        echo "
        <tr>
        <th scope='row'>{$i}</th>
        <td>{$group['name']}</td>
        <td>
            <div class='d-flex justify-content-end'>
            <form action='' method='post' class='form-inline justify-content-end'>
                <input type='hidden' name='_method' value='delete'>
                <input type='hidden' name='group' value='{$group['id']}'>
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

<?php include_once __DIR__ . '/../blocks/footer.php' ?>

</body>
</html>
