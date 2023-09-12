<img src="../img/logo/<?php
if (getSettings(sessionIdentify(session_id()))['darkmode'] == 0) {
    echo "full_hd_colored.png";
} else {
    echo "full_hd_white.png";
}?>">