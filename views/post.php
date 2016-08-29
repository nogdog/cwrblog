<?php
require __DIR__.'/head.php';
if(!empty($data['current'])) {
    require_once __DIR__.'/../parsedown/Parsedown.php';
    $parser = new Parsedown();
    echo $parser->parse(file_get_contents(__DIR__.'/../posts/'.$data['current']['path'].'.md'));
}
require __DIR__.'/foot.php';