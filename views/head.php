<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="/static/css/style.css">
    <link rel="stylesheet" href="/static/css/lightbox.min.css">
    <script type="text/javascript" src="/static/js/lightbox-plus-jquery.min.js"></script>
    <meta name="verify-v1" content="qN48L1fp1ZHcbL3gdogaoRlW1tEtdPj9t4nvzQWTIrk=">
    <link rel="icon" type="image/png" href="static/img/favicon.ico"/>
    <title><?php
        echo htmlspecialchars($config['title_part_one']);
        echo !empty($data['title']) ? ': '.htmlspecialchars($data['title']) : '';
    ?></title>
</head>
<body>
<h1 id="banner"><?php echo $config['banner_title']; ?></h1>
<div id="nav">
    <a class="button" href="home">Home</a>
    <a class="button" href="latest">Latest</a>
    <a class="button" href="contents">Contents</a>
</div>
<div id="main">
