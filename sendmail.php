<?php
$msg_box = ""; // � ���� ���������� ����� ������� ��������� �����

if($_POST['btn_submit']){
$errors = array(); // ��������� ��� ������
// ��������� ������������ �����
if($_POST['user_name'] == "") $errors[] = "���� '���� ���' �� ���������!";
if($_POST['user_email'] == "") $errors[] = "���� '��� e-mail' �� ���������!";
if($_POST['text_comment'] == "") $errors[] = "���� '����� ���������' �� ���������!";

// ���� ����� ��� ������
if(empty($errors)){
// �������� ������ �� �����
$message = "��� ������������: " . $_POST['user_name'] . "<br/>";
$message .= "E-mail ������������: " . $_POST['user_email'] . "<br/>";
$message .= "����� ������: " . $_POST['text_comment'];
send_mail($message); // �������� ������
// ������� ��������� �� ������
$msg_box = "<span style='color: green;'>��������� ������� ����������!</span>";
}else{
// ���� ���� ������, �� ������� ��
$msg_box = "";
foreach($errors as $one_error){
$msg_box .= "<span style='color: red;'>$one_error</span><br/>";
}
}
}
// ������� �������� ������
function send_mail($message){
// �����, �� ������� ������ ������
$mail_to = "altt@inbox.ru";
// ���� ������
$subject = "������ � �������� �����";

// ��������� ������
$headers= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n"; // ��������� ������
$headers .= "From: �������� ������ <info@al-pr.ru>\r\n"; // �� ���� ������

// ���������� ������
mail($mail_to, $subject, $message, $headers);
}
?>