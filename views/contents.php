<?php
require __DIR__.'/head.php';
$page = !empty($_GET['page']) ? intval($_GET['page']) : 1;
$postChunks = array_chunk($posts, 10); // adjust for num per page
if(!isset($postChunks[$page - 1])) {
    $page = 1;
}
$posts = $postChunks[$page - 1];
?>
<h2>Articles, Posts, Whatever You Want to Call Them</h2>
<ul id="contents">
    <?php
    foreach($posts as $post) {
        echo "<li><a href='{$post['file']}'>{$post['title']} ({$post['date']})</a></li>\n";
    }
    ?>
</ul>
<p>
<?php
if($page > 1) { ?>
    <a class="button" href="/contents?page=<?php echo $page - 1; ?>">Previous Page</a>
<?php }
if($page < count($postChunks)) { ?>
    <a class="button" href="/contents?page=<?php echo $page + 1; ?>">Next Page</a>
<?php } ?>
</p>
<?php
require __DIR__.'/foot.php';