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

    public function getEquipe(){
        $poidsTotal = Usecase::sum(array("column" => "poids", "conditions" => "idProjet = " . $this->id));
        $aggregate = Usecase::sum(array("group" => "idDev", "column" => "poids", "conditions" => "idProjet = " . $this->id));
        $equipe = null;
        foreach ($aggregate as $row) {
            $membre = User::findFirst("id = " . $row->idDev);
            $nom = $membre->identite;
            $poids = round($row->sumatory / $poidsTotal * 100);
            $equipe[] = array("nom" => $nom, "poids" => $poids);
        }
        return $equipe;
    }
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
        $this->hasMany('id', 'Message', 'idProjet');
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
