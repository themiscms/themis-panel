<?php include '../incl/headglobal.incl.php'; ?>
<?php

if (getSettings(sessionIdentify(session_id()))['darkmode'] == 1) {
    echo '<link rel="stylesheet" href="../incl/dark.incl.css">';
}

?>