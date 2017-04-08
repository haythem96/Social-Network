<?php
    session_start();
    include("filters/guest_filter.php");
    include("filters/init.php");
    require("views/index.view.php");
?>