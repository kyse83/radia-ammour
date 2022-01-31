<?php

require '../vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

define('UPLOAD_PATH',__DIR__ . DIRECTORY_SEPARATOR . 'uploads');

if(isset($_GET['page']) && $_GET['page'] === '1'){
    //réécrire l'url sans le paramétre ?page
    $uri = explode('?',$_SERVER['REQUEST_URI'])[0];
    $get = $_GET;
    unset($get['page']);
    $query = http_build_query($get);
    if(!empty($query)){
        $uri = $uri.'?'.$query;
    }
    http_response_code(301);
    header('location: '.$uri);
    exit();
}

$router = new App\Router(dirname(__DIR__).'/public/views');
$router->get('/','post/index','home');
$router->get('/test/category/[*:slug]-[i:id]','category/show','category');
$router->get('/test/[*:slug]-[i:id]','post/show','post');
$router->get('/test','post/test','test');
$router->match('/login','auth/login','login');
$router->match('/e404','auth/e404','404');
$router->post('/logout','auth/logout','logout');
//ADMIN
// Gestion des articles
$router->get('/admin','admin/post/index','admin_posts');
$router->match('/admin/post/[i:id]','admin/post/edit','admin_post');
$router->match('/admin/post/new','admin/post/new','admin_post_new');
$router->post('/admin/post/[i:id]/delete','admin/post/delete','admin_post_delete');
// Gestion des catégories
$router->get('/admin/categories','admin/category/index','admin_categories');
$router->match('/admin/category/[i:id]','admin/category/edit','admin_category');
$router->match('/admin/category/new','admin/category/new','admin_category_new');
$router->post('/admin/category/[i:id]/delete','admin/category/delete','admin_category_delete');
//Gestion admin home
$router->get('/admin/home','admin/home/index','admin_home');
$router->post('/admin/home','admin/home/index','admin_home_upload');




$router->run();



?>


