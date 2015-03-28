<?php

class User extends \Phalcon\Mvc\Model
{
    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $mail;

    /**
     *
     * @var string
     */
    public $password;

    /**
     *
     * @var string
     */
    public $identite;

    /**
     *
     * @var string
     */
    public $role;
    public function getAuthorProject(){
        if(false === strpos($this->role, "author"))
            return false;
        $usecase = Usecase::count(array("group" => "idProjet", "conditions" => "idDev =" . $this->id));
        $projet = null;
        foreach($usecase as $author_project){
            $temp_projet = Projet::findFirst("id = $author_project->idProjet");
            $projet[] = $temp_projet;
        }
        return $projet;
    }
    public function initialize(){
        $this->hasMany('id', 'Projet', 'idClient');
        $this->hasMany('id', 'Usecase', 'idDev');
        $this->hasMany('id', 'Message', 'idUser');
    }
    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'mail' => 'mail', 
            'password' => 'password', 
            'identite' => 'identite', 
            'role' => 'role'
        );
    }

    public function finalize(){

    }

}
