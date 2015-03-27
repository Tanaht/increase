<?php

class Tache extends \Phalcon\Mvc\Model
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
    public $libelle;

    /**
     *
     * @var string
     */
    public $date;

    /**
     *
     * @var integer
     */
    public $avancement;

    /**
     *
     * @var string
     */
    public $codeUseCase;

    public function initialize(){
        $this->belongsTo('codeUseCase', 'Usecase', 'code');
    }
    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'libelle' => 'libelle', 
            'date' => 'date', 
            'avancement' => 'avancement', 
            'codeUseCase' => 'codeUseCase'
        );
    }

}
