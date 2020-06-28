<?php
class PrichinaMap extends BaseMap {

    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT prichina_id, prichina"
                . "FROM prichina_vip WHERE prichina_id = $id");
            return $res->fetchObject("Prichina");
        }
        return new Prichina();
    }

    public function save(Prichina $p) {
        if ($p->validate()) {
            if ($p->prichina_id == 0) {
                return $this->insert($p);
            } else {
                return $this->update($p);
            }
        }
        return false;
    }
    private function insert(Prichina $p){
        $prichina = $this->db->quote($p->prichina);
        if ($this->db->exec("INSERT INTO prichina_vip(prichina)"
                . " VALUES($prichina)") == 1) {
            $p->prichina_id = $this->db->lastInsertId();
            return true;
        }
        return false;
    }
    private function update(Prichina $p){
        $prichina = $this->db->quote($p->prichina);
        if ( $this->db->exec("UPDATE prichina_vip SET prichina = $prichina,". " WHERE prichina_id = ".$p->prichina_id) == 1) {
            return true;
        }
        return false;
    }

    public function findAll($ofset=0,$limit=30){
        $res = $this->db->query("SELECT prichina_vip.prichina_id,prichina_vip.prichina"
            . " FROM prichina_vip LIMIT $ofset,$limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM prichina_vip");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }

    public function arrPrichina()
    {
        $res = $this->db->query("SELECT prichina_id AS id, prichina AS value FROM prichina_vip");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }


}