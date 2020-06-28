<?php
require_once 'secure.php';
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
    $card = (new CardMap())->findViewById($id);
    $header = 'Просмотр группы';
    require_once 'template/header.php';
    ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <section class="content-header">
                    <h1><?=$header;?></h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fafa-dashboard"></i> Главная</a></li>

                        <li><a href="list_card.php">Группы</a></li>

                        <li class="active"><?=$header;?></li>
                    </ol>
                </section>
                <div class="box-body">

                </div>
                <div class="box-body">

                    <table class="table table-bordered table-hover">

                        <tr>
                            <th>Диагноз</th>

                            <td><?=$card->diagnose;?></td>

                        </tr>
                        <tr>

                            <th>Дата поступления</th>

                            <td><?=$card->data_postup;?></td>

                        </tr>
                        <tr>

                            <th>Дата выписки</th>
                            <td><?=$card->data_vip;?></td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
}
require_once 'template/footer.php';
?>