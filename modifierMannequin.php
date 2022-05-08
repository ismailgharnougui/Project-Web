<?php
    include_once '../Model/Mannequin.php';
    include_once '../Controller/MannequinC.php';

    /*$error = "";

    // create Mannequin
    //$Mannequin = null;

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
            !empty($_POST['idM']) &&
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
            $MannequinC->modifierMannequin($Mannequin, $_POST["idM"]);
            header('Location:afficherListeMannequins.php');
        }
        else
            $error = "Missing information";
    }*/

    $MannequinC = new MannequinC();
    $id = $_GET['idM'] ?? null;
    $mannequin = $MannequinC->recupererMannequin($id);
$error = "";

$Mannequin = new Mannequin($mannequin['idM'],$mannequin['nom'],$mannequin['prenom'],$mannequin['taille'],$mannequin['poids'],$mannequin['age']);



if (!$id) {
    header('Location:afficherlisteMannequins.php');
    exit;
}
$mannequinData = $MannequinC->recupererMannequin($id);
$MannequinListe=$mannequinData;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mannequinData['idM'] = $_POST['idM'];
    $mannequinData['nom'] = $_POST['nom'];
    $mannequinData['prenom'] = $_POST['prenom'];
    $mannequinData['taille'] = $_POST['taille'];
    $mannequinData['poids'] = $_POST['poids'];
    $mannequinData['age'] = $_POST['age'];

    $Mannequin->load($mannequinData);
    $Mannequin->save();
    header('Location:afficherlisteMannequins.php');
}
else
    $error = "Missing information";
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
			
		<?php
			/*if (isset($_POST['idM'])){
				$Mannequin = $MannequinC->recupererMannequin($_POST['idM']);*/

		?>
        
        <form method="post" enctype="multipart/form-data">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idM">Numéro Mannequin:
                        </label>
                    </td>
                    <td><input type="text" name="idM" id="idM" value="<?php echo $MannequinListe['idM']; ?>" maxlength="20"></td>
                </tr>
				<tr>
                <tr>
                    <td>
                        <label for="nom">Nom:
                        </label>
                    </td>
                    <td><input type="text" name="nom" id="nom" value="<?php echo $MannequinListe['nom']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="prenom">Prenom:
                        </label>
                    </td>
                    <td><input type="text" name="prenom" id="prenom" value="<?php echo $MannequinListe['prenom']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="taille">taille:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="taille" value="<?php echo $MannequinListe['taille']; ?>" id="taille">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="poids">poids:
                        </label>
                    </td>
                    <td>
                        <input type="poids" name="poids" id="poids" value="<?php echo $MannequinListe['poids']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="age">age
                        </label>
                    </td>
                    <td>
                        <input type="age" name="age" id="age" value="<?php echo $MannequinListe['age']; ?>">
                    </td>
                </tr>              
                <tr>
                    <td>  <button type="submit" class="btn btn-sm btn-outline-danger">Modifier</button></td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>

        </form>
		<?php
		//}
		?>
    </body>
</html>