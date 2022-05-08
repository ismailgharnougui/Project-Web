<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'crudm');

if(isset($_POST['insertdata']))
{
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $taille = $_POST['taille'];
    $poids= $_POST['poids'];
    $age= $_POST['age'];
    $query = "INSERT INTO  mannequin (`nom`,`prenom`,`taille`,`poids`,`age`) VALUES ('$nom','$prenom','$taille','$poids','$age')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: index.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>