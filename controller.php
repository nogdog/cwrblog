<?php
/**
 * simple blog controller
 */

$url = parse_url($_SERVER['REQUEST_URI']);
if(!empty($url['query'])) {
    parse_str($url['query'], $query);
    array_merge($_GET, $query);
}

if($url['path'] == '/') {
    $url['path'] = '/home';
}
$path = './posts'.strtolower(str_replace('.', '', $url['path'])).'.md';

if(!file_exists($path)) {
    header("HTTP/1.0 404 Not Found");
}
$title = 'Charles Reace: '.ucwords(preg_replace('/\W/', ' ', $url['path']));
require_once 'parsedown/Parsedown.php';
$parser = new Parsedown();
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <link rel="stylesheet" href="/static/css/style.css">
    <meta name="verify-v1" content="qN48L1fp1ZHcbL3gdogaoRlW1tEtdPj9t4nvzQWTIrk=">
    <link rel="icon" type="image/png" href="/static/img/favicon.ico"/>
    <title><?php echo $title; ?></title>
</head>
<body>
<div class="container">
    <div class="row" id="head">
        <div class="col-md-12">
            <h1>Charles Reace</h1>
        </div>
        <div id="nav" class="col-md-12">
            <ul class="nav nav-pills">
                <li role="presentation"><a href="/">Home</a></li>
                <li role="presentation"><a href="/Email_Me/">Email Me</a></li>
                <li role="presentation"><a href="/PHP_and_MySQL/">PHP &amp; MySQL</a></li>
                <li role="presentation"><a href="/blog/">PHP Blog</a></li>
                <li role="presentation"><a href="/Hobbies/">Hobbies</a></li>
                <li role="presentation"><a href="/Photos/">Photos</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
<?php
echo $parser->parse(file_get_contents($path));
?>
        </div>
        <div class="col-md-3 col-md-offset-1">
            <div id="search"><script>
                    (function() {
                        var cx = '013413666022574929253:56taaaujzem';
                        var gcse = document.createElement('script');
                        gcse.type = 'text/javascript';
                        gcse.async = true;
                        gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
                        var s = document.getElementsByTagName('script')[0];
                        s.parentNode.insertBefore(gcse, s);
                    })();
                </script>
                <gcse:search></gcse:search></div>
            <div>
                <h4>Follow me on Twitter</h4>
                <p><a href="https://twitter.com/CWReaceJr" class="twitter-follow-button" data-show-count="false">Follow @CWReaceJr</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script></p></div>
            <h3>Stuff I Like</h3>
            <ul class="list-group">
                <li class="list-group-item"><a href='http://www.kboards.com'>KBoards.com</a>: forum about ebooks, and the Amazon Kindle</li>
                <li class="list-group-item"><a href='http://www.webdeveloper.com/forum/forum.php'>WebDeveloper.com</a>: forum about web developement</li>
                <li class="list-group-item"><a href='http://board.phpbuilder.com/'>PHPBuilder.com</a>: forum on PHP and related web development topics</li>
            </ul>
        </div>
    </div>
</div>
<script type="application/javascript" src="/static/js/jquery-3.1.0.min.js"></script>
<script type="application/javascript" src="/static/js/bootstrap.min.js"></script>
</body>
</html>