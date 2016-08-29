<?php
require __DIR__.'/head.php';
require_once __DIR__.'/../parsedown/Parsedown.php';
$parser = new Parsedown();
echo $parser->parse(file_get_contents(__DIR__.'/../posts/home.md'));
require __DIR__.'/foot.php';