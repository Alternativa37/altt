<?php
$msg_box = ""; // в этой переменной будем хранить сообщения формы

if($_POST['btn_submit']){
$errors = array(); // контейнер для ошибок
// проверяем корректность полей
if($_POST['user_name'] == "") $errors[] = "Поле 'Ваше имя' не заполнено!";
if($_POST['user_email'] == "") $errors[] = "Поле 'Ваш e-mail' не заполнено!";
if($_POST['text_comment'] == "") $errors[] = "Поле 'Текст сообщения' не заполнено!";

// если форма без ошибок
if(empty($errors)){
// собираем данные из формы
$message = "Имя пользователя: " . $_POST['user_name'] . "<br/>";
$message .= "E-mail пользователя: " . $_POST['user_email'] . "<br/>";
$message .= "Текст письма: " . $_POST['text_comment'];
send_mail($message); // отправим письмо
// выведем сообщение об успехе
$msg_box = "<span style='color: green;'>Сообщение успешно отправлено!</span>";
}else{
// если были ошибки, то выводим их
$msg_box = "";
foreach($errors as $one_error){
$msg_box .= "<span style='color: red;'>$one_error</span><br/>";
}
}
}
// функция отправки письма
function send_mail($message){
// почта, на которую придет письмо
$mail_to = "altt@inbox.ru";
// тема письма
$subject = "Письмо с обратной связи";

// заголовок письма
$headers= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n"; // кодировка письма
$headers .= "From: Тестовое письмо <info@al-pr.ru>\r\n"; // от кого письмо

// отправляем письмо
mail($mail_to, $subject, $message, $headers);
}
?>