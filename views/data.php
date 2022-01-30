<?php include_once "blocks/header.php" ?>


<div class="container-fluid page-root">

    <main class="col">

    <div class="text-center">

        <div class="row pt-4">
            <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-8 offset-sm-2">
                <form enctype="multipart/form-data" action="/data-upload" method="post">
                    <div class="form-group text-left">
                        <label for="inputData">Zip-archive with data</label>
                        <input type="file" name="data" id="inputData" class="form-control" required="" autofocus="" accept=“zip/*”>
                    </div>
                    <div class="form-group text-left">
                        <input class="btn btn-lg btn-primary btn-block" type="submit" value="Upload">
                    </div>
                </form>
                <div class="form-group text-left py-4">
                    <input class="btn btn-lg btn-success btn-block" type="submit" value="Download">
                </div>
            </div>
        </div>

    </div>

    </main>

</div>


<?php include_once "blocks/footer.php" ?>