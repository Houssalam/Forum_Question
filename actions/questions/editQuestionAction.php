<?php

require ('actions/database.php');

// Validation du formulaire
if(isset($_POST['validate'])) {

// Vérifier si tous les champs sont remplis
    if(!empty($_POST['title']) &&!empty($_POST['description']) &&!empty($_POST['content'])){
         
        // les données à faire passer dans la requ��te 
         $new_question_title = htmlspecialchars($_POST['title']);
         $new_question_description = nl2br(htmlspecialchars($_POST['description']));
         $new_question_content = nl2br(htmlspecialchars($_POST['content']));

// Modifier les informations de la question qui possede l'id rentré en paramètre dans l'url
         $editQuestionOnWeebsite = $bdd->prepare('UPDATE questions SET titre = ?, description = ?, contenu = ? WHERE id = ?');
         $editQuestionOnWeebsite->execute(array($new_question_title, $new_question_description, $new_question_content, $idOfQuestion));

// Redirection vers la page d'affichage des questions de l'utilisateur
         header('Location: my-questions.php');

    }else{
        $errorMsg = "Veuillez compléter tous les champs";
    }
}