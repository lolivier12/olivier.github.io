<?php
session_start(); //on démarre la session
// $errors = [];
$errors = array(); // on crée une vérif de champs
if (!array_key_exists('name', $_POST) || $_POST['name'] == '') { // on verifie l'existence du champ et d'un contenu
  $errors['name'] = "vous n'avez pas renseigné votre nom";
}
if (!array_key_exists('email', $_POST) || $_POST['email'] == '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  $errors['mail'] = "vous n'avez pas renseigné votre email";
}
if (!array_key_exists('subject', $_POST) || $_POST['subject'] == '') {
  $errors['subject'] = "vous n'avez pas renseigné le sujet de la demande";
}
if (!array_key_exists('service', $_POST) || $_POST['service'] == '') {
  $errors['service'] = "Veuillez sélectionner un objet de demande";
}
if (!array_key_exists('message', $_POST) || $_POST['message'] == '') {
  $errors['message'] = "vous n'avez pas renseigné votre message";
}
if (array_key_exists('antispam', $_POST)) { // on place un petit filet anti robots spammers
  $errors['antispam'] = "Vous êtes un robots spammer";
}
//Multi checkbox
if (isset($_POST['multiselect'])) {
  $multiselect = array();
  foreach ($_POST['multiselect'] as $return_choice) {
    $multiselect[] = $return_choice;
  }
  $multiselect = implode(' ; ', $multiselect);
}
// UPLOAD DE FICHIER
// taille autorisées (min & max -- en octets)
$file_min_size = 0;
$file_max_size = 10000000;
// On vérifie la présence d'un fichier à uploader
if (($_FILES['upfiles']['size'] > $file_min_size) && ($_FILES['upfiles']['size'] < $file_max_size)) :
  // dossier où sera déplacé le fichier
  $content_dir = 'upload/';
  $tmp_file = $_FILES['upfiles']['tmp_name'];
  if (!is_uploaded_file($tmp_file)) {
    $errors['upfiles'] = "le fichier est introuvable";
  }

  // on vérifie l'extension
  $type_file = $_FILES['upfiles']['type'];
  if (
    !strstr($type_file, 'jpg')
    && !strstr($type_file, 'jpeg')
    && !strstr($type_file, 'png')
    && !strstr($type_file, 'gif')
    && !strstr($type_file, 'txt')
    && !strstr($type_file, 'rar')
    && !strstr($type_file, 'zip')
    && !strstr($type_file, 'pdf')
    && !strstr($type_file, 'doc')
    && !strstr($type_file, 'docx')
    // reproduire cette syntaxe pour ajouter d'autre extension
  ) {
    $errors['upfiles'] = "le fichier n'a pas une extension autorisé";
  }
  // Si le formulaire est validé, on copie le fichier dans le dossier de destination
  if (empty($errors)) {
    $path = $_FILES['upfiles']['name'];
    $ext = pathinfo($path, PATHINFO_EXTENSION); // on récupère l'extension
    $name_file = md5(uniqid(rand(), true)) . '.' . $ext; // on crée un nom unique en conservant l'extension
    if (!move_uploaded_file($tmp_file, $content_dir . $name_file)) {
      $errors['upfiles'] = "Il y a des erreurs! Impossible de copier le fichier dans le dossier cible";
    }
  }
  // Si le formulaire contient des erreurs, on annule le transfert du fichier

  // On récupère l'url du fichier envoyé
  $get_the_file = "<a href=\"http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) . "/" . $content_dir . $name_file . "\" target=\"_blank\">Accéder au fichier</a>";
elseif ($_FILES['upfiles']['size'] > $file_max_size) :
  $errors['upfiles'] = "le fichier dépasse la limite autorisée";
  $get_the_file = "Pas de fichier joint";
else :
  $get_the_file = "Pas de fichier joint";
endif;

//FIN DU SYSTEME D'UPLOAD
//On check les infos transmises lors de la validation
if (!empty($errors)) { // si erreur on renvoie vers la page précédente
  $_SESSION['errors'] = $errors; //on stocke les erreurs
  $_SESSION['inputs'] = $_POST;
  header('Location: erreur.html');
} else {
  $_SESSION['success'] = 1;
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
  $headers .= 'FROM:' . htmlspecialchars($_POST['email']);
  $to = 'platreetplaco@gmail.com';
  $subject = 'Message envoyé par ' . htmlspecialchars($_POST['name']) . ' - <i>' . htmlspecialchars($_POST['email']) . '</i>';
  $message_content = '
  <table>
  <tr>
  <td><b>Emetteur du message:</b></td>
  </tr>
  <tr>
  <td>' . $subject . '</td>
  </tr>
  <tr>
  <td><b>Sujet du message:</b></td>
  </tr>
  <tr>
  <td>' . htmlspecialchars($_POST['subject']) . '</td>
  </tr>
  <tr>
  <td><strong>Je vous propose:</strong></td>
  </tr>
  <tr>
  <td>' . htmlspecialchars($_POST['service']) . '</td>
  </tr>
  <tr>
  <td><strong>Reponse de "vous etes":</strong></td>
  </tr>
  <tr>
  <td>' . htmlspecialchars($_POST['optionsradios']) . '</td>
  </tr>
  <tr>
  <td><strong>Vous me contactez pour:</strong></td>
  </tr>
  <tr>
  <td>' . htmlspecialchars($multiselect) . '</td>
  </tr>
  <tr>
  <td><b>Contenu du message:</b></td>
  </tr>
  <tr>
  <td>' . nl2br(htmlspecialchars($_POST['message'])) . '</td>
  </tr>
  <tr>
  <td><b>Fichier envoyé:</b></td>
  </tr>
  <tr>
  <tr>
  <td>Nom d\'origine du fichier: ' . $_FILES['upfiles']['name'] . '</td>
  </tr>
  <tr>
  <td>Type du fichier: ' . $_FILES['upfiles']['type'] . '</td>
  </tr>
  <tr>
  <td>Taille du fichier: ' . $_FILES['upfiles']['size'] . ' octets</td>
  </tr>
  <tr>
  <td></td>
  </tr>
  <tr>
  <td>' . $get_the_file . '</td>
  </tr>
  </table>
  ';
  mail($to, $subject, $message_content, $headers);
  header('Location: messageok.html');
}
