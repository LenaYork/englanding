<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
    <link rel="stylesheet" href="./form.css">
</head>
<body>
    <?php

        ini_set('log_errors', 'On');
        ini_set('error_log', '/var/log/php_errors.log');
            
        if (count($_POST) > 0 ) {
            $msg  = 'Ваше сообщение отправлено.';
            $showForm = false;
            
            $dt = date('Y-m-d H:i:s');
            $name = trim($_POST['userName']);
            $email = trim($_POST ['userEmail']);
            $message = trim($_POST ['userMessage']);
            
            
            file_put_contents('app.txt', "$dt $name $email $message\n"  , FILE_APPEND); 
            //создает файл в localhost, в который выводит значения переменных при каждом вводе

        
            mail ('lenayork@tut.by', 'Новая заявка', "$dt $name $email $message" );

            mail ($email, 'IGOTITEnglish', 
                "Hey there, $name !\n
                Ваше сообщение было доставлено админу.\n
                Как только оно будет прочтено, вы получите ответ \n
                Best regards, \n
                IGOTITEnglish" );

                $str = "$dt \t $name \t $email \t $message \n";

                file_put_contents('studentslist.xls', iconv('utf-8', 'windows-1251', $str) , FILE_APPEND);
            

            file_put_contents('studentslist.xlsx', iconv('utf-8', 'windows-1251', $str) , FILE_APPEND);
        
        } else {$msg = 'Заполните все поля';
            $showForm = true;}
	?>
				
	<?php if ($showForm) { ?>

    <form action="" id="form" method="post">
        <label for="userName">Ваше имя</label>
        <input type="text" placeholder="Введите ваше имя" id="userName" name="userName" class="_req">
        <label for="userEmail">Ваш email</label>
        <input type="text" placeholder="Введите ваш email" id="userEmail" name="userEmail" class="_req">
        <label for="userMessage">Ваше сообщение</label>
        <textarea type="text" placeholder="Введите ваше сообщение" id="userMessage" name="userMessage" class="_req"></textarea>
        <button type="submit" id="sendButton">Отправить</button>
    </form>

    <?php } ?>
    <?php 
					echo $msg;
				?>

                
    <!-- <script src="./form.js"></script> -->
    
</body>
</html>