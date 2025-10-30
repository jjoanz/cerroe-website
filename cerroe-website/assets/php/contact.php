<?php
/**
 * CERROE Global Export - Contact Form Handler
 * Procesa el formulario de contacto y envía emails
 */

// Configuración de cabeceras
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Solo aceptar solicitudes POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
    exit;
}

// Configuración del correo electrónico
$to = "info@cerroeglobal.com"; // Cambiar por el email real de CERROE
$subject_prefix = "Nuevo mensaje desde cerroeglobal.com - ";

// Función para limpiar datos
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Función para validar email
function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Obtener y limpiar datos del formulario
$nombre = isset($_POST['nombre']) ? clean_input($_POST['nombre']) : '';
$email = isset($_POST['email']) ? clean_input($_POST['email']) : '';
$telefono = isset($_POST['telefono']) ? clean_input($_POST['telefono']) : '';
$empresa = isset($_POST['empresa']) ? clean_input($_POST['empresa']) : '';
$asunto = isset($_POST['asunto']) ? clean_input($_POST['asunto']) : '';
$mensaje = isset($_POST['mensaje']) ? clean_input($_POST['mensaje']) : '';

// Array de errores
$errors = [];

// Validaciones
if (empty($nombre)) {
    $errors[] = "El nombre es requerido";
}

if (empty($email)) {
    $errors[] = "El email es requerido";
} elseif (!validate_email($email)) {
    $errors[] = "El email no es válido";
}

if (empty($asunto)) {
    $errors[] = "El asunto es requerido";
}

if (empty($mensaje)) {
    $errors[] = "El mensaje es requerido";
}

// Si hay errores, retornar
if (!empty($errors)) {
    echo json_encode([
        'success' => false,
        'message' => 'Por favor completa todos los campos requeridos',
        'errors' => $errors
    ]);
    exit;
}

// Construir el mensaje del email
$email_subject = $subject_prefix . $asunto;

$email_body = "
<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: #f9f9f9;
        }
        .header {
            background: #2F5755;
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .content {
            background: white;
            padding: 30px;
            border-radius: 0 0 10px 10px;
        }
        .field {
            margin-bottom: 20px;
            padding: 15px;
            background: #f5f5f5;
            border-radius: 5px;
        }
        .field-label {
            font-weight: bold;
            color: #2F5755;
            display: block;
            margin-bottom: 5px;
        }
        .field-value {
            color: #555;
        }
        .footer {
            text-align: center;
            padding: 20px;
            color: #777;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h1>Nuevo mensaje de contacto</h1>
            <p>CERROE Global Export</p>
        </div>
        <div class='content'>
            <div class='field'>
                <span class='field-label'>Nombre:</span>
                <span class='field-value'>$nombre</span>
            </div>
            
            <div class='field'>
                <span class='field-label'>Email:</span>
                <span class='field-value'>$email</span>
            </div>
            
            " . (!empty($telefono) ? "
            <div class='field'>
                <span class='field-label'>Teléfono:</span>
                <span class='field-value'>$telefono</span>
            </div>
            " : "") . "
            
            " . (!empty($empresa) ? "
            <div class='field'>
                <span class='field-label'>Empresa:</span>
                <span class='field-value'>$empresa</span>
            </div>
            " : "") . "
            
            <div class='field'>
                <span class='field-label'>Asunto:</span>
                <span class='field-value'>$asunto</span>
            </div>
            
            <div class='field'>
                <span class='field-label'>Mensaje:</span>
                <div class='field-value'>" . nl2br($mensaje) . "</div>
            </div>
        </div>
        <div class='footer'>
            <p>Este mensaje fue enviado desde el formulario de contacto de cerroeglobal.com</p>
            <p>Fecha: " . date('d/m/Y H:i:s') . "</p>
        </div>
    </div>
</body>
</html>
";

// Cabeceras del email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
$headers .= "From: CERROE Website <noreply@cerroeglobal.com>" . "\r\n";
$headers .= "Reply-To: $email" . "\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Intentar enviar el email
$mail_sent = @mail($to, $email_subject, $email_body, $headers);

if ($mail_sent) {
    // Email de confirmación al remitente
    $confirmation_subject = "Hemos recibido tu mensaje - CERROE Global Export";
    $confirmation_body = "
    <!DOCTYPE html>
    <html>
    <head>
        <style>
            body {
                font-family: 'Arial', sans-serif;
                line-height: 1.6;
                color: #333;
            }
            .container {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
            }
            .header {
                background: linear-gradient(135deg, #2F5755, #5A9690);
                color: white;
                padding: 40px;
                text-align: center;
                border-radius: 10px 10px 0 0;
            }
            .content {
                background: white;
                padding: 30px;
                border: 1px solid #e0e0e0;
                border-radius: 0 0 10px 10px;
            }
            .button {
                display: inline-block;
                padding: 15px 30px;
                background: #2F5755;
                color: white;
                text-decoration: none;
                border-radius: 25px;
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h1>¡Gracias por contactarnos!</h1>
            </div>
            <div class='content'>
                <p>Hola $nombre,</p>
                <p>Hemos recibido tu mensaje y queremos agradecerte por tu interés en CERROE Global Export.</p>
                <p>Nuestro equipo revisará tu consulta y te responderá lo antes posible.</p>
                <p><strong>Resumen de tu mensaje:</strong></p>
                <p><strong>Asunto:</strong> $asunto</p>
                <p><strong>Mensaje:</strong><br>" . nl2br($mensaje) . "</p>
                <hr style='margin: 30px 0; border: none; border-top: 1px solid #e0e0e0;'>
                <p><strong>Exportamos Confianza, Creamos Oportunidades</strong></p>
                <p style='color: #777; font-size: 14px;'>CERROE Global Export<br>República Dominicana<br>www.cerroeglobal.com</p>
            </div>
        </div>
    </body>
    </html>
    ";
    
    $confirmation_headers = "MIME-Version: 1.0" . "\r\n";
    $confirmation_headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
    $confirmation_headers .= "From: CERROE Global Export <noreply@cerroeglobal.com>" . "\r\n";
    
    @mail($email, $confirmation_subject, $confirmation_body, $confirmation_headers);
    
    // Guardar en base de datos (opcional)
    // save_to_database($nombre, $email, $telefono, $empresa, $asunto, $mensaje);
    
    // Respuesta exitosa
    echo json_encode([
        'success' => true,
        'message' => 'Mensaje enviado exitosamente'
    ]);
} else {
    // Error al enviar
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Error al enviar el mensaje. Por favor intenta nuevamente.'
    ]);
}

// Función opcional para guardar en base de datos
function save_to_database($nombre, $email, $telefono, $empresa, $asunto, $mensaje) {
    // Configuración de la base de datos
    $servername = "localhost";
    $username = "tu_usuario";
    $password = "tu_contraseña";
    $dbname = "cerroe_db";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "INSERT INTO contactos (nombre, email, telefono, empresa, asunto, mensaje, fecha)
                VALUES (:nombre, :email, :telefono, :empresa, :asunto, :mensaje, NOW())";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':empresa', $empresa);
        $stmt->bindParam(':asunto', $asunto);
        $stmt->bindParam(':mensaje', $mensaje);
        
        $stmt->execute();
        return true;
    } catch(PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return false;
    }
}
?>
