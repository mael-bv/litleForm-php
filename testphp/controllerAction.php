<?php
require_once('actionBdd.php');
class Controller{

    public function ajout($submit,$first,$last,$type,$mail,$date,$tel,$pays,$question,$ip){
        $data = new actionBdd();
        $mineur = "2005-01-30";
        $count = 1;
        $erreur;
        $update;
        if(isset($submit)){
            if(isset($first)&&isset($last)&&isset($type)&&isset($mail)&&isset($date)&&isset($tel)&&isset($pays)&&isset($question)){
                if(!empty($first) && !empty($last) && !empty($type) && !empty($mail) && !empty($date) && !empty($tel) && !empty($pays) && !empty($question)){
                    $prenom = htmlspecialchars($first);
                    $nom = htmlspecialchars($last);
                    $sex = htmlspecialchars($type);
                    $email = htmlspecialchars($mail);
                    $birth = htmlspecialchars($date);
                    $num = htmlspecialchars($tel);
                    $country = htmlspecialchars($pays);
                    $text = htmlspecialchars($question);
                    if(strlen($text) < 15 ){
                        $erreur = "Nombre de caratere est de 15";
                    }else{
                        if($birth < $mineur){
                            $emailExist = $data->getData($email);
                            if($emailExist){
                                $count++;
                                $update = date("d.m.y");
                                $counter->update($update,$count,$email);
                            }else {
                                $create = date("d.m.y");
                                $update = "";
                                $data->firstAjout($prenom,$nom,$sex,$email,$birth,$num,$country,$ip,$create,$update,$count);
                                die("envoyez");
                            }
                        }else {
                            $erreur = "interdis au mineur";
                        }
                    }
                }else{
                    $erreur = "Veuillez renseigner tout les champs";
                }
            }else{
                $erreur = "Veuillez renseigner tout les champs";
            }
        }else{
            $erreur = "aucune validation";
        }
      return $erreur;
    }

}

?>

<!-- 
     $counter = $data->getCount($email);
                                $newCounter = json_encode($counter);
                                die(intval($newCounter++));

                                ------------------------------------

                                 $counter = $data->getCount($email);
                                $counters = implode("",$counter);
                                die($counters);
 -->