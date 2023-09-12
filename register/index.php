<html lang="en">
<head>
    <title>Register to Themis panel</title>
    <?php include '../incl/head.incl.php'; ?>
</head>
<body class="splash">
<img src="../img/logo/glyph_hd_white.png" width="300" id="r1i">
<div class="box" id="r1">
    <form action="../oprs/register.oprs.php">
    <h1>Create a new account</h1>
    <span>By creating an account you agree <br> to the <a href="https://themiscms.eu/tos" style="color: #030303; display: inline; font-weight: normal; text-decoration: underline">Terms of Service</a></span>
    <div style="height: 40px"></div>
        <input type="text" placeholder="E-mail" name="email" required min="5" max="512">
        <p></p>
        <a href="../register">Already a member?</a>
        <p></p>
        <button id="full" class="primary">Continue</button>
    </form>
</div>
<span id="copyright">Copyright © 2023, Themis CMS - All rights reserved</span>
</body>
</html>