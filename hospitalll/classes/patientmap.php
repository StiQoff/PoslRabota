<?php
class patientmap extends basemap{

    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT patient_id, gender, height, weight, hair_color, primeti". "FROM patient WHERE patient_id = $id");
            $pac = $res->fetchObject("Patient");
            if ($pac) {
                return $pac;
            }
        }
        return new patient();
    }

    public function arrGenders(){
        $res = $this->db->query("SELECT gender_id AS id, gender_name AS value FROM gender");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    public function arrHair()
    {
        $res = $this->db->query("SELECT hair_color_id AS id, Name AS value FROM hair_color");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }



    public function save(patient $pac)
    {
            if ($pac->patient_id == 0) {
                return $this->insert($pac);
            }
            else {
                return $this->update($pac);
            }

        return false;
    }
    private function insert(patient $pac){
        $height = $this-> db->quote($pac->height);
        $weight = $this-> db->quote($pac->weight);
        $primeti = $this-> db->quote($pac->primeti);
        $lastname = $this-> db->quote($pac->lastname);
        $firstname = $this-> db->quote($pac->firstname);
        $patronomic = $this-> db->quote($pac->patronomic);
        $age = $this-> db->quote($pac->age);
        if ($this->db->exec("INSERT INTO patient(patient_id, height, weight,primeti,gender_id,hair_color_id,lastname,firstname,patronomic,age)
 VALUES($pac->patient_id,$height,$weight,$primeti,$pac->gender_id,$pac->hair_color_id,$lastname,$firstname,$patronomic,$age)") == 1) {
            return true;
        }
        return false;
    }
    private function update(patient $pac){
        $height = $this-> db->quote($pac->height);
        $weight = $this-> db->quote($pac->weight);
        $primeti = $this-> db->quote($pac->primeti);
        $lastname = $this-> db->quote($pac->lastname);
        $firstname = $this-> db->quote($pac->firstname);
        $patronomic = $this-> db->quote($pac->patronomic);
        $age = $this-> db->quote($pac->age);
        if ( $this->db->exec("UPDATE patient SET lastname = $lastname, firstname = $firstname, patronomic = $patronomic,". " age = $age,height =$height,weight = $weight,primeti = $primeti, gender_id = $pac->gender_id,hair_color_hair_$pac->hair_colorcolor_id ". "WHERE patient_id = ".$pac->patient_id) == 1) {
            return true;
        }
        return false;
    }

    public function findProfileById($id=null){
        if ($id) {
            $res = $this->db->query("Select patient.patient_id, CONCAT(patient.lastname,' ', patient.firstname, ' ', patient.patronomic) 
            AS fio,patient.age,patient.height,patient.weight, patient.primeti,".
                " gender.gender_name AS gender, hair_color.Name AS hair FROM patient ".
                "INNER JOIN gender ON patient.gender_id=gender.gender_id" .
                " INNER JOIN hair_color ON patient.hair_color_id=hair_color.hair_color_id WHERE patient.patient_id =$id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }

    public function findAll($ofset=0, $limit=30)
    {
        $res = $this->db->query("Select patient.patient_id, CONCAT(patient.lastname,' ', patient.firstname, ' ', patient.patronomic) 
            AS fio,patient.age,patient.height,patient.weight, patient.primeti,".
            " gender.gender_name AS gender, hair_color.Name AS hair FROM patient ".
            "INNER JOIN gender ON patient.gender_id=gender.gender_id" .
            " INNER JOIN hair_color ON patient.hair_color_id=hair_color.hair_color_id
        LIMIT $ofset, $limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM patient");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }

    public function findAll1 ($ofset=0,$limit=30){
        $res = $this->db->query("SELECT hospital_ward.number AS number,CONCAT (patient.lastname ,'  ',patient.firstname  ,' ',patient.patronomic) AS fio,patient.age AS age, card.data_postup AS data_postup,c.data_vip AS data_vip"
            . " FROM patient 
            JOIN card ON patient.patient_id = card.patient_id
            JOIN card c ON patient.patient_id = c.patient_id
            JOIN hospital_ward ON card.hospital_ward_id = hospital_ward.hospital_ward_id AND card.data_postup >= CURRENT_DATE LIMIT $ofset,$limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function findAll3 ($ofset=0,$limit=30){
        $res = $this->db->query("SELECT card.data_postup AS data_postup,CONCAT (patient.lastname ,'  ',patient.firstname  ,' ',patient.patronomic) AS fio,patient.age AS age,gender.gender_name AS gender,c.data_vip AS data_vip"
            . " FROM patient
            JOIN gender ON patient.gender_id = gender.gender_id AND gender.gender_id = 2
            JOIN card c ON patient.patient_id = c.patient_id
            JOIN card ON patient.patient_id = card.patient_id AND patient.age > 25 WHERE card.data_postup > CURRENT_DATE LIMIT $ofset,$limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function findAll2 ($ofset=0,$limit=30)
    {
        $res = $this->db->query("SELECT hospital_ward.number AS number,h.telephone AS telephone,CONCAT (patient.lastname ,'  ',patient.firstname  ,' ',patient.patronomic) AS fio,patient.age AS age, card.data_postup AS data_postup,c.data_vip AS data_vip"
            . " FROM patient 
            JOIN card ON patient.patient_id = card.patient_id
            JOIN card c ON patient.patient_id = c.patient_id
            JOIN hospital_ward  h ON card.hospital_ward_id = h.hospital_ward_id
            JOIN hospital_ward ON card.hospital_ward_id = hospital_ward.hospital_ward_id LIMIT $ofset,$limit");
        return $res->fetchAll(PDO::FETCH_OBJ);

    }
}
?>