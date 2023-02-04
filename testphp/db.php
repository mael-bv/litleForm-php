<?php

class Dbphp
{
protected $bdd;

         public function __construct()
        {
            $this->bdd =  new PDO('mysql:host=127.0.0.1;dbname=newlestter', 'root' ,'');
        }

}



?>

