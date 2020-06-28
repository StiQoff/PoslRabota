<?php
class Card extends Table{
	public $card_id = 0;
	public $patient_id = 0;
	public $diagnose = '';
	public $postup_id = 0;
	public $data_postup = '';
	public $hospital_ward_id = 0;
	public $data_vip = '';
    public $telephone = 0;
	public $prichina_id = 0;
	public function validate()
	{
        if (!empty($this->patient_id)&&
        	!empty($this->diagnose)&&
        	!empty($this->postup_id)&&
        	!empty($this->data_postup)&&
        	!empty($this->hospital_ward_id)&&
            !empty($this->telephone)&&
        	!empty($this->data_vip)&&
        	!empty($this->prichina_id))
        	{ 
        	return true;
        }
        return false;
    }
}