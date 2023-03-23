<?php

class Controller_compte extends Controller
{
    public function action_compte()
    {
        $m = Model::getModel();
        $data = [
            "info" => $m->getUserByUserName($_GET["name"]),
        ];
        $this->render("compte", $data);
    }

    public function action_default()
    {
        $this->action_compte();
    }

    public function action_MiseAJour()
    {
        $m = Model::getModel();
        if(isset( $_GET["password"])){
        $info["password"] =  $_GET["password"];
        $info["login"]= $_GET["name"];
        $m->updatePersonnel($info);
        $data = [
            "info" => "mise à jour",
            "info" => $m->getUserByUserName($_GET["name"]),
        ];
        $this->render("compte", $data);
    }
    else {
        $this->action_default();
    }
    }
}
?>