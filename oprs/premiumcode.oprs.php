<?php include '../gate/login.gate.php';

if (!isset($_GET['code'])) {
    header("Location: ../upgrade?ntf=noSupplyCode");
    die();
}

$code = $_GET['code'];

if (strlen($code) != 8) {
    header("Location: ../upgrade?ntf=noSupplyCode");
    die();
}

if (!verifyCode($code)) {
    header("Location: ../upgrade?ntf=invalidGiftCode");
    die();
}