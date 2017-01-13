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
<div class="list-group">
    <?php
    foreach($posts as $post) {
        echo "<a class='list-group-item list-group-item-action' href='{$post['file']}'>{$post['title']} ({$post['date']})</a>\n";
    }
    ?>
</div>
<p>
<?php
if($page > 1) { ?>
    <a href="/contents?page=<?php echo $page - 1; ?>" class="btn btn-primary active" role="button" aria-pressed="true">Previous Page</a>
<?php }
if($page < count($postChunks)) { ?>
    <a href="/contents?page=<?php echo $page + 1; ?>" class="btn btn-primary active" role="button" aria-pressed="true">Next Page</a>
<?php } ?>
</p>
<?php
require __DIR__.'/foot.php';