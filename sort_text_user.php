<?php
require_once 'db.php';

// Получение активных кнопок
$getBt = $db->query("SELECT activeButtons FROM settings")->fetch();
$getBt = explode(',', $getBt['activeButtons']);

// Генерация переменных для вывода названия кнопок
for ($i = 1; $i <= count($getBt); $i++) {
    if ($res = $db->query("SELECT buttonName as name FROM buttons WHERE buttonId = '$i'")->fetch()) {
        ${"getBt$i"} = $res['name'];
    }
}

// Текст со статусом 0 для вывода последовательно в цикле
$getText = $db->query("SELECT `text` FROM `sort_text` WHERE status = 0");

// Описание задания
$getDsc = $db->query("SELECT description as dsc FROM settings")->fetch();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title> Отправка </title>
    <meta charset="utf-8">
</head>
<body>
<main>
    <div>
        <div>
            <details>
                <summary>Читать задание</summary>
                <p><strong><?php if (!empty($getDsc['dsc'])) {echo nl2br($getDsc['dsc']);} ?></strong></p>
            </details>
        </div>
        <?php
        $i = 0; while($row = $getText->fetch()) {
        $i++;
        echo '<div id="DivForm' . $i . '" style="display:none">';
        echo '<form method="post" action="handler.php" id="form' . $i . '">';
        echo '<p>' . $row['text'] . '</p>';
        if (isset($getBt1)) {
            echo '<button type="button" onclick="submitForm'.$i.'(this.id)" id="status_batton1">'.$getBt1.'</button><br><br>';
        }
        if (isset($getBt2)) {
            echo '<button type="button" onclick="submitForm'.$i.'(this.id)" id="status_batton2">'.$getBt2.'</button><br><br>';
        }
        if (isset($getBt3)) {
            echo '<button type="button" onclick="submitForm'.$i.'(this.id)" id="status_batton3">'.$getBt3.'</button><br><br>';
        }
        if (isset($getBt4)) {
            echo '<button type="button" onclick="submitForm'.$i.'(this.id)" id="status_batton4">'.$getBt4.'</button><br><br>';
        }
        if (isset($getBt5)) {
            echo '<button type="button" onclick="submitForm'.$i.'(this.id)" id="status_batton5">'.$getBt5.'</button><br><br>';
        }
        if (isset($getBt6)) {
            echo '<button type="button" onclick="submitForm'.$i.'(this.id)" id="status_batton6">'.$getBt6.'</button><br><br>';
        }
        if (isset($getBt7)) {
            echo '<button type="button" onclick="submitForm'.$i.'(this.id)" id="status_batton7">'.$getBt7.'</button><br><br>';
        }
        if (isset($getBt8)) {
            echo '<button type="button" onclick="submitForm'.$i.'(this.id)" id="status_batton8">'.$getBt8.'</button><br><br>';
        }
        echo '</div></form>';
        }
        ?>
        </div>
        <div id="emptyText"></div>
</main>
<script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        if($('#DivForm1').length == 0){
            $('#emptyText').text('Строк нет!');
        } else {
            $('#DivForm1').removeAttr('style');
        }
    });
    function submitForm1(value){
        let data = {'btId': value, 'formId': $('#form1').attr('id')};
        $.ajax({
            type : 'POST',
            url  : 'handler.php',
            data : data,
            success :  function(data){
                $('#DivForm1').attr('style', 'display:none');
                if($('#DivForm2').length == 0){
                    $('#emptyText').text('Больше строк нет!');
                } else {
                    $('#DivForm2').removeAttr('style');
                }
            }
        });
    }
    function submitForm2(value){
        let data = {'btId': value, 'formId': $('#form2').attr('id')};
        $.ajax({
            type : 'POST',
            url  : 'handler.php',
            data : data,
            success :  function(data){
                $('#DivForm2').attr('style', 'display:none');
                if($('#DivForm3').length == 0){
                    $('#emptyText').text('Больше строк нет!');
                } else {
                    $('#DivForm3').removeAttr('style');
                }
            }
        });
    }
    function submitForm3(value){
        let data = {'btId': value, 'formId': $('#form3').attr('id')};
        $.ajax({
            type : 'POST',
            url  : 'handler.php',
            data : data,
            success :  function(data){
                $('#DivForm3').attr('style', 'display:none');
                if($('#DivForm4').length == 0){
                    $('#emptyText').text('Больше строк нет!');
                } else {
                    $('#DivForm4').removeAttr('style');
                }
            }
        });
    }
    function submitForm4(value){
        let data = {'btId': value, 'formId': $('#form4').attr('id')};
        $.ajax({
            type : 'POST',
            url  : 'handler.php',
            data : data,
            success :  function(data){
                $('#DivForm4').attr('style', 'display:none');
                if($('#DivForm5').length == 0){
                    $('#emptyText').text('Больше строк нет!');
                } else {
                    $('#DivForm5').removeAttr('style');
                }
            }
        });
    }
    function submitForm5(value){
        let data = {'btId': value, 'formId': $('#form5').attr('id')};
        $.ajax({
            type : 'POST',
            url  : 'handler.php',
            data : data,
            success :  function(data){
                $('#DivForm5').attr('style', 'display:none');
                if($('#DivForm6').length == 0){
                    $('#emptyText').text('Больше строк нет!');
                } else {
                    $('#DivForm6').removeAttr('style');
                }
            }
        });
    }
    function submitForm6(value){
        let data = {'btId': value, 'formId': $('#form6').attr('id')};
        $.ajax({
            type : 'POST',
            url  : 'handler.php',
            data : data,
            success :  function(data){
                $('#DivForm6').attr('style', 'display:none');
                if($('#DivForm7').length == 0){
                    $('#emptyText').text('Больше строк нет!');
                } else {
                    $('#DivForm7').removeAttr('style');
                }
            }
        });
    }
    function submitForm7(value){
        let data = {'btId': value, 'formId': $('#form7').attr('id')};
        $.ajax({
            type : 'POST',
            url  : 'handler.php',
            data : data,
            success :  function(data){
                $('#DivForm7').attr('style', 'display:none');
                if($('#DivForm8').length == 0){
                    $('#emptyText').text('Больше строк нет!');
                } else {
                    $('#DivForm8').removeAttr('style');
                }
            }
        });
    }
    function submitForm8(value){
        let data = {'btId': value, 'formId': $('#form8').attr('id')};
        $.ajax({
            type : 'POST',
            url  : 'handler.php',
            data : data,
            success :  function(data){
                $('#DivForm8').attr('style', 'display:none');
                $('#emptyText').text('Больше строк нет!');
            }
        });
    }
</script>
</body>
</html>