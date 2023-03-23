<?php

class Controller_bos extends Controller
{
    public function action_bos()
    {
        $m = Model::getModel();
        $data = [
            "liste" => $m->getAllEleveBos(),
        ];
        $this->render("bos", $data);
    }

    public function action_default()
    {
        $this->action_bos();
    }

    public function action_profil()
    {
        $data = false;
        if(isset($_GET['id']) and preg_match("/^[1-9]\d+$/", $_GET["id"])){
        $m = Model::getModel();
        $data = ["liste" => $m->getInformation($_GET['id'])];
      }
        if ($data !== false){
          $this->render('profil',$data);
        }
        else {
          $this->action_error("Erreur id n'existe pas !!!");
        }
    }

    public function action_validation(){
      if(isset($_GET["status"])){
        $m = Model::getModel();  
        $info["status"] = $_GET["status"];
        $info["id"] = $_GET["id"];
        $ajout = $m->updateStatus($info);
        $data = ["message" => "mise à jour faite"];
      }
      else{
        $data = ["message" => "Error"];
      }
    $this->render('profil',$data);
    }

}
?>
