<?php
include_once 'includes/user.php';
include_once 'includes/user_session.php';


$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    //echo "hay sesion";
    $user->setUser($userSession->getCurrentUser());
    include_once 'vistas/user.php';

}else if(isset($_POST['username']) && isset($_POST['password'])){
    
    $userForm = $_POST['username'];
    $passForm = $_POST['password'];

    $user = new User();
    if($user->userExists($userForm, $passForm)){
        //echo "Existe el usuario";
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);

        if($userForm =="admin"){
            include_once 'vistas/user_admin.php';

        }
        else{
            include_once 'vistas/user.php';

        }

    }else{
        //echo "No existe el usuario";
        $errorLogin = "Nombre de usuario y/o password incorrecto";
        include_once 'vistas/login.php'; //incluimos la variable en el archivo login que se encuentra en la carpeta vistas
    
    }
}else{
    //echo "login";
    include_once 'vistas/login.php';
}



?>