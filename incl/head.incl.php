<link rel="apple-touch-icon" sizes="180x180" href="../img/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="../img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="../img/favicon/favicon-16x16.png">
<link rel="manifest" href="../img/favicon/site.webmanifest">
<link rel="mask-icon" href="../img/favicon/safari-pinned-tab.svg" color="#7876e8">
<link rel="shortcut icon" href="../img/favicon/favicon.ico">
<meta name="msapplication-TileColor" content="#7876e8">
<meta name="msapplication-config" content="../img/favicon/browserconfig.xml">
<meta name="theme-color" content="#7876E8">
<meta charset='UTF-8'>
<meta name='keywords' content='themis, themiscms, panel, cms, website, content management system'>
<meta name='description' content='Software allowing Themis clients to access thier website.'>
<meta name='subject' content='Software uuser interface'>
<meta name='copyright' content='Themis CMS'>
<meta name='summary' content='Software allowing Themis clients to access thier website.'>
<meta name='Classification' content='Technology'>
<meta name='author' content='Themis CMS, founders@themiscms.eu'>
<meta name='designer' content='Jonáš Holub'>
<meta name='reply-to' content='founders@themiscms.eu'>
<meta name='owner' content='Themis CMS'>
<meta name='url' content='http://panel.themiscms.eu'>
<meta name='pagename' content='Themis Panel'>
<meta name='subtitle' content='Themis CMS interface'>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="color-scheme" content="light">
<link rel="stylesheet" href="../incl/panel.incl.css">
<?php

if (getSettings(sessionIdentify(session_id()))['darkmode'] == 1) {
    echo '<link rel="stylesheet" href="../incl/dark.incl.css">';
}

?>