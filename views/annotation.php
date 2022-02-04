<?php 
    include_once __DIR__ . '/blocks/header.php';
    use Engine\Services\CSRFService as CSRF; 
?>


<div class="container-fluid page-root">

    <div class="row">

        <?php if (!empty($policy)) { ?>

            <side class="col-4">
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

            <main class="col-8">

                <!-- <div class="row p-2 mb-3">
                    <div class="col">
                        <div class="row">
                            <div class="col-4">
                                <div>Id:</div>
                            </div>
                            <div class="col">
                                <div style="font-style: italic;"><?php echo $policy['id'] ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div>Hash:</div>
                            </div>
                            <div class="col">
                                <div style="font-style: italic;"><?php echo $policy['policy_hash'] ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div>Manufacturer:</div>
                            </div>
                            <div class="col">
                                <div style="font-style: italic;"><?php echo $policy['manufacturer'] ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div>Keywords:</div>
                            </div>
                            <div class="col">
                                <div style="font-style: italic;"><?php echo $policy['keyword'] ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div>Product on marketplace:</div>
                            </div>
                            <div class="col">
                                <div><a target="_blank" style="font-style: italic; word-break: break-all;" href="<?php echo $policy['url'] ?>"><?php echo $policy['url'] ?></a></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div>Manufacturer website:</div>
                            </div>
                            <div class="col">
                                <div><a target="_blank" style="font-style: italic; word-break: break-all;" href="<?php echo $policy['website'] ?>"><?php echo $policy['website'] ?></a></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div>Link to this privacy policy:</div>
                            </div>
                            <div class="col">
                                <div><a target="_blank" style="font-style: italic; word-break: break-all;" href="<?php echo $policy['policy'] ?>"><?php echo $policy['policy'] ?></a></div>
                            </div>
                        </div>
                    </div>
                </div> -->

                    
                <div class="row mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div id="annotation_surface"><?php echo $policy['content'] ?></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4 offset-8 p-0">
                        <form action="/annotation" method="post" id="json_form" hidden>
                            <input name="csrf_token" value="<?php echo CSRF::generate() ?>" hidden>
                            <input id="json_data" name="json" type="text">
                        </form>
                        <button id="commit" class="btn btn-lg btn-success btn-block">Commit annotations</button>
                    </div>
                </div>

            </main>
            
        <?php } else { ?>

            <main class="col">

            <div class="text-center">
                <h1 class="display-4">Attention!</h1>
                <p class="lead">
                    The data was not uploaded to database.
                </p>
            </div>

            </main>


        <?php } ?>

    </div>

</div>


<?php include_once __DIR__ . '/blocks/footer.php' ?>
