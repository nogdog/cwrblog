<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <link rel="stylesheet" href="/static/css/style.css">
    <meta name="verify-v1" content="qN48L1fp1ZHcbL3gdogaoRlW1tEtdPj9t4nvzQWTIrk=">
    <link rel="icon" type="image/png" href="/static/img/favicon.ico"/>
    <title><?php echo !empty($title) ? htmlspecialchars($title) : 'Charles Reace'; ?></title>
    <script type="application/javascript" src="/static/js/jquery-3.1.0.min.js"></script>
</head>
<body>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '1034193336678712',
            xfbml      : true,
            version    : 'v2.7'
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<div class="container">
    <div class="row" id="head">
        <div class="col-md-12">
            <h1>Charles Reace</h1>
        </div>
        <div id="nav" class="col-md-12">
            <ul class="nav nav-pills">
                <li role="presentation"><a href="/">Home</a></li>
                <li role="presentation"><a href="/latest">Latest</a></li>
                <li role="presentation"><a href="/contents/">Contents</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">