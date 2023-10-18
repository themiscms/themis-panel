<?php include '../gate/login.gate.php'; ?>

<html lang="en">
<head>
    <title>Settings | Themis Panel</title>
    <?php include '../incl/head.incl.php'; ?>
</head>
<body class="fullpage">
<?php include '../incl/support.incl.php'; ?>
    <header>
        <div class="logo">
            <?php include '../incl/logo.incl.php'?>
        </div>
        <div class="infobar">
            <h1>Settings</h1>
            <?php include '../incl/profilebutton.incl.php'?>
        </div>
    </header>
    <?php include '../incl/profilewrapper.incl.php';?>
    <section class="display">
        <?php include '../incl/nav.incl.php';?>
        <main>
            <h3>Appearence</h3>
            <br><br>
            <form action="../oprs/settings.oprs.php">
                <select name="theme">
                    <option value="0" <?php

                    if (getSettings(sessionIdentify(session_id()))['darkmode'] == 0) {
                        echo 'selected';
                    }

                    ?>>Light</option>
                    <option value="1" <?php

                    if (getSettings(sessionIdentify(session_id()))['darkmode'] == 1) {
                        echo 'selected';
                    }

                    ?>>Dark</option>
                </select>
                <br><br>
                <button id="full" class="primary">Save</button>
            </form>
        </main>
    </section>
</body>
<script>
    const profile = document.getElementById("profilewrapper");

    function closeProfile() {
        profile.style.display = "none";
    }

    function openProfile() {
        profile.style.display = "block";
    }
</script>
</html>