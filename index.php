<?php

$url = parse_url($_SERVER['REQUEST_URI']);
if(!empty($url['query'])) {
    parse_str($url['query'], $query);
    array_merge($_GET, $query);
}
if($url['path'] == '/') {
    $url['path'] = '/home';
}

switch($url['path']) {
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
        die("contents not yet implemented");
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