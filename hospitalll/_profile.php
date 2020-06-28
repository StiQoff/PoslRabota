<?php
$pac = (new patientmap())->findProfileById($id);
if ($pac) {
    ?>
    <tr>
        <th>Ф.И.О.</th>
        <td><?=$pac->fio;?></td>
    </tr>
    <tr>
        <th>Пол</th>
        <td><?=$pac->gender;?></td>
    </tr>
    <tr>
        <th>Возраст</th>
        <td><?=$pac->age;?></td>
    </tr>
    <tr>
        <th>Рост</th>
        <td><?=$pac->height;?></td>
    </tr>
    <tr>
        <th>Вес</th>
        <td><?=$pac->weight;?></td>
    </tr>
    <tr>
        <th>Приметы</th>
        <td><?=$pac->primeti;?></td>
    </tr>
    <tr>
        <th>Цвет волос</th>
        <td><?=$pac->hair;?></td>
    </tr>

<?php } ?>