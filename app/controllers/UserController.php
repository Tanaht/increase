<?php

class UserController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public function projectsAction($id)
    {
        $user = User::findFirst("id = $id");

        $this->view->setVar("user", $user);
    }

}

