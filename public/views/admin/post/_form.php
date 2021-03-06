<form action="" method = "POST" enctype="multipart/form-data">
    <?= $form->input('name','Titre');?>
    <?= $form->input('slug','URL');?>
    <div class="row">
        <div class="col-md-9">
            <?= $form->file('image','Image affichée');?>
        </div>
        <div class="col-md-3">
            <?php if ($post->getImage()): ?>
                <img src="<?= $post->getImageURL('small') ?>" alt="" style= "width: 150px;">
            <?php endif ?>
        </div>
    </div>
    <?= $form->select('categories_ids','Catégories',$categories);?>
    <?= $form->textArea('content','Contenu');?>
    <?= $form->input('created_at','Date de publication');?>

    <button class="btn btn-primary">
    <?php if ($post->getID() !== null): ?>
     Modifier   
    <?php else: ?>
    Créer
    <?php endif ?></button>

</form>