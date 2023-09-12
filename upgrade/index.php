<?php include '../gate/login.gate.php'; ?>

<html lang="en">
<head>
    <title>Go Premium! | Themis Panel</title>
    <?php include '../incl/head.incl.php'; ?>
</head>
<body class="fullpage">
<?php include '../incl/support.incl.php'; ?>
<div class="notification" id="ntfbar">
    <span id="ntfSpan">Don't mess with the URL parameters please.</span>
    <button onclick="hideNotification()">Dismiss</button>
</div>
    <header>
        <div class="logo">
            <?php include '../incl/logo.incl.php'?>
        </div>
        <div class="infobar">
            <h1>Go Premium!</h1>
            <?php include '../incl/profilebutton.incl.php'?>
        </div>
    </header>
    <?php include '../incl/profilewrapper.incl.php';?>
    <section class="display">
        <?php include '../incl/nav.incl.php';?>
        <main>
            <h1>We are glad you want to upgrade your account!</h1>
            <br>
            <p>Sadly, premium feature is <b>not yet supported</b>.</p>
            <br><br>
            <h3>Redeem a premium gift code</h3>
            <br>
            <form action="../oprs/premiumcode.oprs.php" method="get">
                <input type="text" name="code" required placeholder="Your code" minlength="8" maxlength="8"><br><br>
                <button class="primary" id="full">Redeem code</button>
            </form>
        </main>
    </section>
</body>
<script src="../incl/profilemenu.incl.js"></script>
<script src="../incl/ntf.incl.js"></script>
</html>