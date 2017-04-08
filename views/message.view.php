<?php
$title = "Messages " . $_SESSION['username'] . "-";
include("includes/constants.php");
include("partials/_accountHeader.php");
?>
<div id="msg">
    &nbsp; &nbsp; &nbsp; &nbsp;
    <a id="rec" href="#" style="text-decoration: none;color: black;">Reçu</a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    &nbsp; &nbsp; &nbsp; &nbsp;
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    <a id="sent" href="#" style="text-decoration: none; color:black;">Envoyé</a>
</div><br/><br/>
<div id="messageScrollBar">
    <div id="messageRec">
        <?php if ($messagesRec != 0) { ?>
            <?php foreach ($messagesRec as $messageRec) { ?>
                <a href="chat.php?senderId=<?= $messageRec->senderId ?>" onclick="
                        var url3 = 'ajax/seeMessage.php';
                        var id = <?php echo $messageRec->id; ?>;
                        $.ajax({
                        type: 'POST',
                        url: url3,
                        data: {
                        id: id
                        },
                        });">
                    <div class="row message">
                        <div class="col-md-3">
                            <img src="<?= $messageRec->imageUrl ?>" alt="<?= $messageRec->username ?> "
                                 style="width: 70px; height:70px;"></div>
                        <div class="col-md-2">
                            <?= $messageRec->username ?>
                        </div>
                    </div>
                </a>
                <?php
            }
        }
        ?>
    </div>
    <div id="messageSent">
        <?php if ($messagesSent != 0) { ?>
            <?php foreach ($messagesSent as $messageSent) { ?>
                <a href="chat.php?senderId=<?= $messageSent->recieverId ?>">
                    <div class="row message">
                        <div class="col-md-3">
                            <img src="<?= $messageSent->imageUrl ?>" alt="<?= $messageSent->username ?> "
                                 style="width: 70px; height:70px;"></div>
                        <div class="col-md-2">
                            <?= $messageSent->username ?>
                        </div>
                    </div>
                </a>
                <?php
            }
        }
        ?>
    </div>
</div>
<br/>
<div class="container pull-right">
    <?php
    if (isset($errorMessage) && count($errorMessage) != 0) {
        echo '<div class=" alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
        foreach ($errorMessage as $error) {
            echo $error . '<br/>';
        }
        echo '</div>';
    }
    if (isset($errorMessage) && count($errorMessage) == 0) {
        echo '<div class=" alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
        echo "Votre message a été envoyé !";
        echo '</div>';
    }
    ?>
    <form method="POST" class="mui-form">
        <div class="panel panel-default">
            <div class="panel-heading">
                <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" style="width: 750px">
            </div>
            <div class="panel-body">
                    <textarea name="message" id="message" name="message" style="height: 200px;width: 750px"
                              placeholder="Votre message"></textarea><br/>
                <button type="submit" name="envoi" value="Envoyez votre message !" id="envoi"
                        class="btn btn-primary">
                    Envoyer
                </button>
            </div>
        </div>
    </form>
</div>

<?php
include("partials/_accountFooter.php");
?>
<script>
    $("document").ready(function () {
        $("div#messageRec").show();
        $("div#messageSent").hide();
        $("#rec").click(function () {
            $("div#messageSent").hide();
            $("div#messageRec").show();
        });
        $("#sent").click(function () {
            $("div#messageRec").hide();
            $("div#messageSent").show();
        });
    });
</script>
