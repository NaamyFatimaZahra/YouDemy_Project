<?php
include_once '../config/config.php';
// Détruire toutes les données de session
session_unset();
session_destroy();

// Rediriger l'utilisateur vers la page d'accueil ou la page de connexion
header("Location: ../../Public/index.php");
exit;
?>
