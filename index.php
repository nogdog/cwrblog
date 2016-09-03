<?php
$config = json_decode(file_get_contents(__DIR__.'/config.json'), true);
if($config == false) {
    throw new Exception("Unable to load conifg file");
}
/**
 * All non-static requests come here.
 */
$url = parse_url($_SERVER['REQUEST_URI']);
if(!empty($url['query'])) {
    parse_str($url['query'], $query);
    array_merge($_GET, $query);
}
if($url['path'] == '/') {
    $url['path'] = '/home';
}
$url['path'] = preg_replace('#(/[^/]*)/.*#', '$1', $url['path']);

/**
 * based on URL, run the applicable controller then view
 */
switch(rtrim($url['path'], '/')) {
    case '/home':
        require_once __DIR__.'/controllers/Home.php';
        $controller = new Home();
        $controller->index();
        $data = $controller->data();
        require __DIR__.'/views/home.php';
        break;
    case '/last':
    case '/latest':
        require_once __DIR__.'/controllers/Post.php';
        $controller = new Post();
        $controller->latest();
        $data = $controller->data();
        require __DIR__.'/views/post.php';
        break;
    case '/contents':
        require_once __DIR__.'/controllers/Contents.php';
        $controller = new Contents();
        $controller->index();
        $data = $controller->data();
        $posts = $controller->index();
        require __DIR__.'/views/contents.php';
        break;
    case '/email':
        die("email not yet implemented");
        break;
    default:
        require_once __DIR__.'/controllers/Post.php';
        $controller = new Post();
        $controller->index();
        $data = $controller->data();
        require __DIR__.'/views/post.php';
        break;
}