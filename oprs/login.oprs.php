<?php

include '../incl/functions.incl.php';


if (!isset($_GET['username']) || !isset($_GET['password'])) {
    echo "u no data haben";
    die();
}

$un = $_GET['username'];
$pw = $_GET['password'];

if (userLogged(session_id()) > 0) {
    header("Location: ../homepage");
    die();
}

if (userExistDoes($un)) {
    header("Location: ../?err=userNot");
    die();
}

if (pwdHash($pw) == userCacheUsername($un)['password']) {
    registerSession(session_id(), userCacheUsername($un)["user_id"], getIp());
    auditLog(userCacheUsername($un)['user_id'], date("Y-m-d H:i:s"), "login", getIp());
    header("Location: ../homepage");
    die();
}
else {
    header("Location: ../?err=passwordWrong");
    die();
}

?>