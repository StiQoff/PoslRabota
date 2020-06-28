<?php
class hospitalmap extends basemap {
    public function arrHospitalNum()
    {
        $res = $this->db->query("SELECT hospital_ward_id AS id, number AS value FROM hospital_ward");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function arrHospitalTel()
    {
        $res = $this->db->query("SELECT hospital_ward_id AS id, telephone AS value FROM hospital_ward");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
}
