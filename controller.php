<?php
/**
 * simple blog controller
 */
require_once 'Posts.php';
$posts = new Posts();

$url = parse_url($_SERVER['REQUEST_URI']);
if(!empty($url['query'])) {
    parse_str($url['query'], $query);
    array_merge($_GET, $query);
}
if($url['path'] == '/') {
    $url['path'] = '/home';
}
if($url['path'] == '/latest' or $url['path'] == '/last') {
    $post = $posts->getLatest();
    $url['path'] = '/'.$post['path'];
}
$path = 'posts'.strtolower(str_replace('.', '', $url['path'])).'.md';
if(!file_exists($path)) {
    require 'static/404.php';
    exit;
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
                <li role="presentation"><a href="/latest">Latest</a></li>
                <li role="presentation"><a href="/contents/">Contents</a></li>
                <li role="presentation"><a href="/email/">Email Me</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
<?php
echo $parser->parse(file_get_contents($path));

?>
            <div id="pagination" class="list-group">
                <?php
                if(basename($path) == 'home.md') {
                    $latest = $posts->getLatest();
                    echo "<a class=\"list-group-item list-group-item-action\" href='{$latest['path']}'>Latest Post: <b>{$latest['title']}</b> ({$latest['date']})</a>";
                }
                else {
                    $previous = $posts->getPrevious($path);
                    $next = $posts->getNext($path);
                    if ($previous !== false) {
                        echo "<a class=\"list-group-item list-group-item-action\" href='/{$previous['path']}'>Previous: <b>{$previous['title']}</b></b> ({$previous['date']})</a>";
                    }
                    if ($next !== false) {
                        echo "<a class=\"list-group-item list-group-item-action\" href='/{$next['path']}'>Next: <b>{$next['title']}</b> ({$next['date']})</a>";
                    }
                }
                ?>
            </div>
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
            <h3>Stuff I Like</h3>
            <ul class="list-group">
                <li class="list-group-item"><a href='http://www.kboards.com'>KBoards.com</a>: forum about ebooks, and the Amazon Kindle</li>
                <li class="list-group-item"><a href='http://www.webdeveloper.com/forum/forum.php'>WebDeveloper.com</a>: forum about web developement</li>
                <li class="list-group-item"><a href='http://board.phpbuilder.com/'>PHPBuilder.com</a>: forum on PHP and related web development topics</li>
            </ul>
            <h4>Follow me on Twitter</h4>
            <p><a href="https://twitter.com/CWReaceJr" class="twitter-follow-button" data-show-count="false">Follow @CWReaceJr</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script></p></div>
        </div>
    </div>
</div>
<script type="application/javascript" src="/static/js/jquery-3.1.0.min.js"></script>
<script type="application/javascript" src="/static/js/bootstrap.min.js"></script>
</body>
</html>
