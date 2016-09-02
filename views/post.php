<?php
if(!file_exists(__DIR__.'/../posts/'.$data['current']['path'].'.md')) {
    require __DIR__.'/../static/404.php';
    exit;
}
require __DIR__.'/head.php';
if(!empty($data['current'])) {
    require_once __DIR__.'/../parsedown/Parsedown.php';
    $parser = new Parsedown();
    echo str_replace(
        '<img',
        '<img class="hidden-xs"',
        str_replace(
            ' -- ',
            '&thinsp;&mdash;&thinsp;',
            $parser->parse(file_get_contents(__DIR__.'/../posts/'.$data['current']['path'].'.md'))
        )
    );
    echo <<<EOD
<div
  class="fb-like"
  data-share="true"
  data-width="450"
  data-show-faces="true">
</div>
EOD;

}
require __DIR__.'/foot.php';