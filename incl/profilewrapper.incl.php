<div id="profilewrapper">
    <div id="profilebox">
        <div id="profileinfo">
            <img src="<?= userCacheId(sessionIdentify(session_id()))['pfp']; ?>">
            <div class="profilecred">
                <b><?= userCacheId(sessionIdentify(session_id()))['first_name']; ?> <?= userCacheId(sessionIdentify(session_id()))['last_name']; ?></b>
                <p><?= userCacheId(sessionIdentify(session_id()))['username']; ?> • <?= formatRank(userCacheId(sessionIdentify(session_id()))['rank']); ?></p>
            </div>
            <button onclick="closeProfile()" style=" border: none; background: none; transform: translateY(-20px); padding: 5px">
                <img src="../img/icons/close.svg" style="width: 10px; align-self: flex-start; border: none; background: none;">
            </button>
        </div>
        <a href="../profile" class="profilelink" id="nl"><img src="../img/icons/user.svg">My profile</a>
        <a href="../usersettings" class="profilelink" id="nl"><img src="../img/icons/usettings.svg">Profile settings</a>
        <a href="../privacy" class="profilelink" id="nl"><img src="../img/icons/privacy.svg">Privacy settings</a>
        <a href="../billing" class="profilelink" id="nl"><img src="../img/icons/billing.svg">Billing</a>
        <a href="../billing" class="profilelink" id="nl"><img src="../img/icons/support.svg">Support</a>
        <a href="../upgrade" class="profilelink" style="color: #7876E8"><img src="../img/icons/upgrade.svg">Go Premium!</a>
        <a href="../oprs/logout.php" class="profilelink" id="logout" style="color: #FB5151;"><img src="../img/icons/logout.svg">Log out</a>
    </div>
</div>