<?php
require_once("db.php");
class actionBdd extends Dbphp{
//model
    function __construct(){
        parent::__construct();
    }

    public function firstAjout($first,$last,$type,$email,$birth,$phone,$country,$ip,$creatAp,$uptd,$counter){
        $req = $this->bdd->prepare("INSERT INTO news (firstname,lastname,type,email,birth,phone,country,ip,creatAt,uptdatAt,counter) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        $req->execute(array($first,$last,$type,$email,$birth,$phone,$country,$ip,$creatAp,$uptd,$counter));
        $req->closeCursor();
    }

    public function getData($mail){
        $req = $this->bdd->prepare("SELECT * FROM news WHERE email = ? ") ;
        $req->execute(array($mail));
        //Si le produit existe 
        if($req->rowCount()==1){
          $data = $req->fetchAll(PDO::FETCH_OBJ);
          return $data;
          //return $data;
        }else {
          return false;
        }
        $req->closeCursor();
    }

    public function getCount($mail){
      $req = $this->bdd->prepare("SELECT counter FROM news WHERE email = ?") ;
      $req->execute(array($mail));
      //Si le produit existe 
    /*   if($req->rowCount()==1){
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        //return $data;
      }else {
        return false;
      } */
      $data = $req->fetchAll(PDO::FETCH_OBJ);
      return $data;
      //$req->closeCursor();
  }

    public function update($newDate,$count,$email){
      var_dump("commencement");
      $req = $this->bdd->prepare("UPDATE news SET uptdatAt = ?, counter = ? WHERE email = ? ") ;
      $req->execute(array($newDate,$count,$email));
      $req->closeCursor();
  }
  public function afficheCount($mail){
    $req = $this->bdd->prepare("SELECT counter FROM news WHERE email = ? ");
    // $req->execute(array($mail));
    $mcount = $req->fetchAll(PDO::FETCH_OBJ);
    return $mcount;
  }

}

?>