<?php

class AuthorController extends \Phalcon\Mvc\Controller
{
    public function indexAction()
    {

    }

    public function projectsAction($idUser)
    {
        $user = User::findFirst("id = $idUser");
        $this->view->setVar("user", $user);


        $this->jquery->click("div.projet button", "
            $('body').load('../../author/project/' + $(this).data('href') + '/" . $idUser . "');
        ");
        $this->jquery->compile($this->view);
    }

    public function projectAction($idProjet, $idAuthor){
        $projet = Projet::findFirst("id = $idProjet");
        $this->view->setVar("projet", $projet);
        $this->jquery->ready(
            "$('#usecase-content').load('../../project/author/" . $idProjet . "/" . $idAuthor ." #usecase-content',
                function(responseText, textStatus, XMLHttpRequest){
                    $('.usecase').click(function(event){
                        var self = this;
                        $('.usecase-hide').addClass('hide');
                        console.log('#usecase_' + $(self).data('show'));
                        $('#usecase_' + $(self).data('show')).load('../../usecase/taches .' + $(self).data('show'));
                        $('#usecase_show_' + $(self).data('show')).removeClass('hide');
                        console.log('toto');
                    });
                }
            );"
        );

        $this->jquery->click('#btnReturn',
            "
            $('body').load('../../author/projects/' + $(this).data('user') );
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

