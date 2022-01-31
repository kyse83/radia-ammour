<?php 
use App\{Connection, PaginatedQuery, URL};
use App\Model\{Category, Post};
use App\Table\{CategoryTable,PostTable};

$id = (int)$params['id'];
$slug = $params['slug'];
$pdo = Connection::getPDO();
$category = (new CategoryTable($pdo))->find($id);


if($category->getSlug() !== $slug){
    $url = $router->url('category', ['slug'=>$category->getSlug(),'id' => $id]);
    http_response_code(301);
    header('Location:' .$url);
}

?>

<h1>Catégorie <?= htmlentities($category->getName())?></h1>

<?php

[$posts,$paginatedQuery] = (new PostTable($pdo))->findPaginatedForCategory($category->getID());
$link = $router->url('category',['id'=> $category->getID(),'slug'=>$category->getSlug()]);
?>

<div class="row">
    <?php foreach($posts as $post): ?>
    <div class="col-md-3">
        <?php require 'views/post/card.php'?>
    </div>
    <?php endforeach ?>
</div>
<div class="d-flex justify-content-between my-4 submitbtn">
    <?= $paginatedQuery->previousLink($link);?>
    <?= $paginatedQuery->nextLink($link);?>
</div>
    
     