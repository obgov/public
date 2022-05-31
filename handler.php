<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['res'])) {
    // Удаляем текущие данные
    $db->query("TRUNCATE `sort_text`");

    $allData = explode(PHP_EOL, trim($_POST['res']));

    // Вносим новые данные
    foreach ($allData as $line) {
        $insert = $db->prepare("INSERT INTO sort_text (text) values (:text)");
        $insert->execute(['text' => $line]);
    }
    echo 'Данные обновлены';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
    /* Блок кода обновления настроек */
    // Количество имеющихся кнопок
    $getNumButtons = $db->query("SELECT COUNT(*) as cnt FROM buttons")->fetch();

    // Удаляем текущие данные настроек
    $db->query("TRUNCATE `settings`");

    $message = filter_var(trim($_POST['message']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    /*
     * По умолчанию форма передает пустые значения в input названия кнопок, в которых не введены данные
     * Соответственно для ускорения цикла эти значения удаляются из POST данных
     */
    $_POST = array_diff($_POST, array(''));

    // Массив для хранения выбранных кнопок
    $checkedButtons = [];

    // Массив для хранения кнопок, для которых установлено новое название
    $editedButtons = [];

    /*
     * Перебор массива POST
     * Если пользователь заполнил наименование кнопки, но не активировал чекбокс, то новое название кнопки не попадет в массив для добавления в БД
     * В Массиве editedButtons ключ - номер кнопки (соответствует buttonId в БД); значение - новое имя кнопки
     */
    for ($i = 0; $i <= $getNumButtons['cnt']; $i++) {
        if (isset($_POST["status_batton$i"])) {
            $checkedButtons[] = "$i";
            if (isset($_POST["name_batton$i"])) {
                $editedButtons["$i"] = $_POST["name_batton$i"];
            }
        }
    }

    $insertData = $db->prepare("INSERT INTO settings (description, activeButtons) VALUES (:desc, :activeButtons)");
    $insertData->execute(['desc' => $message, 'activeButtons' => implode(',', $checkedButtons)]);
    echo 'Настройки обновлены' . '<br>';

    /* Блок кода обновления наименований кнопок */
    if (!empty($editedButtons)) {
        foreach ($editedButtons as $buttonNumber => $buttonName) {
            $update = $db->prepare("UPDATE buttons SET buttonName = :buttonName WHERE buttonId = :buttonNumber");
            $update->execute(['buttonName' => $buttonName, 'buttonNumber' => $buttonNumber]);
        }
        echo 'Наименование кнопок установлено';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btId']) && isset($_POST['formId'])){
    /*
     * Регулярное выражение оставляет только цифры в строках
     * buttonId соответствует номеру кнопки в БД и устанавливает такой же статус у строки из sort_text (как и требуется по ТЗ)
     */
    $formId = preg_replace('/[^0-9]/', '', $_POST['formId']);
    $btId = preg_replace('/[^0-9]/', '', $_POST['btId']);

    $update = $db->prepare("UPDATE sort_text SET status = :id WHERE id = :formId");
    $update->execute(['id' => intval($btId), 'formId' => intval($formId)]);
}