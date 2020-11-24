<?php use Engine\Decorators\FSMap; ?>

<?php include_once FSMap::get("views")."/blocks/header.php" ?>
<div class="container">
    <div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4"><?php echo "Code {$code}" ?></h1>
        <p class="lead">
            <?php 
                echo "Error! {$message}";
            ?>
        </p>
    </div>
</div>
<?php include_once FSMap::get("views")."/blocks/footer.php" ?>
<?php dd($trace) ?>
