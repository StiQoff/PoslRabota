<?php
require_once 'secure.php';
$size = 5;
if (isset($_GET['page'])) {
    $page = Helper::clearInt($_GET['page']);
} else {
    $page = 1;
}
$pacMap = new patientmap();
$count = $pacMap->count();
$pacs = $pacMap->findAll1($page*$size-$size, $size);
$header = 'Второй запрос';
require_once 'template/header.php';
?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <section class="content-header">
                    <h1>Второй запрос</h1>
                    <ol class="breadcrumb">
                        <li><a href="/index.php"><i class="fafa-dashboard"></i> Главная</a></li>
                        <li class="active">Второй запрос</li>
                    </ol>
                </section>
                <div class="box-body">


                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php
                    if ($pacs) {
                        ?>

                        <table id="example2" class="table table-bordered table-hover">

                            <thead>
                            <tr>
                                <th>Ф.И.О</th>
                                <th>Номер палаты</th>
                                <th>Возраст</th>
                                <th>Дата поступления</th>
                                <th>Дата выписки</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($pacs as $pac) {
                                echo '<tr>';
                                echo '<td>'.$pac->fio.'</td>';
                                echo '<td>'.$pac->number.'</td>';
                                echo '<td>'.$pac->age.'</td>';
                                echo '<td>'.$pac->data_postup.'</td>';
                                echo '<td>'.$pac->data_vip.'</td>';
                                echo '</tr>';

                            }
                            ?>
                            </tbody>
                        </table>
                    <?php } else {
                        echo 'Ни одного пациента не найдено';
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