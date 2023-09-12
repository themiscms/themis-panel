<?php include '../gate/login.gate.php'; ?>

<html lang="en">
<head>
    <title>Homepage | Themis Panel</title>
    <?php include '../incl/head.incl.php'; ?>
</head>
<body class="fullpage">
<?php include '../incl/support.incl.php'; ?>
    <header>
        <div class="logo">
            <?php include '../incl/logo.incl.php'?>
        </div>
        <div class="infobar">
            <h1>Homepage</h1>
            <?php include '../incl/profilebutton.incl.php'?>
        </div>
    </header>
    <?php include '../incl/profilewrapper.incl.php';?>
    <section class="display">
        <?php include '../incl/nav.incl.php';?>
        <main>
            <div class="flexdivider" style="gap: 400px">
                <div class="flexside">
                    <h2>Welcome to Themis!</h2>
                    <br><br>
                    <h3 style="color: #7876E8">What's new?</h3>
                    <ul style="margin-left: 20px;">
                        <li>Not your mom</li>
                        <li>Boobies</li>
                    </ul>
                </div>
                <div class="flexside">
                    <img src="../img/wave.png" style="width: 300px">
                </div>
            </div>
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