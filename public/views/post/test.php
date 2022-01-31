
<?php
use App\Connection;
use App\Table\PostTable;

$pdo = Connection :: getPDO();

$table = new PostTable($pdo);
[$posts,$pagination] = $table->findPaginated();

$link = $router->url('test');
?> 
    
<div>
   
    

    <div class="row">
        <?php foreach($posts as $post): ?>
        <div class="col-md-3">
            <?php require 'card.php'?>  
        </div>
        <?php endforeach ?>
    </div>
</div>
    <div>
        <?= $pagination->previousLink($link);?>
        <?= $pagination->nextLink($link);?>
    </div>
