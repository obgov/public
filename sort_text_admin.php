<?php
require_once 'db.php';

// Количество записей в таблице sort_text
$getNumText = $db->query("SELECT COUNT(`text`) as cnt FROM `sort_text`")->fetch();

$emptyText = $getNumText['cnt'] === '0' ? "Колонка text пуста. Добавьте необходимые строки, каждая с новой строки." : 'В колонке text ' . $getNumText['cnt'] . ' строк';

$getAllText = $db->query("SELECT `text` FROM `sort_text`");

// Данные для заполнения раздела результатов
$getText1 = $db->query("SELECT `text` FROM `sort_text` WHERE status = 1");
$getText2 = $db->query("SELECT `text` FROM `sort_text` WHERE status = 2");
$getText3 = $db->query("SELECT `text` FROM `sort_text` WHERE status = 3");
$getText4 = $db->query("SELECT `text` FROM `sort_text` WHERE status = 4");
$getText5 = $db->query("SELECT `text` FROM `sort_text` WHERE status = 5");
$getText6 = $db->query("SELECT `text` FROM `sort_text` WHERE status = 6");
$getText7 = $db->query("SELECT `text` FROM `sort_text` WHERE status = 7");
$getText8 = $db->query("SELECT `text` FROM `sort_text` WHERE status = 8");

// Наименования кнопок для заполнения input'ов
$getBt1 = $db->query("SELECT buttonName as name FROM buttons WHERE buttonId = 1")->fetch();
$getBt2 = $db->query("SELECT buttonName as name FROM buttons WHERE buttonId = 2")->fetch();
$getBt3 = $db->query("SELECT buttonName as name FROM buttons WHERE buttonId = 3")->fetch();
$getBt4 = $db->query("SELECT buttonName as name FROM buttons WHERE buttonId = 4")->fetch();
$getBt5 = $db->query("SELECT buttonName as name FROM buttons WHERE buttonId = 5")->fetch();
$getBt6 = $db->query("SELECT buttonName as name FROM buttons WHERE buttonId = 6")->fetch();
$getBt7 = $db->query("SELECT buttonName as name FROM buttons WHERE buttonId = 7")->fetch();
$getBt8 = $db->query("SELECT buttonName as name FROM buttons WHERE buttonId = 8")->fetch();

// Описание для заполнения input'а
$getDsc = $db->query("SELECT description as dsc FROM settings")->fetch();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title> Админка </title>
    <meta charset="utf-8">
</head>
<body>
<main>
    <h3>Работа с данными в БД</h3>
    <div id="checkEmpty"><?=$emptyText ?></div>
    <form action="sort_text_admin.php" method="post" id="textForm">
