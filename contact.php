<?php
session_start();
?>


<!doctype html>
<html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="screen and (max-width: 1280px)">
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="police.css">
    <link rel="stylesheet" href="main.css">
    <link rel="icon" href="img/cv.ico" />

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mon curriculum Vitae</title>
</head>

<body>
    <header>
        <div class="banniere">
            <h1>Olivier Lemattre</br>etudiant webdesign </h1>

        </div>
        <div class="moi">
            <a href="img/grand.png"><img src="img/moi.png" alt="c est moi : olivier!!" title="Olivier Lemattre"></a>
        </div>
    </header>
    <div class="menu">
        <div class="realisation">
            <a class="link" href="realisation.html" title="quelques réalisations en cours ">Realisations</a>
        </div>
        <div class="experience">
            <a class="link" href="experience.html" title="Mon experience">Experience</a>

        </div>
        <div class="competence">
            <a class="link" href="competence.html" title="Mes atouts">Competences</a>
        </div>

        <div class="formation">
            <a class="link" href="formation.html" title="Mon parcours">formation</a>

        </div>
        <div class="liens">
            <a class="link" href="liens.html" title="quelques liens">Liens</a>

        </div>
        <div class="reseaux">
            <a class="link" href="reseaux.html" title="facebook">Reseaux</a>

        </div>

        <div class="tel">
            <a class="link" href="contact.php" title="contact">Contact</a>

        </div>
        

    </div>
    <div class="presentation">

        <div class="title">
            <p>Si vous desirez me rencontrer</p>
        </div>

    </div>


   
        <!-- CONTENT -->
        <div class="container">
            <?php if (array_key_exists('errors', $_SESSION)) : ?>
                <div class="alert alert-danger">
                    <?= implode('<br>', $_SESSION['errors']); ?>
                </div>
            <?php endif; ?>
            <?php if (array_key_exists('success', $_SESSION)) : ?>
                <div class="alert alert-success">
                    <p>Votre email a bien ete transmis !</p>
                </div>
            <?php endif; ?>
            <form action="send_form.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <p>Les renseignements avec un <span> * </span> sont obligatoires</p>
                        <div class="form-group">
                            <label for="inputname">Votre nom <span> * </span></label>
                            <input type="text" name="name" class="form-control" id="inputname" value="<?php echo isset($_SESSION['inputs']['name']) ? $_SESSION['inputs']['name'] : ''; ?>">
                        </div>
                        <!--/*.form-group-->
                    </div>
                    <!--/*.col-md-6-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputemail">Votre email<span> * </span></label>
                            <input required type="email" name="email" class="form-control" id="inputemail" value="<?php echo isset($_SESSION['inputs']['email']) ? $_SESSION['inputs']['email'] : ''; ?>">
                        </div>
                        <!--/*.form-group-->
                    </div>
                    <!--/*.col-md-6-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputsubject">Sujet<span> * </span></label>
                            <input type="text" name="subject" class="form-control" id="inputsubject" value="<?php echo isset($_SESSION['inputs']['subject']) ? $_SESSION['inputs']['subject'] : ''; ?>">
                        </div>
                        <!--/*.form-group-->
                    </div>
                    <!--/*.col-md-6-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputservice">La demande concerne<span> * </span></label>
                            <select class="form-control" name="service" id="inputservice">
                                <option value=""></option>
                                <option value="Un stage">Un stage</option>
                                <option value="Un travail">Un travail</option>
                                <option value="Une aide">Une aide</option>
                            </select>
                        </div>
                        <!--/*.form-group-->
                    </div>
                    <!--/*.col-md-12-->
                    <div class="col-md-12">
                        <div class="form-group">
                            
                            <label>Vous etes</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsradios" id="optionsradios1" value="Vous êtes un developpeur en herbe qui souhaite apprendre à créer un formulaire">
                                     un developpeur en herbe qui souhaite apprendre a creer un formulaire
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsradios" id="optionsradios2" value="Une personne qui souhaite me contacter par tel">
                                    Une personne qui souhaite me contacter par tel
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsradios" id="optionsradios3" value=" Une personne qui veut etre aider :)">
                                    Une personne qui veut etre aider
                                </label>
                            </div>
                        </div>
                        <!--/*.form-group-->
                    </div>
                    <!--/*.col-md-12-->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Vous me contactez pour <i>(plusieurs reponses possible)</i></label>
                            <div class="checkbox">
                                <label>
                                    <input name="multiselect[]" type="checkbox" value="Essayer car vous etes curieux">
                                    Essayer car vous etes curieux
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="multiselect[]" type="checkbox" value="Que l'on parle de mon avenir">
                                    Que l'on parle de mon avenir
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="multiselect[]" type="checkbox" value="Un probleme sur mon site ">
                                    Un probleme sur mon site 
                                </label>
                            </div>
                        </div>
                        <!--/*.form-group-->
                    </div>
                    <!--/*.col-md-12-->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="inputfiles">Envoyer un fichier</label>

                            <input type="file" name="upfiles" id="inputfiles">
                            <p>Extensions autorisees:<i>.jpeg, .jpg, .png, .pdf</i></p>
                        </div>
                        <!--/*.form-group-->
                    </div>
                    <!--/*.col-md-12-->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="inputmessage">Votre message<span> * </span></label>
                            <textarea required id="inputmessage" name="message" class="form-control"><?php echo isset($_SESSION['inputs']['message']) ? $_SESSION['inputs']['message'] : ''; ?></textarea>
                        </div>
                        <!--/*.form-group-->
                    </div>
                    <!--/*.col-md-12-->
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label for="checkspam">
                                <input type="checkbox" name="antispam" id="checkspam">Je suis un spammer et je l'assume!
                            </label>
                        </div>
                    </div>
                    <!--/*.col-md-12-->
                    <div class="col-md-12">
                        <button type='submit' class='btn btn-primary'>Envoyer</button>
                    </div>
                    <!--/*.col-md-12-->
                </div>
               
                <!--/*.row-->
            </form>
        </div>
        <!--/*.container-->
        <!-- END CONTENT -->
</body>

</html>
<?php
unset($_SESSION['inputs']); // on nettoie les données précédentes
unset($_SESSION['success']);
unset($_SESSION['errors']);
