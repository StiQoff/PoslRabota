<?php
class patient extends table{
	public $patient_id = 0;
	public $gender_id = 0;
	public $height = 0;
	public $weight = 0;
	public $hair_color_id = 0;
	public $primeti = '';
    public $lastname = '';
    public $firstname = '';
    public $patronomic = '';
    public $age = 0;


	public function validate(){
	if(!empty($this->gender_id)&&
		!empty($this->height)&&
		!empty($this->weight)&&
		!empty($this->hair_color_id)&&
        !empty($this->lastname)&&
        !empty($this->firstname)&&
        !empty($this->patronomic)&&
        !empty($this->age)&&
		!empty($this->primeti)){
		return true;
		}
		return false;
	}
}