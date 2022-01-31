<?php
use App\Table\{PostTable,CategoryTable};
use App\Connection;
use App\Model\{Post,Category};


$id = (int)$params['id'];
$slug = $params['slug'];

$pdo = Connection::getPDO();
$post = (new PostTable($pdo))->find($id);
(new CategoryTable($pdo))->hydratePosts([$post]);
if($post->getSlug() !== $slug){
    $url = $router->url('post', ['slug'=>$post->getSlug(),'id' => $id]);
    http_response_code(301);
    header('Location:' .$url);
}

?>

<h1 class="card-title"><?= htmlentities($post->getName()) ?></h1>
    <p class="text-muted"><?= $post->getCreatedAt()->format('d F y') ?></p>
    <?php foreach($post->getcategories() as $k => $category): 
        if ($k > 0 ):?> ,
    <?php endif ?>
        <a href="<?= $router->url('category',['id'=> $category->getID(), 'slug'=>$category->getSlug()])?>"><?=htmlentities($category->getName())?></a>
    <?php endforeach ?>
    <?php if ($post->getImage()): ?>
    <p>
        <img src="<?= $post->getImageURL('large') ?>" >
    </p>
    <?php endif ?>
    <p><?= $post->getFormatedContent() ?></p>
    