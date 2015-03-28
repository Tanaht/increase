<?php

class UsecaseController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public function tachesAction(){
        $this->view->setVar("usecase", Usecase::find());
    }
}

