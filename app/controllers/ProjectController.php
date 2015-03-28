<?php

class ProjectController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public function equipeAction($idProjet){
        $equipe = Projet::findFirst("id = $idProjet")->getEquipe();
        echo "<table class='table' id='equipe-content'>";
        foreach($equipe as $membre){
            echo "<tr><td>" . $membre['nom'] . "</td><td>" . $membre['poids'] . "</td></tr>";
        }
        echo "</table>";
    }
}

