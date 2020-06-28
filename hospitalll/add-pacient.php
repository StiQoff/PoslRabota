<?php
require_once 'secure.php';
$id = 0;
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
}
$pac = (new patientmap())->findById($id);
$header = (($id)?'Редактировать данные':'Добавить ').'пациента';
require_once 'template/header.php';
?>
    <section class="content-header">
        <h1><?=$header;?></h1>
        <ol class="breadcrumb">

            <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>

            <li><a href="list-patient.php">Пациенты</a></li>

            <li class="active"><?=$header;?></li>
        </ol>
    </section>
    <div class="box-body">
        <form action="save-patient.php" method="POST">
            <?php require_once '_formPersonal.php'; ?>
            <div class="form-group">
                <button type="submit" name="save-patient"
                        class="btn btn-primary">Сохранить</button>
            </div>
        </form>
    </div>
<?php
require_once 'template/footer.php';
?>