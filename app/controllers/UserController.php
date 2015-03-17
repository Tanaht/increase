<?php

class UserController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public function projectsAction($arg1)
    {
        echo $arg1;
        $this->jquery->click("#btn", "console.log('jquery marche');");
        $this->jquery->compile($this->view);
    }

}

