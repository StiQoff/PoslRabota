<?php
class postupmap extends basemap {

    public function arrPostup()
    {
        $res = $this->db->query("SELECT postup_id AS id, Place_name AS value FROM postup");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
}