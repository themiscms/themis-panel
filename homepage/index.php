<html lang="en">
<head>
    <title>Log into Themis panel</title>
    <?php include '../incl/head.incl.php'; ?>
</head>
<body class="splash">
<div class="box">
    <h1>Log into Themis panel</h1>
    <div style="height: 40px"></div>
    <form action="../oprs/login.oprs.php">
        <input type="text" placeholder="Username" name="username" required min="3" max="16">
        <input type="password" placeholder="Password" name="password" required min="3" max="16">
        <p></p>
        <a href="../forgor">Forgot your password?</a>
        <a href="../register">Create a new account</a>
        <p></p>
        <button id="full" class="primary">Log in</button>
    </form>
</div>
<img src="../img/logo/glyph_hd_white.png" width="300">
</body>
</html>