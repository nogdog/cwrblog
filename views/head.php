<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/static/css/style.css">
    <meta name="verify-v1" content="qN48L1fp1ZHcbL3gdogaoRlW1tEtdPj9t4nvzQWTIrk=">
    <link rel="icon" type="image/png" href="static/img/favicon.ico"/>
    <title><?php
        echo htmlspecialchars($config['title_part_one']);
        echo !empty($data['title']) ? ': '.htmlspecialchars($data['title']) : '';
    ?></title>
</head>
<body>
<h1 id="banner"><?php echo $config['banner_title']; ?></h1>
<ul id="nav">
    <li><a href="home">Home</a></li>
    <li><a href="latest">Latest</a></li>
    <li><a href="contents">Contents</a></li>
</ul>
<div id="main">
