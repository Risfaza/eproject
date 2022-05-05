<?php
 
if($_POST) {
    $nombre = "";
    $email="";
    $telefono="";
    $mensaje="";
     
   if(isset($_POST['nombre'])) {
        $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    }
    
    if(isset($_POST['email'])) {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    }
    
    if(isset($_POST['telefono'])) {
        $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
    }
    
    if(isset($_POST['mensaje'])) {
        $mensaje = filter_var($_POST['mensaje'], FILTER_SANITIZE_STRING);
    }
 
 
    $recipient = "me@felipemeza.dev";
     
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $email . "\r\n";
 
    $email_content = "<html><body>";
    $email_content .= "<table style='font-family: Arial;'><tbody><tr><td style='background: #eee; padding: 10px;'>Nombre</td><td style='background: #fda; padding: 10px;'> $nombre</td></tr>";
    $email_content .= "<tr><td style='background: #eee; padding: 10px;'>Correo</td><td style='background: #fda; padding: 10px;'> $email</td></tr>";
    $email_content .= "<tr><td style='background: #eee; padding: 10px;'>Telefono</td><td style='background: #fda; padding: 10px;'>$telefono</td></tr></tbody></table>";
 
    $email_content .= "<p style='font-family: Arial; font-size: 1.25rem;'><strong>Mensaje de $nombre &mdash;</strong><i> $mensaje</i>.</p>";
    $email_content .= '</body></html>';
 
    echo $email_content;
     
    if(mail($recipient, "Envio de Formulario de Contacto", $email_content, $headers)) {
        //echo '<p>Gracias por ponerte en contacto con nosotros.</p>';
        header('Location: index.html');
    } else {
        echo '<p>El correo no se pudo enviar.</p>';
    }
     
} else {
    echo '<p>Algo ha pasado</p>';
}
 
?>