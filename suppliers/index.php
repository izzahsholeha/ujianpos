
<?php
$submodule = $_GET['s'] ?? 'read';

switch ($submodule) {
    case 'read':
    default:
        include __DIR__ . "/read/index.php";
        break;

    case 'add':
        include __DIR__ . "/add.php";
        break;

    case 'save':
        include __DIR__ . "/save.php";
        break;

    case 'edit':
        include __DIR__ . "/edit.php";
        break;

    case 'update':
        include __DIR__ . "/update.php";
        break;

    case 'delete':
        include __DIR__ . "/delete.php";
        break;
}
