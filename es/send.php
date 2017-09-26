<?php
require 'build/PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$project = $_POST['project'];
$start = $_POST['start'];
$budget = $_POST['budget'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

if($project == 1){
	$project = 'App móvil';
}else if($project == 2){
	$project = 'App o plataforma web';
}else if($project == 3){
	$project = 'Diseño de interfáz';
}else if($project == 4){
	$project = 'Desarrollo web';
}else{
	$project = 'No estoy seguro';
}

if($start == 1){
	$start = '3 a 4 semanas';
}else if($start == 2){
	$start = '2 a 3 meses';
}else{
	$start = 'No tengo una fecha programada';
}
//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.humaind.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'contacto@humaind.com';                 // SMTP username
$mail->Password = 'Carmensalinas1';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('contacto@humaind.com', 'Humaind - Contacto');
//$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
$mail->addAddress('raulgrafico@gmail.com');             // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
$mail->addCC('fernanda.andrade90@gmail.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Humaind - Contacto';
$mail->Body    = "<table>
<thead>
<tr>
<td colspan='3'>Contacto</td>
</tr>
</thead>
<tbody>
<tr>
<td>Nombre: </td>
<td>&nbsp;&nbsp;</td>
<td>".$name."</td>
</tr>
<tr>
<td>Tel&eacute;fono: </td>
<td>&nbsp;&nbsp;</td>
<td>".$phone."</td>
</tr>
<tr>
<td>E-mail: </td>
<td>&nbsp;&nbsp;</td>
<td>".$email."</td>
</tr>
<tr>
<td>Proyecto: </td>
<td>&nbsp;&nbsp;</td>
<td>".$project."</td>
</tr>
<tr>
<td>Inicio: </td>
<td>&nbsp;&nbsp;</td>
<td>".$start."</td>
</tr>
<tr>
<td>Presupuesto: </td>
<td>&nbsp;&nbsp;</td>
<td>".$budget."</td>
</tr>
</tbody>
</table>";


$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
	echo 0;
    return json_encode(array("success" => true));
} else {
	echo 1;
    return json_encode(array("success" => false));
}