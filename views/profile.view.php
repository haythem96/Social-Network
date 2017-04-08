<?php
$title = "Profile " . $_SESSION['username'] . "-";
include("includes/constants.php");
include("partials/_accountHeader.php");
?>
<Br/>
<div id="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Profile de <?= $res->username ?></h3>
                    </div>
                    <div class="panel-body">
                        <?php
                        if (isset($errorSendInvitation) && count($errorSendInvitation) == 0) {
                            echo '<div class=" alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                            echo "Votre demande d'amitie a ete envoyée avec success!";
                            echo '</div>';
                        }
                        ?>
                        <div class="row">
                            <div class="col-md-3">
                                <img src="<?= $url2 ?>" class="img-circle img-responsive"
                                     style=" width: 135px; height: 135px;border-radius: 67px;">
                            </div>
                            <div class="col-md-5">
                                <div class="container">
                                    <i><?php echo $res->bio == NULL ? 'Aucune biographie pour le moment' : $res->bio ?></i>
                                </div>
                            </div>
                            <?php if (($_GET['id'] != $_SESSION['id']) && ($checkRecievedRequest[0] == '1')): ?>
                                <div class="col-md-4">
                                    <form method="post">
                                        <button name="acceptRequest" id="acceptRequest"
                                                class=" pull-right mdl-button mdl-js-button mdl-button--accent"
                                                type="submit">Accepter
                                        </button>
                                        <button name="refuseRequest" id="refuseRequest"
                                                class=" pull-right mdl-button mdl-js-button mdl-button--accent"
                                                type="submit">Supprimer
                                        </button>
                                    </form>
                                </div>
                            <?php endif; ?>
                            <?php if (($_GET['id'] != $_SESSION['id']) && ($checkRequest == false) && ($checkRecievedRequest == false)): ?>
                                <div class="col-md-4">
                                    <form method="post">
                                        <button name="sendInvitation" id="sendInvitation"
                                                class=" pull-right mdl-button mdl-js-button mdl-button--accent"
                                                type="submit">
                                            <i class="fa fa-plus"></i>Envoyer une invitation
                                        </button>
                                    </form>
                                </div>
                            <?php endif; ?>
                            <?php if ((($_GET['id'] != $_SESSION['id']) && (($checkRequest[0] == '2') || $checkRecievedRequest[0] == '2'))): ?>
                                <div class="col-md-4">
                                    <p class=" pull-right mdl-button mdl-js-button mdl-button--accent" disabled>
                                        Friend</p>
                                </div>
                                <div class="col-md-8" style="left: +70px">
                                    <form method="post">
                                        <button name="removeFriend" id="removeFriend"
                                                class=" pull-right waves-effect waves-light btn"
                                                type="submit">
                                            <i class="fa fa-plus"></i> Supprimer
                                        </button>
                                    </form>
                                </div>
                            <?php endif; ?>
                            <?php if (($_GET['id'] != $_SESSION['id']) && ($checkRequest[0] == '1')): ?>
                                <div class="col-md-4">
                                    <p class=" pull-right mdl-button mdl-js-button mdl-button--accent" disabled>
                                        <i class="fa fa-plus"></i> Invitation envoyée
                                    </p>
                                    <form method="post">
                                        <button name="removeInvitation" id="removeInvitation"
                                                class="pull-right mdl-button mdl-js-button mdl-js-ripple-effect"
                                                type="submit">
                                            Annuler
                                        </button>
                                    </form>
                                </div>
                            <?php endif; ?>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-sm-6">
                                <strong><?= htmlspecialchars($res->name) ?></strong><br/>
                                <?php
                                echo '<i class="fa fa-mobile" aria-hidden="true"></i> ' . $res->tel;
                                ?>
                                <Br/>
                                <a href="mailto:<?= $res->email ?>"><?= $res->email ?></a><Br/>
                                <?php
                                echo '<i class="fa fa-map-marker" aria-hidden="true"></i> ' . $res->city . ' - ' . $res->adresse . ' ' . $res->codePostal;
                                ?>
                            </div>
                            <div class="col-sm-6">
                                <?php
                                echo $res->twitter != "" ? '<i class="fa fa-twitter" aria-hidden="true"></i> <a href="https://twitter.com/' . $res->twitter . '">' . $res->twitter . '</a><br/>' : '';
                                echo $res->facebook != "" ? '<i class="fa fa-facebook-official" aria-hidden="true"></i> <a href="https://facebook.com/' . $res->facebook . '">' . $res->facebook . '</a><br/>' : '';
                                echo $res->sex == "H" ? '<i class="fa fa-male" aria-hidden="true"></i>' : '<i class="fa fa-female" aria-hidden="true"></i>';
                                echo '<strong> Disponible pour emploi: ' . $res->workStatus . '</strong><br/>';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($_GET['id'] == $_SESSION['id']) : ?>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <?php
                    if (isset($errorPost) && count($errorPost) != 0) {
                        echo '<div class=" alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                        foreach ($errorPost as $error) {
                            echo $error . '<br/>';
                        }
                        echo '</div>';
                    }
                    ?>
                    <div class="status-post" style="background-color: white">
                        <form name="post" method="post" enctype="multipart/form-data" data-parsley-validate>
                            <div class="form-group">
                                <label for="content" class="sr-only">Statut:</label>
                                <textarea name="postContent" class="form-control" id="postContent" cols="30" rows="4" placeholder="Quoi de neuf!"></textarea>
                            </div>
                            <div class="form-group status-post-submit">
                                <input name="addPic" type="file">
                                <button type="submit" name="submitPost" id="submitPost"
                                        class="btn waves-effect waves-light"
                                        value="Publier"><i class="material-icons right">send</i>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <Br/>
        <?php if ($checkFriends[0] == "2"): ?>
            <?php if (count($posts) != 0): ?>
                <div class="row">
                    <?php foreach ($posts as $post): ?>
                        <div class="col-md-6 ">
                            <article class="media status-media">
                                <div class="pull-left">
                                    <img src="<?= $url2 ?>" alt="<?= $res->username ?>"
                                         class="media-object img-thumbnail img-responsive"
                                         style=" width: 60px; height: 60px;">
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"><?= htmlspecialchars($res->username) ?></h4>
                                    <p><i class="fa fa-clock-o"></i> <span class="timeago"
                                                                           title="<?= $post->created_at ?>"><?= $post->created_at ?></span>
                                    </p>
                                    <?php
                                    if ($post->postImgUrl != "") {
                                        echo "<img src='$post->postImgUrl'  style='width: 400px;height: 480px'/><br/><br/>";
                                    }
                                    ?>
                                    <?= nl2br(replace_links($post->post)) ?>
                                </div>
                            </article>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>

<?php
include("partials/_accountFooter.php");
?>
<!-- Timeago plugin -->
<script src="assets/js/jquery.timeago.js"></script>
<script src="assets/js/jquery.timeago.fr.js"></script>
<script src="assets/js/jquery.livequery.min.js"></script>
<script>
    $(".timeago").livequery(function (){
        $(this).timeago();
    });
</script>
