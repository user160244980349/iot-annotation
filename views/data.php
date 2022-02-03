<?php include_once "blocks/header.php" ?>


<div class="container-fluid page-root">

    <main class="col">

    <div class="text-center">

        <div class="row pt-4">
            <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-8 offset-sm-2">
                <form enctype="multipart/form-data" action="/data-upload" method="post">
                    <div class="form-group text-left">
                        <label for="inputData" class="form-label">Zip-archive with data</label>
                        <input id="inputData" name="data" type="file" class="form-control" required="" accept=“zip/*”>
                    </div>
                    <div class="form-group text-left">
                        <input class="btn btn-lg btn-primary btn-block" type="submit" value="Upload">
                    </div>
                </form>
                <div class="text-left py-4">
                    <div class="py-2">Annotation results</div>
                    <a class="btn btn-lg btn-success btn-block" href="/data-download">Download</a>
                </div>
            </div>
        </div>

    </div>

    </main>

</div>

<?php include_once "blocks/footer.php" ?>