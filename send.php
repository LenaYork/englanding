$dt = date('Y-m-d H:i:s');
$name = trim($_POST['userName']);
$email = trim($_POST ['userEmail']);
$message = trim($_POST ['userMessage']);

mail ('lenayork@tut.by', 'Новая заявка', "$dt $name $email $message" );