<?php
session_start();
?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <title>Contacter moi</title>
  <meta name="description" content="Vous pouvez me joindre via mon formulaire de contact pour me
    proposer un travail, un stage , une aide" />



  <!-- Favicons -->
  <link rel="icon" href="img/cv.ico" />
  <link rel="apple-touch-icon" sizes="57x57" href="img/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="img/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="img/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="img/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="img/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="img/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="img/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="img/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="img/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-16x16.png">
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="img/favicon-96x96.png">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic|Raleway:400,300,700"
    rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================
    Template Name: Kelvin
    Template URL: https://templatemag.com/kelvin-bootstrap-resume-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body data-spy="scroll" data-offset="64" data-target="#section-topbar">

  <div id="section-topbar">
    <div id="topbar-inner">
      <div class="container">
        <div class="row">
          <div class="dropdown">

          <ul id="nav" class="nav">
              <li class="menu-item"><a class="smothscroll" href="#about" title="Un peu de moi"><i
                    class="fa fa-user"></i></a>
              </li>
              <li class="menu-item"><a class="smothscroll" href="#resume" title="Formation"><i
                    class="fa fa-file-text-o"></i></a></li>
              <li class="menu-item"><a class="smothscroll" href="#work" title="Mes travaux"><i
                    class="fa fa-briefcase"></i></a></li>
              <li class="menu-item"><a class="smothscroll" href="#blog" title="Liens"><i class="fa fa-link"
                    aria-hidden="true"></i></a></li>
              <li class="menu-item"><a class="smothscroll" href="#contact" title="Contact"><i
                    class="fa fa-envelope"></i></a></li>
              <li class="menu-item"><a  href="https://www.facebook.com/olivier.web.9"
                  title="Facebook"><i class="fa fa-facebook-square"></i></a></li>
              <li class="menu-item"><a href="https://www.linkedin.com/in/olivier-lemattre-52522a185/" 
                title="linkedin"><i class="fa fa-linkedin-square"></i></a></li>
                   
                  
            </ul>
            <!--/ uL#nav -->
          </div>
          <!-- /.dropdown -->

          <div class="clear"></div>
        </div>
        <!--/.row -->
      </div>
      <!--/.container -->

      <div class="clear"></div>
    </div>
    <!--/ #topbar-inner -->
  </div>
  <!--/ #section-topbar -->

  <div id="headerwrap">
    <div class="container">
      <div class="row centered">
      <div class="col-lg-12">
          <h1>OlivierWeb</h1>
          <h3>Etudiant Web Designer | Mon cv en ligne</h3>
        </div>
        <!--/.col-lg-12 -->
      </div>
      <!--/.row -->
    </div>
    <!--/.container -->
  </div>
  <!--/.#headerwrap -->


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
                                un developpeur en herbe qui souhaite apprendre a créer un formulaire
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
                                Une personne qui veut être aider
                            </label>
                        </div>
                    </div>
                    <!--/*.form-group-->
                </div>
                <!--/*.col-md-12-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Vous me contactez pour <i>(plusieurs réponses possible)</i></label>
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
                                Un problème sur mon site
                            </label>
                        </div>
                    </div>
                    <!--/*.form-group-->
                </div>
                <!--/*.col-md-12-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="inputfiles">Envoyer un fichier  Extensions autorisées:<br>.jpeg, .jpg, .png, .pdf, .rar, .zip, .docx</label>
                      
                        <input type="file" name="upfiles" id="inputfiles">
                       
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
