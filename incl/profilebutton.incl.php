<button class="profile" onclick="openProfile()">
    <span><?= userCacheId(sessionIdentify(session_id()))['first_name']; ?> <?= userCacheId(sessionIdentify(session_id()))['last_name']; ?></span>
    <img src="<?= userCacheId(sessionIdentify(session_id()))['pfp']; ?>">
</button>