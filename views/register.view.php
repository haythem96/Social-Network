<?php
    $title = "Inscription";
    include("partials/_header.php");
?>
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/register.css">

    <div class="container">
        <div class="row main">
            <div class="panel-heading">
                <div class="panel-title text-center">
                    <h1 class="title"><?php echo WEBSITE_NAME ?></h1>
                    <hr />
                </div>
            </div>
            <?php
                if(isset($errors) && count($errors) != 0){
                    echo '<div class=" alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                    foreach ($errors as $error){
                        echo $error.'<br/>';
                    }
                    echo '</div>';
                }
            ?>
            <div class="main-login main-center">
                <form class="form-horizontal" method="post" autocomplete="off" data-parsley-validate="">
                    <!-- Name Input Field-->
                    <div class="form-group">
                        <label for="name" class="cols-sm-2 control-label">Nom</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="name" id="name"  placeholder="Saisir votre nom" required = required/>
                            </div>
                        </div>
                    </div>
                    <!-- Email Input Field-->
                    <div class="form-group">
                        <label for="email" class="cols-sm-2 control-label">Email</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                <input type="email" class="form-control" name="email" id="email"  placeholder="Saisir votre email" required = required/>
                            </div>
                        </div>
                    </div>
                    <!-- Username Input Field-->
                    <div class="form-group">
                        <label for="username" class="cols-sm-2 control-label">Pseudo</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="username" id="username"  placeholder="Saisir votre pseudo" required = required/>
                            </div>
                        </div>
                    </div>
                    <!-- Password Input Field-->
                    <div class="form-group">
                        <label for="password" class="cols-sm-2 control-label">Mot de passe</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <input type="password" class="form-control" name="password" id="password"  placeholder="Saisir votre mot de passe" required = required/>
                            </div>
                        </div>
                    </div>
                    <!-- Password confirmation Input Field-->
                    <div class="form-group">
                        <label for="confirm" class="cols-sm-2 control-label">Confirmer votre mot de passe</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <input type="password" class="form-control" name="confirmPassword" id="confirmPassword"  placeholder="Confirmer votre mot de passe" required = required/>
                            </div>
                        </div>
                    </div>
                    <!-- Submit button-->
                    <div class="form-group ">
                        <button type="submit" class="btn btn-primary btn-lg btn-block login-button" value="Inscription" name="register">Inscription</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
include("partials/_footer.php");
?>