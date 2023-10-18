<?php include '../gate/login.gate.php'; ?>

<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <title>New project | Themis Panel</title>
    <?php include '../incl/head.incl.php'; ?>
</head>
<body class="fullpage">
<?php include '../incl/support.incl.php'; ?>
    <header>
        <div class="logo">
            <?php include '../incl/logo.incl.php'?>
        </div>
        <div class="infobar">
            <h1>New project</h1>
            <?php include '../incl/profilebutton.incl.php'?>
        </div>
    </header>
    <?php include '../incl/profilewrapper.incl.php';?>
    <section class="display">
        <?php include '../incl/nav.incl.php';?>
        <main>
            <div class="projectflex">
                <div class="projectlimit">
                    <div class="projectfilled" style="width: <?= userProjectNum(sessionIdentify(session_id())) * 100 / 5; ?>%;"><span><?= userProjectNum(sessionIdentify(session_id())); ?></span></div>
                </div>
                <span><?= userProjectNum(sessionIdentify(session_id())); ?>/5 projects created</span>
                <span><a href="../upgrade">Activate a premium</a> to get more projects.</span>
            </div>
            <br>
            <form action="../oprs/newproject.oprs.php">
                <h2>Project settings</h2>
                <div class="flexdivider">
                    <div>
                        <label for="name">Name</label>
                        <input type="text" name="name" placeholder="Pick a name for your project" required minlength="2" maxlength="32">
                    </div>
                    <div style="width: 60px;"></div>
                    <div>
                        <label for="template">Template</label>
                        <select name="template" required>
                            <?php listTemplate(); ?>
                        </select>
                    </div>
                    <div style="width: 60px;"></div>
                    <div>
                        <label for="url">URL</label>
                        <input type="text" name="url" placeholder="Insert your website URL" required minlength="3" maxlength="128">
                    </div>
                </div>
                <br>
                <h2>Advanced settings</h2>
                <p style="color: #FB5151">Leave as is unless you understand what you're doing!</p>
                <div class="flexdivider" id="as">
                    <div>
                        <label for="sec">Security</label>
                        <select name="sec" required>
                            <option value="full" selected>Only access through the panel (recommended)</option>
                            <option value="partial">Enable secured external API access</option>
                        </select>
                    </div>
                    <div style="width: 60px;"></div>
                    <div>
                        <label for="sec">Protocol</label>
                        <select name="sec" required>
                            <option value="full" selected>HTTPS</option>
                            <option value="partial">HTTP (unsafe)</option>
                        </select>
                    </div>
                    <div style="width: 60px;"></div>
                    <div>
                        <label for="status">Status feature</label>
                        <select name="status" required>
                            <option value="none">Disable status requests</option>
                            <option value="ping" selected>Status data via an on-site API (recommended)</option>
                            <option value="cron">Send status data to Themis with CRON requests</option>
                        </select>
                        <label for="statusfre">Status frequency (5 - 43200 sec)</label>
                        <input type="number" name="statusfre" value="10" placeholder="Time in seconds" min="5" maxlength="43200">
                    </div>
                </div>
                <br>
                <input type="checkbox"> <span>By creating a project, I confirm my understanding and acceptance of the <a href="https://themiscms.eu/tos">Terms of Service</a> I agreed to upon registration.</span><br>
                <br>
                <button id="full" class="primary">Create</button>
            </form>
            <?php
            $input = "https://way2tutorial.com";
            $input = preg_replace( "#^[^:/.]*[:/]+#i", "", $input );

            /* Output way2tutorial.com */
            echo $input;
            ?>
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