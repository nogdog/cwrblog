<div id="pagination">
    <?php
    if(!empty($data['latest'])) {
        echo "<a class='button' href='{$data['latest']['path']}'>Latest Post: <b>{$data['latest']['title']}</b> 
            ({$data['latest']['date']})</a>";
    }
    else {
        if(!empty($data['previous'])) {
            echo "<a class='button' href='{$data['previous']['path']}'>Previous: <b>{$data['previous']['title']}</b>
                ({$data['previous']['date']})</a>";
        }
        if(!empty($data['next'])) {
            echo "<a class='button' href='{$data['next']['path']}'>Next: <b>{$data['next']['title']}</b> ({$data['next']['date']})</a>";
        }
    }
    ?>
</div>
</div>
<div id="extra">
<?php require __DIR__.'/right_column.php'; ?>
</div>
<p id="footer">Copyright &copy; <?php echo $config['copyright_start_year']; ?>
<?php
    if(date('Y') > $config['copyright_start_year']) {
        echo "-".date('Y');
    }
?>
    by <?php echo $config['copyright_name']; ?> &mdash; Built with
    <a href="https://github.com/nogdog/cwrblog">cwrBlog</a></p>
</body>
</html>