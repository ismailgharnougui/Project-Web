<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'crudm');

    if(isset($_POST['updatedata']))
    {   
        $idm = $_POST['update_id'];
        
        $nom= $_POST['nom'];
        $prenom = $_POST['prenom'];
        $taille= $_POST['taille'];
        $poids = $_POST['poids'];
        $age = $_POST['age'];
        

        $query = "UPDATE mannequin SET nom='$nom', prenom='$prenom', taille='$taille', poids=' $poids' WHERE idm='$idm'  ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:index.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>