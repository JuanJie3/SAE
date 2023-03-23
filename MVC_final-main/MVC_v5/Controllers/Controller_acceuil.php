<?php

class Controller_acceuil extends Controller
{
    public function action_acceuil()
    {
        $m = Model::getModel();
        $data = [
                "liste" => $m->getacceuil(),
        ];
        $this->render("accueil", $data);
    }

    public function action_default()
    {
        $this->action_acceuil();
    }
}

?>
