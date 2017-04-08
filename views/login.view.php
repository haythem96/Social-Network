<?php
    $title = "Se connecter";
    include("partials/_header.php");
?>

<!-- CSS Link -->
<link rel="stylesheet" type="text/css" href="assets/css/login.css">
<!-- LOGIN FORM -->
<div class="container">
<div class="text-center " style="padding:50px 0">
    <!-- Main Form -->
    <div class="login-form-1">
        <form id="login-form" class="text-center form-horizontal" method="post">
            <?php
            if(isset($errors) && count($errors) != 0){
                echo '<div class=" alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                foreach ($errors as $error){
                    echo $error.'<br/>';
                }
                echo '</div>';
            }
            ?>
            <div class="login-form-main-message"></div>
            <div class="main-login-form">
                <div class="login-group">
                    <div class="form-group">
                        <label for="lg_username" class="sr-only">Pseudo ou E-mail</label>
                        <input type="text" class="form-control" id="lg_username" name="lg_username" placeholder="username" >
                    </div>
                    <div class="form-group">
                        <label for="lg_password" class="sr-only">Mot de passe</label>
                        <input type="password" class="form-control" id="lg_password" name="lg_password" placeholder="password">
                    </div>
                    <div class="form-group login-group-checkbox">
                        <input type="checkbox" id="lg_remember" name="lg_remember">
                        <label for="lg_remember">remember</label>
                    </div>
                </div>
                <button type="submit" class="login-button" name="login"><i class="fa fa-chevron-right"></i></button>
            </div>
            <div class="etc-login-form">
                <a href="#">Mot de passe oublié?</a>
                <a name="register" href="register.php" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Rejoignez-nous!</a>
            </div>
        </form>
    </div>
    <!-- end:Main Form -->
</div>
</div>
<?php
    include("partials/_footer.php");
?>

