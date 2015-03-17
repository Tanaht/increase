<?php

class UserController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public function projectsAction($id)
    {
        $query =  array("(id = $id)");
        $user = User::find($query);
        $this->view->setVar("user", $user);
    }

}

