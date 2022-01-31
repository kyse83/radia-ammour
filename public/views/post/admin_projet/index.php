
<style>body{background-color: rgba(0,0,0, 0.8);text-align: center;}</style>
    <div class="container_contact">
                <h5 class="titre_form">Connexion administrateur</h5>
            
                <form action="connexion.php" method="post">
                        <div class="form_group">
                            <input type="text" class="form_input" name="nom" placeholder="Votre nom" required>
                            <label for="nom" class="form_label">Votre Nom</label>
                        </div>
                        <div class="form_group">
                            <input type="password" class="form_input" name="password" placeholder="Mot de passe" required>
                            <label for="password" class="form_label">Mot de passe</label>
                        </div>
                        <div class="form_group">
                            <input type="password" class="form_input" name="password_confirm" placeholder="Confirmation du mot de passe" required>
                            <label for="password" class="form_label">Mot de passe</label>
                        </div>  
                        <div class="submit">
                            <button class="submitBtn" name="envoyer" >Envoyer &rarr;</button>
                        </div>  
                    <?php
                        if(isset ($_POST['envoyer'])){
                            if (isset($_POST['nom']) && isset($_POST['password'])&& isset($_POST['password_confirm'])){
                                $nom= htmlspecialchars($_POST['nom']);
                                $pass= htmlspecialchars($_POST['password']);
                                $passConfirm= htmlspecialchars($_POST['password_confirm']);
                                
                                
                                if ($_POST['password'] == $_POST['password_confirm']){
                                    require('connect.php');
                                    $pass= "uv0".sha1($pass."2543")."51";
                                    $req = $db->prepare('SELECT * FROM user WHERE nom = ?');
                                    $req->execute(array($nom));

                                    while ($user = $req->fetch()){
                                        
                                        if ($password == $user['password']){
                                            ?>

                                        </form>
                                        <h5 class="titre_form">Envoyer des images</h5>

                                        <form action="connexion.php" method="post" enctype="multipart/form-data">
                                            <div class="form_group">
                                                <input type="file" class="form_input" name="img" placeholder="image" required>
                                                <label for="nom" class="form_label">Votre image</label>
                                            </div>
                                            
                                            <div class="submit">
                                                <button class="submitBtn" name="envoyer" >Envoyer &rarr;</button>
                                            </div>
                                        </form>
                                            <?php

                                        }else{
                                            echo'<p>Erreur d\'authentification</p>';
                                        }
                                    }  
                                }
                            }   
                        }      
                    ?>
                

                       

                


    </div>
 
