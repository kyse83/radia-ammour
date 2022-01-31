<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maquillage professionel | Radia Ammour</title>
        <link rel="stylesheet" href="/views/style/style2.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="shortcut icon" type="image/jpg" href="/views/images/logo.jpg"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <header>    
        <div class="navigation">
            <nav>
                <ul>
                    <li class="hamburger"><img src="/views/images/hamburger.png" alt="menu"></li>
                    <li class="logo"><img src="/views/images/logo.jpg" alt="logo du site"></li>  
                    <li class="item"><a href="/#home">Accueil</a></li>
                    <li class="item"><a href="/test">Portfolio</a></li1>
                    <li class="bulle"><a href="https://www.facebook.com/didimakeuppro" target="_blank"><img src="/views/images/fb.svg" alt="facebook" class="logo-medias"></a></li>
                    <li class="bulle"><a href="https://www.instagram.com/radiaammour/?hl=fr" target="_blank"><img src="/views/images/insta.svg" alt="instagram" class="logo-medias"></a></li>
                </ul>
            </nav>     
        </div>  
        
    </header>
    <div style="background-color : black;">
        
            <ul class="nav nav-pills">
                <li class="item">
                    <a aria-current="page" href="<?= $router->url('admin_posts')?>">Article</a>
                </li>
                <li class="item">
                    <a href="<?= $router->url('admin_categories')?>">Catégorie</a>
                </li>
                <li class="item">
                    <a href="<?= $router->url('admin_home')?>">Home</a>
                </li>
                <li class="item">
                    <form action="<?= $router->url('logout')?>" method="post" style="display:inline" >
                        <button type="submit" class= "btn btn-outline-light" >Déconnexion</button>
                    </form>   
                </li>
            </ul>   
      
    </div>
    
        <?= $content ?>
    
    <footer class="mentionLegales">
        <h2>Radia Ammour</h2>
        <p>Makeup Artist</p>
        <ul>
            <li><a href="conditions.php">Conditions générales de vente</a></li>
            <li><a href ="mention.php">Mentions légales</a></li>
            
        </ul>
</footer>
        <script>
            $(document).ready(function(){
                $("nav").on("click",function(){
                    $("nav").toggleClass("menu");
                })
            });

            $(window).on("scroll",function(){
                if($(window).scrollTop()){
                    $("nav").addClass("scroll");
                }else{
                    $("nav").removeClass("scroll");
                }
            })
        </script>

</body>
</html>