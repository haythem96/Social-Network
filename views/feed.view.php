<?php
$title = "Amis " . $_SESSION['username'] . "-";
include("includes/constants.php");
include("partials/_accountHeader.php");
?>
<div class="container">
    <br/>
    <?php foreach ($res as $profile): ?>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <section class="post-heading">
                        <div class="row">
                            <div class="col-md-11">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <img class="media-object photo-profile"
                                                 src="<?= $profile->imageUrl ?>"
                                                 width="40" height="40" alt="...">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <a href="profile.php?id=<?= $profile->userId ?>" class="anchor-username"><h4
                                                    class="media-heading"><?= $profile->username ?></h4></a>
                                        <p><i class="fa fa-clock-o"></i> <span class="timeago"
                                                                               title="<?= $profile->created_at ?>"><?= $profile->created_at ?></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <br/>
                    <section class="post-body" style="word-wrap: break-word">
                        <?php
                        if ($profile->postImgUrl != "") {
                            echo "<img src='$profile->postImgUrl'  style='width: 400px;height: 480px'/><br/><br/>";
                        }
                        ?>
                        <?= nl2br(replace_links($profile->post)) ?>
                    </section>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
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

