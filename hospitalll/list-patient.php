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
$pacs = $pacMap->findAll($page*$size-$size, $size);
$header = 'Список пациентов';
require_once 'template/header.php';
?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <section class="content-header">
                    <h1>Список пациентов</h1>
                    <ol class="breadcrumb">
                        <li><a href="/index.php"><i class="fafa-dashboard"></i> Главная</a></li>
                        <li class="active">Список
                            пациентов</li>
                    </ol>
                </section>
                <div class="box-body">

                    <a class="btn btn-success" href="add-pacient.php">Добавить пациента</a>
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
                                <th>Пол</th>
                                <th>Возраст</th>
                                <th>Рост</th>
                                <th>Вес</th>
                                <th>Волосы</th>


                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($pacs as $pac) {
                                echo '<tr>';
                                echo '<td><a href="profile-patient.php?id='.$pac->patient_id.'">'.$pac->fio.'</a></td>';

                                echo '<td>'.$pac->gender.'</td>';

                                echo '<td>'.$pac->age.'</td>';
                                echo '<td>'.$pac->height.'</td>';
                                echo '<td>'.$pac->weight.'</td>';
                                echo '<td>'.$pac->hair.'</td>';

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