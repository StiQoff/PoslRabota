<?php
$pacMap = new patientmap();
$pac = $pacMap->findById($id);
?>
<div class="form-group">
    <label>Фамилия</label>
    <input type="text" class="form-control"
           name="lastname" value="<?=$pac->lastname;?>">
</div>
<div class="form-group">
    <label>Имя</label>
    <input type="text" class="form-control"
           name="firstname" value="<?=$pac->firstname;?>">
</div>
<div class="form-group">
    <label>Отчество</label>
    <input type="text" class="form-control"
           name="patronomic" value="<?=$pac->patronomic;?>">
</div>
<div class="form-group">
    <label>Возраст</label>
    <input type="text" class="form-control"
           name="age" value="<?=$pac->age;?>">
</div>
<div class="form-group">
    <label>Вес</label>
    <input type="text" class="form-control"
           name="weight" value="<?=$pac->weight;?>">
</div>
<div class="form-group">
    <label>Рост</label>
    <input type="text" class="form-control"
           name="height" value="<?=$pac->height;?>">
</div>
<div class="form-group">
    <label>Пол</label>
    <select class="form-control" name="gender_id">
        <?= Helper::printSelectOptions($pac->gender_id, $pacMap->arrGenders());?>
    </select>
</div>
<div class="form-group">
    <label>Цвет волос</label>
    <select class="form-control" name="hair_color_id">
        <?= Helper::printSelectOptions($pac->hair_color_id, $pacMap->arrHair());?>
    </select>
</div>
<div class="form-group">
    <label>Приметы</label>
    <input type="text" class="form-control"
           name="primeti" value="<?=$pac->primeti;?>">
</div>
<input type="hidden" name="patient_id" value="<?=$id;?>"/>