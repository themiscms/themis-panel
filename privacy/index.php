<?php include '../gate/login.gate.php'; ?>

<html lang="en">
<head>
    <title>Privacy settings | Themis Panel</title>
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
            <h1>Privacy settings</h1>
            <?php include '../incl/profilebutton.incl.php'?>
        </div>
    </header>
    <?php include '../incl/profilewrapper.incl.php';?>
    <section class="display">
        <?php include '../incl/nav.incl.php';?>
        <main>
            <form action="">
                <div class="switchrow">
                    <span id="label">Show my first name on my profile</span>
                    <div id="switchWrapper">
                        <label class="switch">
                            <input type="checkbox" name="fn">
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
                <div class="switchrow">
                    <span id="label">Show my last name on my profile</span>
                    <div id="switchWrapper">
                        <label class="switch">
                            <input type="checkbox" name="ln">
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
                <div class="switchrow">
                    <span id="label">Enable API access to my account</span>
                    <div id="switchWrapper">
                        <label class="switch">
                            <input type="checkbox" name="api">
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
                <div class="switchrow">
                    <span id="label">Show my details to the Themis support</span>
                    <div id="switchWrapper">
                        <label class="switch">
                            <input type="checkbox" name="support">
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
                <button type="submit" class="primary" id="full">Save</button>
            </form>
            <br>
            <h3>Other tools</h3>
            <br>
            <p>We can send you all the data we collected about you so far.</p>
            <br>
            <a href="../requestdata"><button class="secondary" id="full">Request collected data</button></a>

        </main>
    </section>
</body>
<script src="../incl/profilemenu.incl.js"></script>
<script src="../incl/ntf.incl.js"></script>
</html>