<?php include_once "blocks/header.php" ?>


<div class="row">

    <side class="col col-md-4 col-lg-3 ">
        <div class="card sticky-sidebar">
            <div class="card-header d-flex justify-content-between">
                <div>Annotation Layers</div>
                <div id="pin_icon"></div>
            </div>
            <div class="card-body overflow p-1">
                <div id="layers_management"></div>
            </div>
        </div>
    </side>

    <main class="col col-md-6 col-lg-6" role="main">
        <div class="card">
            <div class="card-body">
                <div id="annotation_surface"><?php echo $text ?></div>
            </div>
        </div>
    </main>

</div>


<?php include_once "blocks/footer.php" ?>
