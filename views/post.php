<?php
$postFile = __DIR__.'/../posts/'.basename($data['current']['path']).'.md';
if(!file_exists($postFile)) {
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
            ' -- ', // convert to em-dash
            '&thinsp;&mdash;&thinsp;',
            $parser->parse(file_get_contents($postFile))
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