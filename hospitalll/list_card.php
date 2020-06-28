<?php
require_once 'secure.php';
$size = 5;
if (isset($_GET['page'])) {
    $page = Helper::clearInt($_GET['page']);
} else {
    $page = 1;
}
$cardMap = new CardMap();
$count = $cardMap->count();
$cards = $cardMap->findAll($page*$size-$size, $size);
$header = 'Список карт пациентов';
require_once 'template/header.php';
?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <section class="content-header">
                    <h1>Список карт пациентов</h1>
                    <ol class="breadcrumb">
                        <li><a href="/index.php"><i class="fafa-dashboard"></i> Главная</a></li>
                        <li class="active">Список карт пациентов</li>
                    </ol>
                </section>
                <div class="box-body">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php
                    if ($cards  ) {
                        ?>

                        <table id="example2" class="table table-bordered table-hover">

                            <thead>
                            <tr>
                                <th>Диагноз</th>
                                <th>Дата поступления</th>
                                <th>Дата выписки</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($cards as $card) {
                                echo '<tr>';
                                echo '<td><a href="view-card.php?id='.$card->card_id.'">'.$card->diagnose.'</a></td>';
                                echo '<td>'.$card->data_postup.'</td>';
                                echo '<td>'.$card->data_vip.'</td>';
                                echo '</tr>';

                            }
                            ?>
                            </tbody>
                        </table>
                    <?php } else {
                        echo 'Ни одной карты пациента не найдено';
                    } ?>
                </div>
                <div class="box-body">
                    <?php Helper::paginator($count, $page,
                        $size); ?>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
<?php
require_once 'template/footer.php';
?>