<?php include_once "blocks/header.php" ?>
<?php 
use Engine\Auth\Facade as Auth; 
use App\Models\User; 
?>

<div class="container-fluid page-root">

    <main class="col">

    <div class="text-center">
        <h1 class="display-4">Home!</h1>
        <p class="lead">
            <?php if (Auth::allowed($id, ['visit-home'])) { ?>
                Congratulations! You are granted for <a href="/annotation">annotation</a>.
            <?php } else { ?>
                You are at the home page now. 
            <?php } ?>
        </p>
    </div>
    
    </main>

</div>


<?php include_once "blocks/footer.php" ?>
