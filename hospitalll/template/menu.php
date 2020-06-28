<?php function createLink($href, $icon, $text) {
    $is_active = $_SERVER['PHP_SELF'] === '/' . $href;
    $class_name = $is_active ? 'active' : '';

    print("
        <li class='$class_name'>
            <a href='$href'>
                <i class='fa $icon'></i>
                <span>$text</span>
            </a>
        </li>
    ");
} ?>
<!-- Sidebar Menu -->
<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Справочники</li>
            <?php
            createLink("list_card.php", "fa-users", "Карты пациентов");
            createLink("list-patient.php", "fa-users", "Пациенты");
            ?>
            <?php createLink("list-prichina.php", "fa-users", "Причины"); ?>
            <li class="header">Запросы по заданию</li>
            <?php createLink("list-patient3.php", "fa-users", "Запрос №1"); ?>
            <?php createLink("list-patient1.php", "fa-users", "Запрос №2"); ?>
            <?php createLink("list-patient2.php", "fa-users", "Запрос №3"); ?>
            

        </ul>
    </section>
</aside>
<!-- /.sidebar-menu -->