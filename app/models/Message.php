<?php

class Message extends \Phalcon\Mvc\Model
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
    public $objet;

    /**
     *
     * @var string
     */
    public $content;

    /**
     *
     * @var string
     */
    public $date;

    /**
     *
     * @var integer
     */
    public $idUser;

    /**
     *
     * @var integer
     */
    public $idProjet;

    /**
     *
     * @var integer
     */
    public $idFil;

    public function initialize(){
        $this->hasMany('id', 'Message', 'idFil');
        $this->belongsTo('idProjet', 'Projet', 'id');
        $this->belongsTo('idUser', 'User', 'id');
        $this->belongsTo('idFil', 'Message', 'id');
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'objet' => 'objet', 
            'content' => 'content', 
            'date' => 'date', 
            'idUser' => 'idUser', 
            'idProjet' => 'idProjet', 
            'idFil' => 'idFil'
        );
    }

}
