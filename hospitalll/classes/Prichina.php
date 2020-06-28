<?php
class Prichina extends Table{
    public $prichina_id = 0;
    public $prichina = '';

    public function validate()
    {
        if (!empty($this->prichina))
        {
            return true;
        }
        return false;
    }
}