<?php include_once __DIR__ . '/../blocks/header.php' ?>
<div class="container">
    <div class="row my-4">
        <div class="col-md-8 offset-2">
            <div class="card shadow-sm">
                <div class="card-body">

                    <div class="row card-title">
                        <div class="col align-self-center">
                            <b>List of business processes</b>
                        </div>
                        <div class="col d-flex flex-row-reverse">
                            <div class="btn-group-sm">
                                <a class="btn btn-sm btn-success" href="create_business_process">Create new</a>
                            </div>
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
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Sample business process 1</td>
                                        <td>
                                            <div class="d-flex justify-content-end">
                                                <a style="margin-right:5px" class="btn btn-sm btn-outline-primary"
                                                    href="update_business_process/1">Edit</a>
                                                <form action='business_processes/<?php echo $group['id'] ?>' method='post' class='form-inline justify-content-end'>
                                                    <input type='hidden' name='_method' value='delete'/>
                                                    <input class='btn btn-sm btn-outline-danger' type='submit' value='Remove'>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Sample business process 2</td>
                                        <td>
                                            <div class="d-flex justify-content-end">
                                                <a style="margin-right:5px" class="btn btn-sm btn-outline-primary"
                                                    href="update_business_process/2">Edit</a>
                                                <form action='business_processes/<?php echo $group['id'] ?>' method='post' class='form-inline justify-content-end'>
                                                    <input type='hidden' name='_method' value='delete'/>
                                                    <input class='btn btn-sm btn-outline-danger' type='submit' value='Remove'>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
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
