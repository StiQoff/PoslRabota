<?php
require_once 'secure.php';
$id = 0;
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
}
$p = (new PrichinaMap())->findById($id);
$header = (($id)?'Редактировать':'Добавить').' тип рациона';
require_once 'template/header.php';
?>
    <section class="content-header">
        <h1><?=$header;?></h1>
        <ol class="breadcrumb">

            <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
            <li><a href="list-prichina.php">Список типов</a></li>
            <li class="active"><?=$header;?></li>
        </ol>
    </section>
    <div class="box-body">
        <form action="save-prichina.php" method="POST">
            <div class="form-group">
                <label>Название</label>
                <input type="text" class="form-control"name="prichina" required="required" value="<?=$p->prichina;?>">
            </div>
            <div class="form-group">
                <button type="submit" name="save-prichina" class="btn btn-primary">Сохранить</button>
            </div>
            <input type="hidden" name="prichina_id"
                   value="<?=$id;?>"/>
        </form>
    </div>
<?php
require_once 'template/footer.php';
?>