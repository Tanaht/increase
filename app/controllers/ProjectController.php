<?php

class ProjectController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public function equipeAction($idProjet){
        $equipe = Projet::findFirst("id = $idProjet")->getEquipe();
        echo "<table class='table' id='equipe-content'>";
        echo "<tr><th>Nom</th><th>Poids</th></tr>";
        foreach($equipe as $membre){
            echo "<tr><td>" . $membre['nom'] . "</td><td>" . $membre['poids'] . "</td></tr>";
        }
        echo "</table>";
    }

    public function messagesAction($idProjet){
        $messages = Message::find("idProjet = $idProjet");
        $this->view->setVar("messages", $messages);
    }

    public function authorAction($idProjet, $idAuthor){
        $usecase = Usecase::find("idDev = $idAuthor and idProjet = $idProjet");
        $this->view->setVar("usecase", $usecase);
    }
}

