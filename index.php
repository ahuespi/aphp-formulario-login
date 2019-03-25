<?php

require 'User.php';
require 'Request.php';
require 'ValidatorInterface.php';
require "ValidationRuleInterface.php";
require 'IsNotEmptyRule.php';
require 'IsEmailRule.php';
require 'IsSecuredPassword.php';
require 'Validator.php';
require 'UserValidator.php';

$user = new User();
$request = new Request();
$rule = new IsNotEmptyRule();
$email = new IsEmailRule();
$password = new IsSecuredPassword();


// SETEOS
$user
    ->setEmail($request->get('email'))
    ->setPassword($request->get('password'));        

    if($request->get('remember','bool')) {
        $user->remember();
    } 

    
$validator = new UserValidator($user, $user->getValidationRule());
$validator->validate();

// MENSAJES


echo 'El email del usuario es: ' . $user->getEmail() . "\n";
echo 'El password del usuario es: ' . $user->getPassword() . "\n" ;
echo 'El usuario quiere ser recordado? -  ' . $res = ($user->isRemembered()) ? 'SI' : 'NO' . "\n";
echo "\n";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input value="<?= $user->getEmail() ?? ''?>" name="email"     type="text" placeholder="Email" ><br><br>
        <input value="<?= $user->getPassword() ?? ''?>" name="password"  type="text" placeholder="Password" ><br><br>
        <input name="remember"  type="checkbox" > Recordarme en este equipo<br><br>
        <button>Log IN</button>

        <?php 
            foreach ($validator->getErrors() as $error) {
                echo '<h1>'.$error.'</h1>';
            }
        ?>
    </form>
</body>

<!-- VARIABLES SUPER GLOBALEs
$_POST / $_GET / $_REQUEST / $_FILE  DATOS QUE ESCRIBE O PROVEE EL USUARIO
$_SESSION / ----- datos que ESCRIBE EL SCRIPT para mantener informacion
$_SERVER --- DATOS QUE ESCRIBE PHP ACERCA DE LA COMUNICACION con el cliente -->
</html>









