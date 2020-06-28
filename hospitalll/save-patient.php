<?php
require_once 'secure.php';
if (isset($_POST['patient_id'])) {
    $pac = new patient();
    $pac->patient_id= Helper::clearInt($_POST['patient_id']);
    $pac->gender_id = Helper::clearInt($_POST['gender_id']);
    $pac->height = Helper::clearString($_POST['height']);
    $pac->weight = Helper::clearString($_POST['weight']);
    $pac->hair_color_id = Helper::clearInt($_POST['hair_color_id']);
    $pac->primeti = Helper::clearString($_POST['primeti']);
    $pac->lastname = Helper::clearString($_POST['lastname']);
    $pac->firstname = Helper::clearString($_POST['firstname']);
    $pac->patronomic = Helper::clearString($_POST['patronomic']);
    $pac->age = Helper::clearString($_POST['age']);
    if ((new patientmap())->save($pac)) {
        header('Location: list-patient.php?id='.$pac->patient_id);
    } else {
        if ($pac->patient_id) {

            header('Location: add-pacient.php?id='.$pac->patient_id);

        } else {
            header('Location: add-pacient.php');
        }
    }
}