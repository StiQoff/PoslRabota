<?php
class postup extends table{
    public $postup_id = 0;
    public $Place_name = '';


    public function validate(){
        if(!empty($this->Place_name)
           ){
            return true;
        }
        return false;
    }
}