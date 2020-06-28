<?php
require_once 'secure.php';
if (isset($_POST['card_id'])) {
    $card = new Card();
    $card->card_id = Helper::clearInt($_POST['card_id']);
    $card->patient_id = Helper::clearInt($_POST['patient_id']);
    $card->diagnose = Helper::clearString($_POST['diagnose']);
    $card->postup_id = Helper::clearInt($_POST['postup_id']);
    $card->data_postup = Helper::clearString($_POST['data_postup']);
    $card->hospital_ward_id = Helper::clearInt($_POST['hospital_ward_id']);
    $card->telephone = Helper::clearInt($_POST['telephone']);
    $card->data_vip = Helper::clearString($_POST['data_vip']);
    $card->prichina_id = Helper::clearInt($_POST['prichina_id']);
    print_r($card);
    if ((new CardMap())->save($card)) {
        header('Location: view-card.php?id='.$card->card_id);
    } else {
        if ($card->card_id) {

            header('Location: add-card.php?id='.$card->card_id);

        } else {
            header('Location: add-card.php');
        }
    }
}