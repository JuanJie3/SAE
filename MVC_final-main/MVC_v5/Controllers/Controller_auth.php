<?php

class Controller_auth extends Controller
{
    public function action_auth()
    {
        $m = Model::getModel();
        $data = [
            "mes" => "mot",
        ];
        $this->render("login", $data);
    }

    public function action_default()
    {
        $this->action_auth();
    }
}
?>