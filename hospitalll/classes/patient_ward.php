<?php
class patient_ward extends table{
	public $ward_id = 0;
	public $patient_id = 0;
	public $hospital_ward_id = 0;
	public function validate(){
		if(!empty($this->patient_id)&&
			!empty($this->hospital_ward_id)){
		return true;
	}
	return false;
}