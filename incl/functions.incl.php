<?php

session_start();

function DatabaseConnection($base = "data") {

    switch ($base) {
        case 'data':
            return mysqli_connect("localhost", "root", "", "themis_data", 3306);
        case 'projects':
            return mysqli_connect("localhost", "root", "", "themis_projects", 3306);
    }

}

function pwdHash($pwd) {
    return hash("sha256", $pwd);
}

function tokenHash($token) {
    return hash("sha256", $token);
}

function uidGenerate($length = 32) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}

function tokenGenerate($length = 256) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}

function newPwd($pwd, $user_id) {
    DatabaseConnection()->query("UPDATE `users` SET `password` = '" . pwdHash($pwd) . "' WHERE `user_id` = '" . $user_id . "' LIMIT 1;");
}

function getIp() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function userCacheUsername($usn) {
    $result = DatabaseConnection()->query("SELECT * FROM `users` WHERE `username` = '" . $usn . "' LIMIT 1;");
    return mysqli_fetch_array($result);
}

function userCacheId($userid) {
    $result = DatabaseConnection()->query("SELECT * FROM `users` WHERE `user_id` = '" . $userid . "' LIMIT 1;");
    return mysqli_fetch_array($result);
}

function registerSession($session_id, $user_id, $ip) {
    DatabaseConnection()->query("INSERT INTO `sessions` (`session_id`, `user_id`, `ip`) VALUES ('" . $session_id . "','" . $user_id . "', '" . $ip . "');");
}

function deleteSession($session_id) {
    DatabaseConnection()->query("DELETE FROM `sessions` WHERE `sessions`.`session_id` = '" . $session_id . "';");
}

function registerUser($un, $pwd, $fn, $ln, $mail) {
    $user_id = uidGenerate();
    $token = tokenGenerate(128);
    DatabaseConnection()->query("INSERT INTO `users`(`user_id`, `token`, `username`, `first_name`, `last_name`, `email`, `password`, `register_ip`, `rank`, `pfp`) VALUES ('" . $user_id . "', '$token', '" . $un . "','" . $fn . "','" . $ln . "','" . $mail . "','" . pwdHash($pwd) . "','" . getIp() . "','default','https://static.vecteezy.com/system/resources/thumbnails/009/734/564/small/default-avatar-profile-icon-of-social-media-user-vector.jpg')");
    DatabaseConnection()->query("INSERT INTO `settings`(`user_id`, `apiVisible`, `showEmail`, `showFirstName`, `showLastName`, `signTemplates`) VALUES ('$user_id',1,0,1,1,1)");
}

function userLogged($session_id) {
    $result = DatabaseConnection()->query("SELECT * FROM `sessions` WHERE `session_id` = '" . $session_id . "' LIMIT 1;");
    return mysqli_num_rows($result);
}

function userExistDoes($usn) {
    $result = DatabaseConnection()->query("SELECT * FROM `users` WHERE `username` = '" . $usn . "' LIMIT 1;");
    return mysqli_num_rows($result) < 1;
}

function sessionIdentify($session_id) {
    $result = DatabaseConnection()->query("SELECT * FROM `sessions` WHERE `session_id` = '" . $session_id . "' LIMIT 1;");
    return mysqli_fetch_array($result)["user_id"];
}

function getNewFeatures() {
    $file = file_get_contents("../segments/new.txt");
    $fileF = str_replace("\n", "<br>", $file);
    return $fileF;
}

function updateProfileSettings($id, $firstname, $lastname, $pfp) {
    DatabaseConnection()->query("UPDATE `users` SET `first_name`='" . $firstname . "',`last_name`='" . $lastname . "',`pfp`='" . $pfp . "' WHERE `user_id` = '" . $id . "' LIMIT 1;");
}

function getSettings($user_id) {
    $result = DatabaseConnection()->query("SELECT * FROM `settings` WHERE `user_id` = '" . $user_id . "' LIMIT 1;");
    return mysqli_fetch_array($result);
}

function auditLog($user_id, $date, $action, $subject) {
    DatabaseConnection()->query("INSERT INTO `audit`(`user_id`, `action_date`, `action`, `subject`) VALUES ('" . $user_id . "','" . $date . "','" . $action . "','" . $subject . "');");
}

function matchAction($code) {
    switch ($code) {
        case 'login': return "Logged into the administration";
        case 'modify-profile': return "Changed profile settings";
        case 'project-create': return "Created a project";
        case 'project-element': return "Modified a project";
        case 'project-edit': return "Edited a project";
    }
}

function listAudit($user_id) {
    $result = DatabaseConnection()->query("SELECT * FROM `audit` WHERE `user_id` = '" . $user_id . "' ORDER BY `action_date` DESC LIMIT 150;");
    while ($r = mysqli_fetch_array($result)) {
        echo '
            <tr>
            
            <td>' . $r["id"] . '</td>
            <td>' . matchAction($r["action"]) . '</td>
            <td>' . $r["action_date"] . '</td>
            <td>' . $r["subject"] . '</td>
            
</tr>
        ';
    }
}

