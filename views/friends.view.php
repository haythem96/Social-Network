<?php
$title = "Amis " . $_SESSION['username'] . "-";
include("includes/constants.php");
include("partials/_accountHeader.php");
?>
    <div class="row">
        <div class="col-sm-6">
            <div id="imaginary_container">
                <form name="searchBar" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="input-group stylish-input-group">
                        <input type="search" class="form-control" name="searchInput" id="searchInput"
                               placeholder="Trouver une personne (John Smith)">
                        <span class="input-group-addon">
                        <button type="submit" name="search" id="search">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                    </div>
                    <div id="display-result">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <Br/><Br/><br/><br/>
    <div class="row">
        <?php
        if ($recievedRequest == true) {
            foreach ($recievedRequest as $req) {
                $info = $friend->getUserImageUsername($req->user_id1); ?>
                <div class="col-md-3">
                    <div class="panel-default">
                        <div class="panel-body">
                            <form method="post">
                                <a href="profile.php?id=<?= $req->user_id1 ?>" style="text-decoration: none;">
                                    <img src="<?= $info[0]->imageUrl ?>" alt="<?= $info[0]->username ?> "
                                         class="demo-avatar">
                                </a>
                                <button name="accept" id="accept"
                                        class="mdl-button mdl-js-button mdl-button--primary pull-right">
                                    Accepter
                                </button>
                                <button name="remove" id="remove"
                                        class="mdl-button mdl-js-button mdl-button--accent pull-right">
                                    Supprimer
                                </button>
                                &nbsp;&nbsp;<strong><?= $info[0]->username ?></strong>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        //Accept invitation request
        if (isset($_POST['accept'])) {
            $profile = new profileModel();
            $errorRemoveInvitation = [];
            $profile->acceptInvitation($req->user_id1, $_SESSION['id']);
            $id = $_SESSION['id'];
            header("location: friends.php?id=$id");
        }
        //Remove invitation request
        if (isset($_POST['remove'])) {
            $profile = new profileModel();
            $errorRemoveInvitation = [];
            $profile->removeInvitation($req->user_id1, $_SESSION['id']);
            $id = $_SESSION['id'];
            header("location: friends.php?id=$id");
        }
        ?>
    </div>
    <h5>Amis</h5><br/>
    <div class="row">
        <?php
        if ($friendsList == true) {
            foreach ($friendsList as $f) {
                $info = $friend->getUserImageUsername($f->id); ?>

                <a href="profile.php?id=<?= $f->id ?>" style="text-decoration: none;">
                    <div class="col-md-2 col-md-offset-1 friend">
                        <img src="<?= $info[0]->imageUrl ?>" alt="<?= $info[0]->username ?> "
                             style="width: 70px; height:70px; border-radius:35px"><br/>
                        <strong><?= $info[0]->username ?></strong>
                    </div>
                </a>
            <?php }
        }
        ?>
    </div>

<?php
include("partials/_accountFooter.php");
?>