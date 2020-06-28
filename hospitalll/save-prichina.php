<?php
require_once 'secure.php';
if (isset($_POST['prichina_id'])) {
    $p = new Prichina();
    $p->prichina_id = Helper::clearInt($_POST['prichina_id']);
    $p->prichina = Helper::clearString($_POST['prichina']);

    if ((new PrichinaMap())->save($p)) {
        header('Location: list-prichina.php?id='.$p->prichina_id);
    } else {
        if ($p->prichina_id) {

            header('Location: add-prichina.php?id='.$p->prichina_id);

        } else {
            header('Location: add-prichina.php');
        }
    }
}
