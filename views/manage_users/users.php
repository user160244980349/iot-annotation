<?php require_once __DIR__ . '/../blocks/header.php' ?>
<div class="container">
    <div class="row my-4">
        <div class="col-md-8 offset-2">
            <div class="card shadow-sm">
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
                                                <a class="btn btn-sm btn-outline-primary"
                                                    href="/users/<?php echo $user['id'] ?>/groups">Details</a>
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
<?php require_once __DIR__ . '/../blocks/footer.php' ?>

</body>
</html>
