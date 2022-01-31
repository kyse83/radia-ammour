<?php
use App\Attachment\HomeAttachment;
use App\Connection;
use App\Table\CategoryTable;
use App\Validator;
use App\HTML\Form;
use App\Validators\CategoryValidator;
use App\ObjectHelper;
use App\Model\Home;
use App\Auth;

Auth::check();


$post = new Home();
$errors = [];
$form = new Form($post, $errors);


if (!empty($_FILES)) {
    //$img->setImage($data[])  
   
    ObjectHelper::hydrate($post,$_FILES,['image']);
    $post->setName($_FILES['image']['name']);
    HomeAttachment::upload($post);
   
    header('location:'.$router->url('admin_home_upload').'?upload=1');
    

    exit();
    
    $v = new HomeValidator($_POST, $table);
    if ($v->validate()){
        $table->create([
            'name' => $post->getName(),
            'id'=> $post->getId()
        ]);
        exit();
    }else{
        $errors = $v->errors();
        
        
    }        
}


?>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        La catégorie n'a pas pu être enregistrée, merci de corriger vos erreurs.
    </div>
<?php endif ?>

<h1>Uploader les images pour l'accueil</h1>

<?php require('_form.php') ?>