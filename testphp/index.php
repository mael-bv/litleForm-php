<?php
require_once("controllerAction.php");
$insert = new Controller();
if(!empty($_POST)){
  $mess =  $insert->ajout($_POST['submit'],$_POST['prenom'],$_POST['nom'],$_POST['type'],$_POST['mail'],$_POST['date'],$_POST['phone'],$_POST['pays'],$_POST['question'],$_SERVER['REMOTE_ADDR']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="" method="post">
        <label for="">Prenom</label>
        <input type="text" placeholder="prenom" name="prenom"><br>
        <label for="">nom</label>
        <input type="text" placeholder="nom" name="nom"><br>
        <fieldset>
            <legend>Choose your type:</legend>

            <div>
            <input type="checkbox" id="scales" name="type" value="HOMME" checked>
            <label for="scales">Homme</label>
            </div>

            <div>
            <input type="checkbox" id="horns" name="type" value="FEMME">
            <label for="horns">Femme</label>
            </div>
        </fieldset>
        <label for="">Email</label>
        <input type="email" placeholder="email" name="mail"><br>
        <label for="">Date de naissance</label>
        <input type="date" name="date" ><br>
        <label for="">telephone</label>
        <input type="text" placeholder="telephone" name="phone"><br>
        <label for="">Pays</label>
        <input type="text" placeholder="pays" name="pays"><br>
        <label for="">Question ? </label><br>
        <textarea name="question"  placeholder="ecrire" ></textarea><br>
        <input type="submit" placeholder="envoyer" name="submit">
        
    </form>

    <?php
        if(isset($mess)){
            echo $mess;
        }
    ?>
    
</body>
</html>