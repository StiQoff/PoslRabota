<?php
class CardMap extends basemap{


    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT card_id, patient_id, postup_id,diagnose ,data_postup ,hospital_ward_id,telephone,data_vip,prichina_id ".
                "FROM card WHERE card_id = $id");
            $card = $res->fetchObject("Card");
            if ($card) {
                return $card;
            }
        }
        return new Card();
    }
    public function count()
    {
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM card");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }
    public function findAll($ofset=0,$limit=30){
        $res = $this->db->query("SELECT card.card_id,card.diagnose,card.data_postup,card.data_vip"
            . " FROM card LIMIT $ofset,$limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function findViewById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT card.card_id,card.data_postup, card.data_vip,card.diagnose"
                . " FROM card 
                 WHERE card.card_id = $id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }
}