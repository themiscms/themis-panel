<?php include '../gate/login.gate.php';


if (!isset($_GET['pid'])) {
    header("Location: ../projects");
}

$id = $_GET['pid'];

$name = cacheProjectId($id)['name'];
$author = userCacheId(cacheProjectId($id)['author'])['username'];
$template = templateCacheId(cacheProjectId($id)['template'])['name'];
$tempAthr = templateCacheId(cacheProjectId($id)['template'])['author'];
$tempAthrFN = userCacheId($tempAthr)['first_name'];
$tempAthrLN = userCacheId($tempAthr)['last_name'];

?>

<html lang="en">
<head>
    <title><?= $name ?> | Themis Panel</title>
    <?php include '../incl/head.incl.php'; ?>
</head>
<body class="fullpage">
<?php include '../incl/support.incl.php'; ?>
<div class="notification" id="ntfbar">
    <span id="ntfSpan">Don't mess with the URL parameters please.</span>
    <button onclick="hideNotification()">Dismiss</button>
</div>
    <header>
        <div class="logo">
            <?php include '../incl/logo.incl.php'?>
        </div>
        <div class="infobar">
            <h1><?= $name ?></h1>
            <?php include '../incl/profilebutton.incl.php'?>
        </div>
    </header>
    <?php include '../incl/profilewrapper.incl.php';?>
    <section class="display">
        <?php include '../incl/nav.incl.php';?>
        <main id="projectpage">
            <div id="left">
                <div id="toolbox">
                    <h3>Toolbox</h3>
                    <br>
                    <div class="btnrow">
                        <a href="">
                            <button class="primary" id="small"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                    <path d="M1 2.75C1 2.28587 1.18437 1.84075 1.51256 1.51256C1.84075 1.18437 2.28587 1 2.75 1H27.25C27.7141 1 28.1592 1.18437 28.4874 1.51256C28.8156 1.84075 29 2.28587 29 2.75V6.25C29 6.71413 28.8156 7.15925 28.4874 7.48744C28.1592 7.81563 27.7141 8 27.25 8H2.75C2.28587 8 1.84075 7.81563 1.51256 7.48744C1.18437 7.15925 1 6.71413 1 6.25V2.75ZM1 16.75C1 16.2859 1.18437 15.8408 1.51256 15.5126C1.84075 15.1844 2.28587 15 2.75 15H13.25C13.7141 15 14.1592 15.1844 14.4874 15.5126C14.8156 15.8408 15 16.2859 15 16.75V27.25C15 27.7141 14.8156 28.1592 14.4874 28.4874C14.1592 28.8156 13.7141 29 13.25 29H2.75C2.28587 29 1.84075 28.8156 1.51256 28.4874C1.18437 28.1592 1 27.7141 1 27.25V16.75ZM22 16.75C22 16.2859 22.1844 15.8408 22.5126 15.5126C22.8408 15.1844 23.2859 15 23.75 15H27.25C27.7141 15 28.1592 15.1844 28.4874 15.5126C28.8156 15.8408 29 16.2859 29 16.75V27.25C29 27.7141 28.8156 28.1592 28.4874 28.4874C28.1592 28.8156 27.7141 29 27.25 29H23.75C23.2859 29 22.8408 28.8156 22.5126 28.4874C22.1844 28.1592 22 27.7141 22 27.25V16.75Z" stroke="#F9F9F9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg></button>
                        </a>
                        <div></div>
                        <div></div>
                        <div></div>
                        <a>
                            <button class="primary" id="small">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                                    <path d="M24.9726 9.47397L18.4613 3.03014L20.6062 0.882192C21.1935 0.294064 21.9151 0 22.771 0C23.6269 0 24.348 0.294064 24.9343 0.882192L27.0792 3.03014C27.6665 3.61826 27.9729 4.32811 27.9984 5.15967C28.0239 5.99123 27.7431 6.70057 27.1558 7.28767L24.9726 9.47397ZM22.7511 11.737L6.51126 28H0V21.4795L16.2398 5.21644L22.7511 11.737Z" fill="#F9F9F9"/>
                                </svg></button>
                        </a>
                        <a>
                            <button class="primary" id="small"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                                    <path d="M4 19V18H2V19C2 20.8565 2.7375 22.637 4.05025 23.9497C5.36301 25.2625 7.14348 26 9 26H12V24H9C7.67392 24 6.40215 23.4732 5.46447 22.5355C4.52678 21.5979 4 20.3261 4 19ZM22 9V10H24V9C24 7.14349 23.2625 5.36301 21.9497 4.05025C20.637 2.7375 18.8565 2 17 2H14V4H17C17.6566 4 18.3068 4.12933 18.9134 4.3806C19.52 4.63188 20.0712 5.00017 20.5355 5.46447C20.9998 5.92876 21.3681 6.47996 21.6194 7.08659C21.8707 7.69321 22 8.34339 22 9ZM9 9H3C2.20435 9 1.44129 9.31607 0.87868 9.87868C0.316071 10.4413 0 11.2044 0 12V14H2V12C2 11.7348 2.10536 11.4804 2.29289 11.2929C2.48043 11.1054 2.73478 11 3 11H9C9.26522 11 9.51957 11.1054 9.70711 11.2929C9.89464 11.4804 10 11.7348 10 12V14H12V12C12 11.2044 11.6839 10.4413 11.1213 9.87868C10.5587 9.31607 9.79565 9 9 9ZM6 8C6.79113 8 7.56448 7.76541 8.22228 7.32588C8.88008 6.88635 9.39277 6.26164 9.69552 5.53074C9.99827 4.79983 10.0775 3.99556 9.92314 3.21964C9.7688 2.44372 9.38784 1.73098 8.82843 1.17157C8.26902 0.612165 7.55629 0.231202 6.78036 0.0768607C6.00444 -0.0774802 5.20017 0.00173312 4.46927 0.304484C3.73836 0.607234 3.11365 1.11992 2.67412 1.77772C2.2346 2.43552 2 3.20888 2 4C2 5.06087 2.42143 6.07828 3.17157 6.82843C3.92172 7.57857 4.93913 8 6 8ZM6 2C6.39556 2 6.78224 2.1173 7.11114 2.33706C7.44004 2.55683 7.69638 2.86918 7.84776 3.23463C7.99913 3.60009 8.03874 4.00222 7.96157 4.39018C7.8844 4.77814 7.69392 5.13451 7.41421 5.41422C7.13451 5.69392 6.77814 5.8844 6.39018 5.96157C6.00222 6.03874 5.60009 5.99914 5.23463 5.84776C4.86918 5.69639 4.55682 5.44004 4.33706 5.11114C4.1173 4.78224 4 4.39556 4 4C4 3.46957 4.21071 2.96086 4.58579 2.58579C4.96086 2.21072 5.46957 2 6 2ZM25 23H19C18.2044 23 17.4413 23.3161 16.8787 23.8787C16.3161 24.4413 16 25.2044 16 26V28H18V26C18 25.7348 18.1054 25.4804 18.2929 25.2929C18.4804 25.1054 18.7348 25 19 25H25C25.2652 25 25.5196 25.1054 25.7071 25.2929C25.8946 25.4804 26 25.7348 26 26V28H28V26C28 25.2044 27.6839 24.4413 27.1213 23.8787C26.5587 23.3161 25.7956 23 25 23ZM18 18C18 18.7911 18.2346 19.5645 18.6741 20.2223C19.1136 20.8801 19.7384 21.3928 20.4693 21.6955C21.2002 21.9983 22.0044 22.0775 22.7804 21.9231C23.5563 21.7688 24.269 21.3878 24.8284 20.8284C25.3878 20.269 25.7688 19.5563 25.9231 18.7804C26.0775 18.0044 25.9983 17.2002 25.6955 16.4693C25.3928 15.7384 24.8801 15.1136 24.2223 14.6741C23.5645 14.2346 22.7911 14 22 14C20.9391 14 19.9217 14.4214 19.1716 15.1716C18.4214 15.9217 18 16.9391 18 18ZM24 18C24 18.3956 23.8827 18.7822 23.6629 19.1111C23.4432 19.44 23.1308 19.6964 22.7654 19.8478C22.3999 19.9991 21.9978 20.0387 21.6098 19.9616C21.2219 19.8844 20.8655 19.6939 20.5858 19.4142C20.3061 19.1345 20.1156 18.7781 20.0384 18.3902C19.9613 18.0022 20.0009 17.6001 20.1522 17.2346C20.3036 16.8692 20.56 16.5568 20.8889 16.3371C21.2178 16.1173 21.6044 16 22 16C22.5304 16 23.0391 16.2107 23.4142 16.5858C23.7893 16.9609 24 17.4696 24 18Z" fill="#F9F9F9"/>
                                </svg></button>
                        </a>
                        <a>
                            <button class="negative" id="small"><img src="../img/icons/stop.svg"></button>
                        </a>
                        <br>
                    </div>
                </div>
                <div id="information">
                    <h3>Information</h3>
                    <div class="projectinfo">
                        <div id="pp">
                            <span id="smol">Name</span>
                            <span id="bick"><?= $name ?></span>
                        </div>
                        <div id="pp">
                            <span id="smol">Author</span>
                            <span id="bick"><?= $author ?></span>
                        </div>
                        <div id="pp">
                            <span id="smol">Template</span>
                            <span id="bick"><?= $template ?></span>
                        </div>
                        <div id="pp">
                            <span id="smol">Template author</span>
                            <span id="bick"><?= $tempAthrFN ?> <?= $tempAthrLN ?></span>
                        </div>
                        <div id="pp">
                            <span id="smol">Domain</span>
                            <span id="bick">Lorem Ipsum</span>
                        </div>
                        <div id="pp">
                            <span id="smol">Collaborators</span>
                            <span id="bick">Lorem Ipsum</span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="right">
                <h3>Project log</h3>
                <span>Loaded on <?= date('H:i:s d.m.Y') ?></span>
                <div class="plog">
                    <p id="log">
                        <span id="time">10:59:41</span>
                        <span id="type" class="info">[INFO]</span>
                        <span id="cnt">Your mother has been fucked</span>
                    </p>
                    <p id="log">
                        <span id="time">10:59:41</span>
                        <span id="type" class="info">[INFO]</span>
                        <span id="cnt">Your mother has been fucked</span>
                    </p>
                    <p id="log">
                        <span id="time">10:59:41</span>
                        <span id="type" class="info">[INFO]</span>
                        <span id="cnt">Your mother has been fucked</span>
                    </p>
                    <p id="log">
                        <span id="time">10:59:41</span>
                        <span id="type" class="info">[INFO]</span>
                        <span id="cnt">Your mother has been fucked</span>
                    </p>
                    <p id="log">
                        <span id="time">10:59:41</span>
                        <span id="type" class="info">[INFO]</span>
                        <span id="cnt">Your mother has been fucked</span>
                    </p>
                    <p id="log">
                        <span id="time">10:59:41</span>
                        <span id="type" class="info">[INFO]</span>
                        <span id="cnt">Your mother has been fucked</span>
                    </p>
                    <p id="log">
                        <span id="time">10:59:41</span>
                        <span id="type" class="info">[INFO]</span>
                        <span id="cnt">Your mother has been fucked</span>
                    </p>
                    <p id="log">
                        <span id="time">10:59:41</span>
                        <span id="type" class="info">[INFO]</span>
                        <span id="cnt">Your mother has been fucked</span>
                    </p>
                    <p id="log">
                        <span id="time">10:59:41</span>
                        <span id="type" class="info">[INFO]</span>
                        <span id="cnt">Your mother has been fucked</span>
                    </p>
                    <p id="log">
                        <span id="time">10:59:41</span>
                        <span id="type" class="info">[INFO]</span>
                        <span id="cnt">Your mother has been fucked</span>
                    </p>
                    <p id="log">
                        <span id="time">10:59:41</span>
                        <span id="type" class="info">[INFO]</span>
                        <span id="cnt">Your mother has been fucked</span>
                    </p>
                    <p id="log">
                        <span id="time">10:59:41</span>
                        <span id="type" class="info">[INFO]</span>
                        <span id="cnt">Your mother has been fucked</span>
                    </p>
                    <p id="log">
                        <span id="time">10:59:41</span>
                        <span id="type" class="info">[INFO]</span>
                        <span id="cnt">Your mother has been fucked</span>
                    </p>
                    <p id="log">
                        <span id="time">10:59:41</span>
                        <span id="type" class="info">[INFO]</span>
                        <span id="cnt">Your mother has been fucked</span>
                    </p>
                    <p id="log">
                        <span id="time">10:59:41</span>
                        <span id="type" class="info">[INFO]</span>
                        <span id="cnt">Your mother has been fucked</span>
                    </p>
                    <p id="log">
                        <span id="time">10:59:41</span>
                        <span id="type" class="info">[INFO]</span>
                        <span id="cnt">Your mother has been fucked</span>
                    </p>
                    <p id="log">
                        <span id="time">10:59:41</span>
                        <span id="type" class="info">[INFO]</span>
                        <span id="cnt">Your mother has been fucked</span>
                    </p>
                    <p id="log">
                        <span id="time">10:59:41</span>
                        <span id="type" class="info">[INFO]</span>
                        <span id="cnt">Your mother has been fucked</span>
                    </p>
                    <p id="log">
                        <span id="time">10:59:41</span>
                        <span id="type" class="info">[INFO]</span>
                        <span id="cnt">Your mother has been fucked</span>
                    </p>
                    <p id="log">
                        <span id="time">10:59:41</span>
                        <span id="type" class="info">[INFO]</span>
                        <span id="cnt">Your mother has been fucked</span>
                    </p>
                    <p id="log">
                        <span id="time">10:59:41</span>
                        <span id="type" class="info">[INFO]</span>
                        <span id="cnt">Your mother has been fucked</span>
                    </p>
                    <p id="log">
                        <span id="time">10:59:41</span>
                        <span id="type" class="info">[INFO]</span>
                        <span id="cnt">Your mother has been fucked</span>
                    </p>
                    <p id="log">
                        <span id="time">10:59:41</span>
                        <span id="type" class="info">[INFO]</span>
                        <span id="cnt">Your mother has been fucked</span>
                    </p>
                    <p id="log">
                        <span id="time">10:59:41</span>
                        <span id="type" class="info">[INFO]</span>
                        <span id="cnt">Your mother has been fucked</span>
                    </p>
                </div>
            </div>
        </main>
    </section>
</body>
<script src="../incl/profilemenu.incl.js"></script>
<script src="../incl/ntf.incl.js"></script>
</html>