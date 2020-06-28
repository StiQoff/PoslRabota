<?php
class hospital extends table{
    public $hospital_ward_id = 0;
    public $number = '';
    public $telephone = '';


    public function validate(){
        if(!empty($this->number)&&
            !empty($this->telephone)){
            return true;
        }
        return false;
    }
}