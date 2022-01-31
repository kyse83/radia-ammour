           
    <div class="home" id="home">
            
            <div class="galerie_photo">
                <img class="photo" src="/uploads/home/image1_large.jpg" alt="photo">
                <img src="/uploads/home/image2_large.jpg" alt="photo" class="photo">
                <img src="/uploads/home/image3_large.jpg" alt="photo" class="photo">
            </div>
        

        <div class="tarif" id="tarif">
            <h2>Prestation mariage</h2>
            <div class="separateur"></div> 

            <div class=container_tarifs>

                <div class="carte one">
                    <h3>Rubis</h3>
                    <p></p>
                    <span>110€</span>
                    <h4>INCLUS DANS CETTE OFFRE</h4>
                    <ul>
                        
                        <li><img class="check" src="views/images/check.png" alt="check icone">Maquillage mariée</li>
                        
                    </ul>
                </div>
                    
                
                <div class="carte two">
                    <h3>Saphir</h3>
                    <p></p>
                    <span>230€</span>
                    <h4>INCLUS DANS CETTE OFFRE</h4>
                    <ul>
                        <li><img class="check" src="views/images/check.png" alt="check icone">Essai préalable </li>
                        <li><img class="check" src="views/images/check.png" alt="check icone">Maquillage mariée</li>
                    </ul>
                </div>

                <div class="carte three">
                    <h3>Emeraude</h3>
                    <p></p>
                    <span>290€</span>
                    <h4>INCLUS DANS CETTE OFFRE</h4>
                    <ul>
                        <li><img class="check" src="views/images/check.png" alt="check icone">Essai préalable </li>
                        <li><img class="check" src="views/images/check.png" alt="check icone">Maquillage mariée</li>
                        <li><img class="check" src="views/images/check.png" alt="check icone">Retouche beauté</li>
                    </ul>
                </div>

                <div class="carte four">
                    <h3>Diamant</h3>
                    <p>Comblez vos envies</p>
                    <span>390€</span>
                    <h4>INCLUS DANS CETTE OFFRE</h4>
                    <ul style="padding:2px;">
                        <li><img class="check" src="views/images/check.png" alt="check icone">Essai préalable </li>
                        <li><img class="check" src="views/images/check.png" alt="check icone">Maquillage mariée</li>
                        <img style="margin:4px 0 18px 5px;"  class="check" src="/images/check.png" alt="check icone"><li style="display:inline-block;width:150px;margin-left:0">Maquillage demoiselles d'honneur </li>
                    </ul>
                </div>
            </div>
            
                <h2>Autres prestations</h2>
                <div class="separateur"></div> 
            <div class="container_tarifs">

                <div class="carte five">
                    <h3>Christal</h3>
                    <p></p>
                    <span>60€</span>
                    <h4>INCLUS DANS CETTE OFFRE</h4>
                    <ul style="padding:2px;">
                        <li><img class="check" src="views/images/check.png" alt="check icone">Maquillage jour</br>Ou </li>
                        <li><img class="check" src="views/images/check.png" alt="check icone">Maquillage soir</li>
                    </ul>
                </div>

                <div class="carte six">
                    <h3>Perle</h3>
                    <p></p>
                    <span>80€</span>
                    <h4>INCLUS DANS CETTE OFFRE</h4>
                    <ul style="padding:2px;">
                        <li style="width:200px;"><img class="check" src="views/images/check.png" alt="check icone">Maquillage sophistiqué jour</br>Ou</li>
                        <li style="width:200px"><img class="check" src="views/images/check.png" alt="check icone">Maquillage sophistiqué nuit</li>
                    </ul>
                </div>
                <div class="carte seven">
                    <h3>Plaisir d'offrir</h3>
                    <p></p>
                    <span>80€</span>
                    <h4>BON CADEAU</h4>
                    <img style="border-radius:5px;width:100%;border:solid 1px black;" src="views/images/logo.jpg" alt="logo">
                </div>

            </div>
        </div>
        <div class="contact" id="contact">
            <div class="visite">
                <div class="border">
                    <h5>Radia Ammour</h5>
                    
                        <ul class="icons">
                            <li class="bulle"><a href="https://www.facebook.com/didimakeuppro" target="_blank"><img src="views/images/fb.svg" alt="facebook" class="logo-medias"></a></li>
                            <li class="bulle"><a href="https://www.instagram.com/radiaammour/?hl=fr" target="_blank"><img src="views/images/insta.svg" alt="instagram" class="logo-medias"></a></li>
                        </ul>
                    
                </div>
            </div>

            <div class="container_contact">
                <h5 class="titre_form">Contactez moi</h5>
            
                <form action="main.php" method="post">
                        <div class="form_group">
                            <input type="text" class="form_input" name="nom" placeholder="Votre nom" required>
                            <label for="nom" class="form_label">Votre Nom</label>
                        </div>
                        <div class="form_group">
                            <input type="text" class="form_input" name="email" placeholder="Votre email" required>
                            <label for="email" class="form_label">Votre Email</label>
                        </div>
                        <div class="form_group">
                            <input type="tel" class="form_input" name="tel" placeholder="Votre téléphone" required>
                            <label for="age" class="form_label">Votre téléphone</label>
                        </div>
                        
                        <div class="form_message">
                            <label for="" class="form_message-label">Description de votre besoin</label>
                            <textarea  name="message" cols="30" rows="10" class="form_input message_input" required></textarea>
                        </div>
                    <?php
                        if(isset ($_POST['envoyer'])){
                            if (isset($_POST['nom']) && isset($_POST['email'])&& isset($_POST['tel'])&& isset($_POST['message'])){
                                $nom= htmlspecialchars($_POST['nom']);
                                $email= htmlspecialchars($_POST['email']);
                                $tel= htmlspecialchars($_POST['tel']);
                                $message= "Nom : ".$nom."\r\n"."Email : ".$email."\r\n"."Tel : ".$tel."\r\n"."Message : ".htmlspecialchars($_POST['message']); 						                                        
                                
                                if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                                    $mail = mail('contact@radia-ammour.com','Renseignement Ammour.com',$message);
                                
                                    if(isset($mail)){
                                        
                                        echo "<script>alert('Le message a été envoyé');</script>";  
                                    }else{
                                            echo "<script>alert('Erreur lors de l'envoi du message, réessayez');</script>";                 
                                        }
                                        
                                } else {
                                        echo '<script>alert("l\'adresse email saisie est invalide.\nLe message n\'est pas envoyé.\n\n Réessayez.");</script>';
                                        
                                }
                            }
                            
                        }
                       
                            
                    ?>
                

                        <div class="submit">
                            <button class="submitBtn" name="envoyer" >Envoyer &rarr;</button>
                        </div>
                </form>
            
          	</div>
        </div>
    </div>    
                    
        
