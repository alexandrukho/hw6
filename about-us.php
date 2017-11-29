<?php
require_once 'vendor/autoload.php';
$loader = new Twig_Loader_Filesystem('/');
$twig = new Twig_Environment($loader);
echo $twig->render('about-us.html', [
        'posts' => [
                ['postname' => 'some about this post', 'view' => 32],
                ['postname' => 'some about this post2', 'view' => 22],
                ['postname' => 'some about this post3', 'view' => 512],
        ]
]);