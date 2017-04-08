<?php
$title = "Compte " . $_SESSION['username'] . "-";
include("includes/constants.php");
include("partials/_accountHeader.php");
?>
<br/><br/>
<div class="container" >
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php
                    if (isset($errorImg) && count($errorImg) != 0) {
                        echo '<div class=" alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                        foreach ($errorImg as $error) {
                            echo $error . '<br/>';
                        }
                        echo '</div>';
                    }
                    if (isset($errorImg) && count($errorImg) == 0) {
                        echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                        echo 'Votre photo du profil a ete transferer';
                        echo '</div>';
                    }
                    ?>
                    <form method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="row">
                            <div class="col-md-5">
                                <img name="profilPic" id="profilPic" src="<?php echo $url1 ?>"
                                     class="img-rounded" width="170" height="150">
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="img">Choisir une image</label>
                                    <input name="profileImg" type="file"><Br/>

                                    <input type="submit" id="submitPic" name="submitPic" value="Upload"
                                           class="mdl-button mdl-js-button mdl-button--raised">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Completer mon profile</h3>
                </div>
                <div class="panel-body">
                    <?php
                    if (isset($errorInfo) && count($errorInfo) == 0) {
                        echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                        echo 'Felicitations, votre profil a ete mis a jour!';
                        echo '</div>';
                    }
                    ?>
                    <form method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name">Nom</label>
                                    <input type="text" name="nom" id="nom" class="form-control"
                                           value="<?= $res->nameP ?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="sex">Sexe<span class="text-danger">*</span></label>
                                    <select name="sex" id="sex" class="form-control">
                                        <option value=""></option>
                                        <option value="H" <?= $res->sex == "H" ? "selected" : "" ?>>H</option>
                                        <option value="F" <?= $res->sex == "F" ? "selected" : "" ?>>F</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city">Ville<span class="text-danger">*</span></label>
                                    <select name="ville" id="ville" class="form-control">
                                        <option value=""></option>
                                        <option value="Ariana" <?= $res->city == "Ariana" ? "selected" : "" ?>>
                                            Ariana
                                        </option>
                                        <option value="Beja" <?= $res->city == "Beja" ? "selected" : "" ?>>
                                            Beja
                                        </option>
                                        <option value="Ben Arous" <?= $res->city == "Ben Arous" ? "selected" : "" ?>>
                                            Ben Arous
                                        </option>
                                        <option value="Bizerte" <?= $res->city == "Bizerte" ? "selected" : "" ?>>
                                            Bizerte
                                        </option>
                                        <option value="Gabes" <?= $res->city == "Gabes" ? "selected" : "" ?>>
                                            Gabes
                                        </option>
                                        <option value="Gafsa" <?= $res->city == "Gafsa" ? "selected" : "" ?>>
                                            Gafsa
                                        </option>
                                        <option value="Jendouba" <?= $res->city == "Jendouba" ? "selected" : "" ?>>
                                            Jendouba
                                        </option>
                                        <option value="Kairouan" <?= $res->city == "Kairouan" ? "selected" : "" ?>>
                                            Kairouan
                                        </option>
                                        <option value="Kasserine" <?= $res->city == "Kasserine" ? "selected" : "" ?>>
                                            Kasserine
                                        </option>
                                        <option value="Kebili" <?= $res->city == "Kebili" ? "selected" : "" ?>>
                                            Kebili
                                        </option>
                                        <option value="La Manouba" <?= $res->city == "La Manouba" ? "selected" : "" ?>>
                                            La Manouba
                                        </option>
                                        <option value="Le Kef" <?= $res->city == "Le Kef" ? "selected" : "" ?>>
                                            Le Kef
                                        </option>
                                        <option value="Mahdia" <?= $res->city == "Mahdia" ? "selected" : "" ?>>
                                            Mahdia
                                        </option>
                                        <option value="Medenine" <?= $res->city == "Medenine" ? "selected" : "" ?>>
                                            Medenine
                                        </option>
                                        <option value="Monastir" <?= $res->city == "Monastir" ? "selected" : "" ?>>
                                            Monastir
                                        </option>
                                        <option value="Nabeul" <?= $res->city == "Nabeul" ? "selected" : "" ?>>
                                            Nabeul
                                        </option>
                                        <option value="Sfax" <?= $res->city == "Sfax" ? "selected" : "" ?>>
                                            Sfax
                                        </option>
                                        <option value="Sidi Bouzid" <?= $res->city == "Sidi Bouzid" ? "selected" : "" ?>>
                                            Sidi Bouzid
                                        </option>
                                        <option value="Siliana" <?= $res->city == "Siliana" ? "selected" : "" ?>>
                                            Siliana
                                        </option>
                                        <option value="Sousse" <?= $res->city == "Sousse" ? "selected" : "" ?>>
                                            Sousse
                                        </option>
                                        <option value="Tataouine" <?= $res->city == "Tataouine" ? "selected" : "" ?>>
                                            Tataouine
                                        </option>
                                        <option value="Tozeur" <?= $res->city == "Tozeur" ? "selected" : "" ?>>
                                            Tozeur
                                        </option>
                                        <option value="Tunis" <?= $res->city == "Tunis" ? "selected" : "" ?>>
                                            Tunis
                                        </option>
                                        <option value="Zaghouan" <?= $res->city == "Zaghouan" ? "selected" : "" ?>>
                                            Zaghouan
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="adresse">Adresse<span class="text-danger">*</span></label>
                                    <input type="text" name="adresse" id="adresse" class="form-control"
                                           value="<?= $res->adresse ?>"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="codePostal">Code Postal<span class="text-danger">*</span></label>
                                <input type="text" name="codePostal" id="codePostal" class="form-control"
                                       maxlength="4" value="<?= $res->codePostal ?>"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="numTel">Telephone<span class="text-danger">*</span></label>
                                    <input type="text" name="numTel" id="numTel" class="form-control"
                                           value="<?= $res->tel ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="facebookAccount">Facebook<span
                                                class="text-danger">*</span></label>
                                    <input type="text" name="facebookAccount" id="facebookAccount"
                                           class="form-control" placeholder="pseudo"
                                           value="<?= $res->facebook ?>"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="twitterAccount">Twitter<span
                                                class="text-danger">*</span></label>
                                    <input type="text" name="twitterAccount" id="twitteRAccount"
                                           class="form-control" placeholder="@pseudo"
                                           value="<?= $res->twitter ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="available_for_hire"
                                           class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">

                                        <?php
                                        if ($res->workStatus == "non") {
                                            echo '<input type="checkbox" name="available_for_hire" id="available_for_hire" class="mdl-checkbox__input" />';
                                        } else {
                                            echo '<input type="checkbox" name="available_for_hire" id="available_for_hire" class="mdl-checkbox__input" checked="checked"/>';
                                        }
                                        ?>
                                        <span class="mdl-checkbox__label">Disponible pour emploi?</span>
                                    </label>
                                </div>
                                <button type="submit" name="submitInfo" id="submitInfo"
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
                                    Enregistrer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Biographie</h3>
                </div>
                <div class="panel-body">
                    <form method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="mdl-textfield mdl-js-textfield">
                                    <textarea name="bio" id="bio" class="mdl-textfield__input" type="text" rows="3"
                                              id="bio"></textarea>
                            <label class="mdl-textfield__label" for="sample5">décrivez-vous...</label>
                        </div>
                        <Br/>
                        <button type="submit" name="submitBio" id="submitBio"
                                class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
                            Enregistrer
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Changer mot de passe</h3>
                </div>
                <div class="panel-body">
                    <?php
                    if (isset($errorPassword) && count($errorPassword) != 0) {
                        echo '<div class=" alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                        foreach ($errorPassword as $error) {
                            echo $error . '<br/>';
                        }
                        echo '</div>';
                    }
                    if (isset($errorPassword) && count($errorPassword) == 0) {
                        echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                        echo 'Votre mot de passe est changer!';
                        echo '</div>';
                    }
                    ?>
                    <form method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="form-group">
                            <label for="currentPassword">Mot de passe courant<span class="text-danger">*</span></label>
                            <input type="password" name="currentPassword" id="currentPassword"
                                   class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label for="newPassword">Nouveau mot de passe<span class="text-danger">*</span></label>
                            <input type="password" name="newPassword" id="newPassword"
                                   class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label for="confirmNewPassword">Confirmer votre mot de passe<span
                                        class="text-danger">*</span></label>
                            <input type="password" name="confirmNewPassword" id="confirmNewPassword"
                                   class="form-control" required="required">
                        </div>
                        <Br/><Br/>
                        <button type="submit" name="changePassword" id="changePassword"
                                class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
                            Changer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("partials/_accountFooter.php");
?>
