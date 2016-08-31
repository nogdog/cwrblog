<?php
require __DIR__.'/head.php';
?>
<h2>Articles, Posts, Whatever You Want to Call Them</h2>
<div class="list-group">
    <?php
    foreach($posts as $post) {
        echo "<a class='list-group-item list-group-item-action' href='/{$post['file']}'>{$post['title']} ({$post['date']})</a>";
    }
    ?>
</div>
<?php
require __DIR__.'/foot.php';