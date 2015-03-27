<?php

class UserController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public function projectsAction($idUser)
    {
        $user = User::findFirst("id = $idUser");
        $this->view->setVar("user", $user);


        $this->jquery->click("div.projet button", "
            $('body').load('../../user/project/' + $(this).data('href'));
        ");
        $this->jquery->compile($this->view);
    }

    public function projectAction($idProjet){
        $projet = Projet::findFirst("id = $idProjet");
        $this->view->setVar("projet", $projet);
    }

}

