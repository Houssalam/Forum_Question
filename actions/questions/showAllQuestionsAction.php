<?php

require('actions/database.php');

// Récupérer les questions par default sans  recherche
$getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions ORDER BY id DESC LIMIT 0,5');

// Véfifier si une recherche a été trouvée par l'utilisateur
if(isset($_GET['search']) AND !empty($_GET['search'])) {

// la recherche
    $usersSearch = $_GET['search'];

// Récupérer toutes les questions qui correspondent à la recherche (en fonction du titre)
    $getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions WHERE titre LIKE "%'.$usersSearch.'%" ORDER BY id DESC');
    // $getAllQuestions->execute(array($usersSearch));

   
}