function listProjects($author) {
    $result = DatabaseConnection()->query("SELECT * FROM `projects` WHERE `author` = '$author' AND `enabled` = 1 LIMIT 3");
    while ($r = mysqli_fetch_array($result)) {
        echo '
            <a href="../project?pid=' . $r["projectid"] . '">
                <button class="project" id="project">
                    <h3>' . $r["name"] . '</h3>
                    <p>' . templateCacheId($r["template"])["name"] . '</p>
                    <br>
                    <p>Online</p>
                </button>
            </a>
        ';
    }
}



function updatePrivacySettings($id, $apiVisible, $showEmail, $showFirstName, $showLastName, $signTemplates) {
    DatabaseConnection()->query("UPDATE `settings` SET `apiVisible`='$apiVisible',`showEmail`='$showEmail',`showFirstName`='$showFirstName',`showLastName`='$showLastName',`signTemplates`='$signTemplates' WHERE `user_id` = '$id' LIMIT 1;");
}

function listSessionsUser($user_id) {
    $result = DatabaseConnection()->query("SELECT * FROM `sessions` WHERE `user_id` = '" . $user_id . "';");
    while ($r = mysqli_fetch_array($result)) {
        echo '
            <tr>
            
            <td>' . $r["session_id"] . '</td>
            <td>' . $r["ip"] . '</td>
            <td>' . $r["action_date"] . '</td>
            <td>' . $r["subject"] . '</td>
            
</tr>
        ';
    }
}

function userProjectNum($user_id) {
    $result = DatabaseConnection()->query("SELECT * FROM `projects` WHERE `author` = '$user_id';");
    return mysqli_num_rows($result);
}

function listTemplate() {
    $result = DatabaseConnection()->query("SELECT * FROM `templates`");
    while ($r = mysqli_fetch_array($result)) {
        echo '<option value="' . $r["template_id"] . '">' . $r["name"] . '</option>';
    }
}

function pidGenerate($length = 16) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}

function logProject($user_id, $name, $project_id, $token, $template_id) {
    DatabaseConnection()->query("INSERT INTO `projects`(`projectid`, `name`, `token`, `author`, `enabled`, `template`) VALUES ('$project_id', '$name', '$token', '$user_id', 1, '$template_id');");
}

function cacheProjectId($pid) {
    $result = DatabaseConnection()->query("SELECT * FROM `projects` WHERE `projectid` = '$pid' LIMIT 1;");
    return mysqli_fetch_array($result);
}

function templateCacheId($tid) {
    $result = DatabaseConnection()->query("SELECT * FROM `templates` WHERE `template_id` = '$tid' LIMIT 1;");
    return mysqli_fetch_array($result);
}

function listElementEditFields($tid) {
    switch ($tid) {
        case '61844300':
            echo '
            <label for="debug.table.key1">Key 1</label>
            <input type="text" name="debug.table.key1" placeholder="Key 1" value="">
            ';
            echo '
            <label for="debug.table.key2">Key 2</label>
            <input type="text" name="debug.table.key2" placeholder="Key 2">
            ';
            echo '
            <label for="debug.table.key3">Key 3</label>
            <input type="text" name="debug.table.key3" placeholder="Key 3">
            ';
    }
}

function formatRank($rank) {
    switch ($rank) {
        case 'founder': return '<span style="color: #ffffff; font-weight: bold; font-size: 11px; padding: 3px; background-color: rgba(255,168,56,1); border-radius: 5px;">Founder</span>';
        case 'default': return '<span style="color: #ffffff; font-weight: bold; font-size: 11px; padding: 3px; background-color: rgb(152,255,0); border-radius: 5px;">Client</span>';
        case 'coop': return '<span style="color: #ffffff; font-weight: bold; font-size: 11px; padding: 3px; background-color: rgb(0,255,119); border-radius: 5px;">Cooperation</span>';
        case 'support': return '<span style="color: #ffffff; font-weight: bold; font-size: 11px; padding: 3px; background-color: rgb(22,121,246); border-radius: 5px;">Support</span>';
        case 'admin': return '<span style="color: #ffffff; font-weight: bold; font-size: 11px; padding: 3px; background-color: rgb(208,77,77); border-radius: 5px;">Admin</span>';
    }
}

function disableProject($pid) {
    DatabaseConnection()->query("UPDATE `projects` SET `enabled` = '0' WHERE `projects`.`projectid` = '$pid';");
}

function editElement($projectid, $element, $value) {
    $result = DatabaseConnection("projects")->query("UPDATE `$projectid` SET `value` = '$value' WHERE `$projectid`.`id_key` = '$element' LIMIT 1;");
}

function getElement($projectid, $element, $key) {
    $json = file_get_contents('https://api.themiscms.eu/element.php?projectid=' . config()['projectid'] . '&token=' . config()['token'] . '&element=' . $key);
    $obj = json_decode($json);
    return $obj;
}