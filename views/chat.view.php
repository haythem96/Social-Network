<?php
$title = "Chat " . $_SESSION['username'] . "-";
include("includes/constants.php");
include("partials/_accountHeader.php");
?>
    <style>
        overflow-y: scroll

        ;
    </style>
    <br/><br/>


    <div style="width: 800px;margin-left: 150px; margin-right: 150px">
        <a href='message.php?id=<?= $_SESSION["id"] ?>' style="text-decoration: none;color:red;"><i class="material-icons">undo</i></a><br/><br/><br/><br/>
        <?php foreach ($res as $message) {
            if ($message->id == $_GET['senderId']) { ?>
                <div id="row">
                    <div class="col-md-6 col-md-offset-2 pull-left">
                        <div>
                            <img id="img1" src="<?= $message->imageUrl ?>" alt="<?= $message->username ?> "
                                 style="width: 50px; height:50px; border-radius:25px">
                            <div class="messageContent1">
                                <p><?= nl2br(replace_links($message->content))?></p>
                            </div>
                        </div>
                        <br/>
                    </div>
                </div>
            <?php }
            if ($message->id == $_SESSION['id']) { ?>
                <div id="row">
                    <div class="col-md-6 col-md-offset-10 pull-left">
                        <div>
                            <img id="img2" src="<?= $message->imageUrl ?>" alt="<?= $message->username ?> "
                                 style="width: 50px; height:50px; border-radius:25px">
                            <div class="messageContent2">
                                <p><?= nl2br(replace_links($message->content))?></p>
                            </div>
                        </div>
                        <br/>
                    </div>
                </div>
            <?php }
        } ?>
    </div>


<?php
include("partials/_accountFooter.php");
?>