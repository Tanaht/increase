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

        $this->jquery->ready(
            "$('#equipe-content').load('../../project/equipe/" . $idProjet . " #equipe-content');"
        );

        $this->jquery->click('#btnReturn',
            "
            $('body').load('../../user/projects/' + $(this).data('user') );
            "
        );
        $this->jquery->click("#btnMessages",
            "
                $('#divMessages').load(
                    '../../project/messages/" . $idProjet . " #messages-content',
                    function(responseText, textStatus, XMLHttpRequest){
                        $('.message').click(function(event){
                            var self = this;
                            $('#message').addClass('hide');
                            $('#message-objet').html(
                                $(self).data('objet')
                            );

                            $('#message-content').html(
                                $(self).data('content')
                            );
                            $('#message').removeClass('hide');
                        });
                    }
                );
            "
        );

        $this->jquery->compile($this->view);
    }

}