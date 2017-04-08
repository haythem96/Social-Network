<!-- Navigation Bar -->
<div class="navbar-fixed">
    <nav style="height: 60px">
        <div class="nav-wrapper grey darken-4" role="navigation">
            <div class="brand-logo">
                <img src="<?php echo $url1 ?>" style="width: 35px;height: 35px"><span
                        style="font-size: 19px"> <?php echo $_SESSION['username'] ?></span>
            </div>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="feed.php?id=<?php echo $_SESSION['id'] ?>"><i class="material-icons" role="presentation">menu</i></a>
                </li>
                <li><a href="profile.php?id=<?php echo $_SESSION['id'] ?>"><i class="material-icons">book</i></a></li>
                <li><a href="friends.php?id=<?php echo $_SESSION['id'] ?>"><i
                                class="material-icons">supervisor_account</i></a></li>
                <li><i class="mdl-badge mdl-badge--overlap" name="friendNumber" id="friendNumber" data-badge="0"></i>
                </li>
                <li><a href="message.php?id=<?php echo $_SESSION['id'] ?>"><i class="material-icons">question_answer</i></a>
                </li>
                <li><i class="mdl-badge mdl-badge--overlap" name="messageNumber" id="messageNumber" data-badge="0"></i>
                </li>
                <li><a href="account.php?id=<?php echo $_SESSION['id'] ?>"><i class="material-icons"
                                                                              role="presentation">settings</i></a></li>
                <li><a href="logout.php"><i class="material-icons" role="presentation">power_settings_new</i></a></li>
            </ul>
        </div>
    </nav>
</div>
