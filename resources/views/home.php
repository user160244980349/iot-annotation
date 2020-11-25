<?php include_once "blocks/header.php" ?>
<div class="container">
    <div class="row my-4">
        <div class="col-md-8 offset-2">
            <div class="card shadow-sm">
                <div class="card-body">

                    <div class="row card-title">
                        <div class="col align-self-center">
                            <b>List of tasks</b>
                        </div>
                        <div class="col d-flex flex-row-reverse">
                            <div class="btn-group">
                                <a class="btn btn-sm btn-success" href="/run_task">Run new</a>
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
                                                <a class="btn btn-sm btn-outline-primary"
                                                    href="/task/1">Details</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Sample business process 2</td>
                                        <td>
                                            <div class="d-flex justify-content-end">
                                                <a class="btn btn-sm btn-outline-primary"
                                                    href="/task/2">Details</a>
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

<?php include_once "blocks/footer.php" ?>

</body>
</html>
