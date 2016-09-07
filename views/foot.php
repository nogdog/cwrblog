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
                href='{$data['previous']['path']}'>Previous: <b>{$data['previous']['title']}</b>
                ({$data['previous']['date']})</a>";
        }
        if(!empty($data['next'])) {
            echo "<a class=\"list-group-item list-group-item-action\" 
            href='{$data['next']['path']}'>Next: <b>{$data['next']['title']}</b> ({$data['next']['date']})</a>";
        }
    }
    ?>
</div>
</div>
<div class="col-md-3 col-md-offset-1" id="right_col">
<?php require __DIR__.'/right_column.php'; ?>
</div>
</div>
<p id="bottom">Copyright &copy; <?php echo $config['copyright_start_year']; ?>
<?php
    if(date('Y') > 2016) {
        echo "-".date('Y');
    }
?>
    by <?php echo $config['copyright_name']; ?> &mdash; Built with <a href="https://github.com/nogdog/cwrblog">cwrBlog</a></p>
</div>
<script type="application/javascript" src="/static/js/bootstrap.min.js"></script>
</body>
</html>