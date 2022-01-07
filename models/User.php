<?php
require_once('Models/Model.php');

class User extends Model{

    protected $table = 'user';

    protected $attributes = [

        'username',
        'email',
        'password',
        'first_name',
        'middle_name',
        'last_name',
        'date_of_birth'

    ];

    public function __construct($data = [])
    {
        parent::__construct($data);

    }
     
    public function getFullName(){
        return $this->first_name.' '.$this->middle_name.' '.$this->last_name;
    }

}