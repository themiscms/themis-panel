<?php include '../gate/login.gate.php'; $id = sessionIdentify(session_id()); ?>

<html lang="en">
<head>
    <title>My Projects | Themis Panel</title>
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
            <h1>My Projects</h1>
            <?php include '../incl/profilebutton.incl.php'?>
        </div>
    </header>
    <?php include '../incl/profilewrapper.incl.php';?>
    <section class="display">
        <?php include '../incl/nav.incl.php';?>
        <main>
            <div class="projects">
                <?php listProjects($id); ?>
            </div>
        </main>
    </section>
</body>
<script src="../incl/profilemenu.incl.js"></script>
<script src="../incl/ntf.incl.js"></script>
</html>