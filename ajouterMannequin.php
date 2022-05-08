<?php
    include_once '../Model/Mannequin.php';
    include_once '../Controller/MannequinC.php';

    $error = "";

    // create Mannequin
    $Mannequin = null;

    // create an instance of the controller
    $MannequinC = new MannequinC();
    if (
        isset($_POST["idM"]) &&
		isset($_POST["nom"]) &&		
        isset($_POST["prenom"]) &&
		isset($_POST["taille"]) && 
        isset($_POST["poids"]) && 
        isset($_POST["age"])
    ) {
        if (
            !empty($_POST["idM"]) && 
			!empty($_POST['nom']) &&
            !empty($_POST["prenom"]) && 
			!empty($_POST["taille"]) && 
            !empty($_POST["poids"]) && 
            !empty($_POST["age"])
        ) {
            $Mannequin = new Mannequin(
                $_POST['idM'],
				$_POST['nom'],
                $_POST['prenom'], 
				$_POST['taille'],
                $_POST['poids'],
                $_POST['age']
            );
            $MannequinC->ajouterMannequin($Mannequin);
            header('Location:afficherListeMannequins.php');
        }
        else
            $error = "Missing information";
    }

    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
    <body>
        <button><a href="afficherListeMannequins.php">Retour à la liste des Mannequins</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idM">Numéro Mannequin:
                        </label>
                    </td>
                    <td><input type="text" name="idM" id="idM" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="nom">Nom:
                        </label>
                    </td>
                    <td><input type="text" name="nom" id="nom" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="prenom">Prenom:
                        </label>
                    </td>
                    <td><input type="text" name="prenom" id="prenom" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="taille">taille:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="taille" id="taille">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="poids">poids:
                        </label>
                    </td>
                    <td>
                        <input type="poids" name="poids" id="poids">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="age">age:
                        </label>
                    </td>
                    <td>
                        <input type="age" name="age" id="age" >
                    </td>
                </tr>              
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Envoyer"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>