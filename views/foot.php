<div id="pagination" class="list-group">
    <?php
    if(!empty($data['latest'])) {
        echo "<a class='list-group-item list-group-item-action' 
            href='{$data['latest']['path']}'>Latest Post: <b>{$data['latest']['title']}</b> 
            ({$data['latest']['date']})</a>";
    }
    else {
        if(!empty($data['previous'])) {
            echo "<a class=\"list-group-item list-group-item-action\" 
                href='/{$data['previous']['path']}'>Previous: <b>{$data['previous']['title']}</b>
                ({$data['previous']['date']})</a>";
        }
        if(!empty($data['next'])) {
            echo "<a class=\"list-group-item list-group-item-action\" 
            href='/{$data['next']['path']}'>Next: <b>{$data['next']['title']}</b> ({$data['next']['date']})</a>";
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
<p id="bottom">Copyright &copy; 2016
<?php
    if(date('Y') > 2016) {
        echo "-".date('Y');
    }
?>
    by Charles Reace, Jr. &mdash; Built with <a href="https://github.com/nogdog/cwrblog">cwrBlog</a></p>
</div>
<script type="application/javascript" src="/static/js/bootstrap.min.js"></script>
</body>
</html>