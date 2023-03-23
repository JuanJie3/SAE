<?php

class Controller_entreprise extends Controller
{
    public function action_entreprise()
    {
        $m = Model::getModel();
        $data = [
            "liste" => $m->getentreprise(),
        ];
        $this->render("entreprise", $data);
    }

    public function action_default()
    {
        $this->action_entreprise();
    }


}
?>
