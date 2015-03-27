<?php

class Usecase extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $code;

    /**
     *
     * @var string
     */
    public $nom;

    /**
     *
     * @var integer
     */
    public $poids;

    /**
     *
     * @var integer
     */
    public $avancement;

    /**
     *
     * @var integer
     */
    public $idProjet;

    /**
     *
     * @var integer
     */
    public $idDev;

    public  function getAvancement(){
        return ( ( $this->poids/$this->getTotalPoids() ) * 100 ) * ($this->avancement / 100);
    }

    public function getTotalPoids(){
        return Usecase::sum(array(
                "column" => "poids",
                "conditions" => "idProjet = " . $this->idProjet)
        );
    }

    public function initialize(){
        $this->belongsTo('idDev', 'User', 'id');
        $this->hasMany('code', 'Tache', 'codeUseCase');
        $this->belongsTo('idProjet', 'Projet', 'id');
    }
    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'code' => 'code', 
            'nom' => 'nom', 
            'poids' => 'poids', 
            'avancement' => 'avancement', 
            'idProjet' => 'idProjet', 
            'idDev' => 'idDev'
        );
    }

}
