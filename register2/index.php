<html lang="en">
<head>
    <title>Register to Themis panel</title>
    <?php include '../incl/headunlogged.incl.php'; ?>
</head>
<body class="splash">
<div class="box">
    <form action="../oprs/register.oprs.php">
        <h1>Create a new account</h1>
        <div style="height: 40px"></div>
        <div>
            <div style="background-color: #FB5151; padding: 10px; border-radius: 10px 10px 0px 0px">
                <span id="hello">HELLO</span>
                <span id="minombre">my name is...</span>
            </div>
            <div><input type="text" placeholder="Enter your username..." name="username" id="usnReg" required min="3" max="16"></div>
            <div style="background-color: #FB5151; padding: 10px; border-radius: 0px 0px 10px 10px"></div>
        </div>
        <button id="full" class="primary">Continue</button>
    </form>
</div>
<span id="copyright">Copyright © 2023, Themis CMS - All rights reserved</span>
</body>
</html>