<textarea style="width: 100%;" id="" cols="60" name="res" rows="8">
<?php
while ($row = $getAllText->fetch()) {
    echo $row['text'] . PHP_EOL;
}
?>
</textarea>
        <button class="" type="submit">Сохранить данные в колонку text</button>
    </form>
    <div id="resultTextForm"></div>
    <br>
    <div style="">Введите описание задания</div>
    <form action="sort_text_admin.php" method="post" id="save">
    <textarea onclick="" style="width: 100%;" id="" cols="60" name="message"
              rows="8" required><?php if (!empty($getDsc['dsc'])) {
            echo $getDsc['dsc'];
        } else {
            echo 'Введите описание задания';
        } ?></textarea>

    <h4>Выберите кнопки которые будут выводиться при выполнении задания</h4>
        <div>
            <div>
                <label><input class="" type="checkbox" id="myCheck1" name="status_batton1">Кнопка1</label>
            </div>
            <div id="text1" style="display:none">
                <small>Название кнопки1</small>
                <br>
                <input style="" name="name_batton1" type="text" value="<?php if (!empty($getBt1['name'])) {
                    echo $getBt1['name'];
                }?>">
            </div>
        </div>
        <br>
        <div>
            <div>
                <label><input class="" type="checkbox" id="myCheck2" name="status_batton2">Кнопка2</label>
            </div>
            <div id="text2" style="display:none">
                <small>Название кнопки2</small>
                <br>
                <input style="" name="name_batton2" type="text" value="<?php if (!empty($getBt2['name'])) {
                    echo $getBt2['name'];
                } ?>">
            </div>
        </div>
        <br>
        <div>
            <div>
                <label><input class="" type="checkbox" id="myCheck3" name="status_batton3">Кнопка3</label>
            </div>
            <div id="text3" style="display:none">
                <small>Название кнопки3</small>
                <br>
                <input style="" name="name_batton3" type="text" value="<?php if (!empty($getBt3['name'])) {
                    echo $getBt3['name'];
                }?>">
            </div>
        </div>
        <br>
        <div>
            <div>
                <label><input class="" type="checkbox" id="myCheck4" name="status_batton4">Кнопка4</label>
            </div>
            <div id="text4" style="display:none">
                <small>Название кнопки4</small>
                <br>
                <input style="" name="name_batton4" type="text" value="<?php if (!empty($getBt4['name'])) {
                    echo $getBt4['name'];
                }?>">
            </div>
        </div>
        <br>
        <div>
            <div>
                <label><input class="" type="checkbox" id="myCheck5" name="status_batton5">Кнопка5</label>
            </div>
            <div id="text5" style="display:none">
                <small>Название кнопки5</small>
                <br>
                <input style="" name="name_batton5" type="text" value="<?php if (!empty($getBt5['name'])) {
                    echo $getBt5['name'];
                }?>">
            </div>
        </div>
        <br>
        <div>
            <div>
                <label><input class="" type="checkbox" id="myCheck6" name="status_batton6">Кнопка6</label>
            </div>
            <div id="text6" style="display:none">
                <small>Название кнопки6</small>
                <br>
                <input style="" name="name_batton6" type="text" value="<?php if (!empty($getBt6['name'])) {
                    echo $getBt6['name'];
                }?>">
            </div>
        </div>
        <br>
        <div>
            <div>
                <label><input class="" type="checkbox" id="myCheck7" name="status_batton7">Кнопка7</label>
            </div>
            <div id="text7" style="display:none">
                <small>Название кнопки7</small>
                <br>
                <input style="" name="name_batton7" type="text" value="<?php if (!empty($getBt7['name'])) {
                    echo $getBt7['name'];
                }?>">
            </div>
        </div>
        <br>
        <div>
            <div>
                <label><input class="" type="checkbox" id="myCheck8" name="status_batton8">Кнопка8</label>
            </div>
            <div id="text8" style="display:none">
                <small>Название кнопки8</small>
                <br>
                <input style="" name="name_batton8" type="text" value="<?php if (!empty($getBt8['name'])) {
                    echo $getBt8['name'];
                }?>">
            </div>
        </div>
        <br>
        <div><input class="" value="Сохранить настройки" type="submit" name="saveSettings"></div>
    </form>
    <br>
    <div id="result"></div>
    <h3>Результаты выполненного задания</h3>
    <div>
        <details><summary>Показать Результаты</summary>
            <div>
                <div>Все строки со статусом 1</div>
                <textarea class="" name="" id="" rows="7" style="width:88%; height:auto;"><?php while($row = $getText1->fetch()) echo $row['text'] . PHP_EOL; ?></textarea>
            </div>
            <br>
            <div>
                <div>Все строки со статусом 2</div>
                <textarea class="" name="" id="" rows="7" style="width:88%; height:auto;"><?php while($row = $getText2->fetch()) echo $row['text'] . PHP_EOL; ?></textarea>
            </div>
            <br>
            <div>
                <div>Все строки со статусом 3</div>
                <textarea class="" name="" id="" rows="7" style="width:88%; height:auto;"><?php while($row = $getText3->fetch()) echo $row['text'] . PHP_EOL; ?></textarea>
            </div>
            <br>
            <div>
                <div>Все строки со статусом 4</div>
                <textarea class="" name="" id="" rows="7" style="width:88%; height:auto;"><?php while($row = $getText4->fetch()) echo $row['text'] . PHP_EOL; ?></textarea>
            </div>
            <br>
            <div>
                <div>Все строки со статусом 5</div>
                <textarea class="" name="" id="" rows="7" style="width:88%; height:auto;"><?php while($row = $getText5->fetch()) echo $row['text'] . PHP_EOL;?></textarea>
            </div>
            <br>
            <div>
                <div>Все строки со статусом 6</div>
                <textarea class="" name="" id="" rows="7" style="width:88%; height:auto;"><?php while($row = $getText6->fetch()) echo $row['text'] . PHP_EOL; ?></textarea>
            </div>
            <br>
            <div>
                <div>Все строки со статусом 7</div>
                <textarea class="" name="" id="" rows="7" style="width:88%; height:auto;"><?php while($row = $getText7->fetch()) echo $row['text'] . PHP_EOL; ?></textarea>
            </div>
            <br>
            <div>
                <div>Все строки со статусом 8</div>
                <textarea class="" name="" id="" rows="7" style="width:88%; height:auto;"><?php while($row = $getText8->fetch()) echo $row['text'] . PHP_EOL; ?></textarea>
            </div>
        </details>
    </div>
</main>
<script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
<script>
    $('#myCheck1').on('click', function() {
        if ($('#myCheck1').is(':checked')){
            $('#text1').removeAttr('style');
        } else {
            $('#text1').attr('style', 'display:none');
        }
    });
    $('#myCheck2').on('click', function() {
        if ($('#myCheck2').is(':checked')){
            $('#text2').removeAttr('style');
        } else {
            $('#text2').attr('style', 'display:none');
        }
    });
    $('#myCheck3').on('click', function() {
        if ($('#myCheck3').is(':checked')){
            $('#text3').removeAttr('style');
        } else {
            $('#text3').attr('style', 'display:none');
        }
    });
    $('#myCheck4').on('click', function() {
        if ($('#myCheck4').is(':checked')){
            $('#text4').removeAttr('style');
        } else {
            $('#text4').attr('style', 'display:none');
        }
    });
    $('#myCheck5').on('click', function() {
        if ($('#myCheck5').is(':checked')){
            $('#text5').removeAttr('style');
        } else {
            $('#text5').attr('style', 'display:none');
        }
    });
    $('#myCheck6').on('click', function() {
        if ($('#myCheck6').is(':checked')){
            $('#text6').removeAttr('style');
        } else {
            $('#text6').attr('style', 'display:none');
        }
    });
    $('#myCheck7').on('click', function() {
        if ($('#myCheck7').is(':checked')){
            $('#text7').removeAttr('style');
        } else {
            $('#text7').attr('style', 'display:none');
        }
    });
    $('#myCheck8').on('click', function() {
        if ($('#myCheck8').is(':checked')){
            $('#text8').removeAttr('style');
        } else {
            $('#text8').attr('style', 'display:none');
        }
    });
    $("#save").on("submit", function(e){
        e.preventDefault();
        $.ajax({
            url: 'handler.php',
            method: 'post',
            dataType: 'html',
            data: $(this).serialize(),
            success: function(data){
                $('#result').html(data);
            }
        });
    });
    $("#textForm").on("submit", function(e){
        e.preventDefault();
        $.ajax({
            url: 'handler.php',
            method: 'post',
            dataType: 'html',
            data: $(this).serialize(),
            success: function(data){
                $('#resultTextForm').html(data);
            }
        });
    });
</script>
</body>
</html>