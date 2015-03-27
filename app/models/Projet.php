<?php

class Projet extends \Phalcon\Mvc\Model
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
    public $nom;

    /**
     *
     * @var string
     */
    public $description;

    /**
     *
     * @var string
     */
    public $dateLancement;

    /**
     *
     * @var string
     */
    public $dateFinPrevue;

    /**
     *
     * @var integer
     */
    public $idClient;

    public function getjourRestant(){
        return date("d", strtotime($this->dateFinPrevue) - time());
    }

    public function getPourcentageTempEcoule(){
        $total = strtotime($this->dateFinPrevue) - strtotime($this->dateLancement);
        $tempEcoule = time() - strtotime($this->dateLancement);
        return ($tempEcoule/$total)*100;
    }
    public function initialize(){
        $this->belongsTo("idClient", "User", "id");
        $this->belongsTo('id', 'Message', 'idProjet');
        $this->hasMany('id', 'Usecase', 'idProjet');
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'nom' => 'nom', 
            'description' => 'description', 
            'dateLancement' => 'dateLancement', 
            'dateFinPrevue' => 'dateFinPrevue', 
            'idClient' => 'idClient'
        );
    }

}
