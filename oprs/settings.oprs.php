<?php

include '../gate/login.gate.php';

if (
    !isset($_GET['theme'])
) {
    die();
}

$theme = $_GET['theme'];
updateThemeSetting(sessionIdentify(session_id()), $theme);

header("Location: ../settings");
