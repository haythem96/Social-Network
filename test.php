<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Reseau Sociale">
    <meta name="author" content="Sellami Haythem">

    <link rel="stylesheet" href="assets/css/account.css">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Website Font style -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

    <!-- Material Design Lite -->
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <!-- Material Design icon font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="public/images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="public/images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="public/images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="public/images/favicon.png">

    <!-- FONT -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.cyan-light_blue.min.css">

    <!-- MD Bootstrap  -->
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.2.0/css/mdb.min.css">

    <!-- Compiled and minified CSS Materialize-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

</head>
<body>

<nav>
    <div class="nav-wrapper">
        <div class="brand-logo">
            <img src="<?php echo $url1 ?>" class=" demo-avatar"><?php echo $_SESSION['username']?>
        </div>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="feed.php?id=<?php echo $_SESSION['id'] ?>"><i class="material-icons"
                                                                       role="presentation">timeline</i></a></li>
            <li><a href="profile.php?id=<?php echo $_SESSION['id'] ?>"><i class="material-icons">book</i></a></li>
            <li><a href="#"><i class="material-icons">question_answer</i></a></li>
            <li><a href="friends.php?id=<?php echo $_SESSION['id'] ?>"><i name="friendNumber" id="friendNumber" class="material-icons ">account_box</i></a></li>
            <li><span class="mdl-badge mdl-badge--overlap" data-badge="12"></span></li>
            <li><a href="account.php?id=<?php echo $_SESSION['id'] ?>"><i class="material-icons" role="presentation">settings</i></a></li>
            <li><a href="logout.php"><i class="material-icons" role="presentation">power_settings_new</i></a></li>
        </ul>
    </div>
</nav>

</body>

<!-- jQuery 3.1.1 -->
<script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous">
</script>

<!-- Bootstrap core JavaScript-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</body>

<!-- Material Design -->
<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>

<!-- Timeago plugin -->
<script src="assets/js/jquery.timeago.js"></script>
<script src="assets/js/jquery.timeago.fr.js"></script>


<!-- MDB JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.2.0/js/mdb.min.js"></script>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<!-- Compiled and minified JavaScript Materialize-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

<script src="assets/js/script.js"></script>

</html>



<!--
<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
    <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
            <img src="<?php echo $url1 ?>" class="demo-avatar">
            <div class="demo-avatar-dropdown">
                <span><?php echo $_SESSION['username']?></span>
            </div>
        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
            <a class="mdl-navigation__link" href="feed.php?id=<?php echo $_SESSION['id'] ?>"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">timeline</i>Accueil</a>
            <a class="mdl-navigation__link" href="profile.php?id=<?php echo $_SESSION['id'] ?>"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">book</i>Profile</a>
            <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">question_answer</i>Message</a>
            <a class="mdl-navigation__link" href="friends.php?id=<?php echo $_SESSION['id'] ?>"><i name="friendNumber" id="friendNumber" class="material-icons mdl-badge mdl-badge--overlap" data-badge="0">account_box</i>Amis</a>
            <a class="mdl-navigation__link" href="account.php?id=<?php echo $_SESSION['id'] ?>"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">account_box</i>Mon compte</a>
            <div class="mdl-layout-spacer"></div>
            <a class="mdl-navigation__link" href="logout.php">
                <i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">power_settings_new</i>Deconnecter</a>
        </nav>
    </div>
</div>


-->
