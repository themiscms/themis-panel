<?php

include "../incl/functions.incl.php";

if (userLogged(session_id()) < 1) {
    header("Location: ../login");
    die();
}