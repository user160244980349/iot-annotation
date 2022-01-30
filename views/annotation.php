<?php include_once "blocks/header.php" ?>


<div class="row">

    <side class="col col-md-5 col-lg-4 ">
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

    <main class="col" role="main">
        <div class="card-body">
            <div><?php echo $policy['id'] ?></div>
            <div><?php echo $policy['policy_hash'] ?></div>
            <div><?php echo $policy['manufacturer'] ?></div>
            <div><?php echo $policy['keyword'] ?></div>
            <a href="<?php echo $policy['url'] ?>">Product on marketplace</a>
            <a href="<?php echo $policy['website'] ?>">Manufacturer website</a>
            <a href="<?php echo $policy['policy'] ?>">Link to this privacy policy</a>
        </div>
        <div class="card">
            <div class="card-body">
                <div id="annotation_surface"><?php echo $policy['content'] ?></div>
            </div>
        </div>
    </main>

</div>


<?php include_once "blocks/footer.php" ?>
