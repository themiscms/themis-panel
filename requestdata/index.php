<?php include '../gate/login.gate.php'; ?>
<html lang="en">
<head>
    <title>Request data | Themis Panel</title>
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
            <h1>Request collected data</h1>
            <?php include '../incl/profilebutton.incl.php'?>
        </div>
    </header>
    <?php include '../incl/profilewrapper.incl.php';?>
    <section class="display">
        <?php include '../incl/nav.incl.php';?>
        <main>
            <h2>What do you need your data for?</h2>
            <br>
            <form action="../oprs/requestdata.oprs.php" id="datareq">
                <div>
                    <input type="radio" name="data" value="privacy_concerns" checked />
                    <label>Privacy concerns</label>
                    <br>
                    <input type="radio" name="data" value="curiosity" checked />
                    <label>Curiosity</label>
                    <br>
                    <input type="radio" name="data" value="development" checked />
                    <label>Development</label>
                    <br>
                    <input type="radio" name="data" value="other" checked />
                    <label>Other reasons</label>
                </div>
                <br><br>
                <h3>Target Email address</h3>
                <input type="text" placeholder="E-mail" name="email" required min="5" max="512">
                <br><br>
                <button type="submit" class="primary" id="full">Request collected data</button>
            </form>
        </main>
    </section>
</body>
<script src="../incl/profilemenu.incl.js"></script>
<script src="../incl/ntf.incl.js"></script>
</html>