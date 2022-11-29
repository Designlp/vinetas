<?php
$alert = '';
session_start();
if (!empty($_SESSION['active'])) {
  header('location: sistema/');
} else {
  if (!empty($_POST)) {
    if (empty($_POST['usuario']) || empty($_POST['clave'])) {
      $alert = '<div class="alert alert-danger" role="alert">
  Ingrese su usuario y su clave
</div>';
    } else {
      require_once "conexion.php";
      $user = mysqli_real_escape_string($conexion, $_POST['usuario']);
      $clave = md5(mysqli_real_escape_string($conexion, $_POST['clave']));
      $query = mysqli_query($conexion, "SELECT u.IDUsuario, u.Nombres, u.Apellidos, u.CorreoElectronico,r.IDRol,r.Rol 
      
      FROM usuario u INNER JOIN roles r ON u.IDRol = r.IDRol WHERE u.CorreoElectronico = '$user' AND u.Contrasena = '$clave'");
      mysqli_close($conexion);
      $resultado = mysqli_num_rows($query);
      if ($resultado > 0) {
        $dato = mysqli_fetch_array($query);
        $_SESSION['active'] = true;
        $_SESSION['IdUser'] = $dato['IDUsuario'];
        $_SESSION['Nombres'] = $dato['Nombres'];
        $_SESSION['Apellidos'] = $dato['Apellidos'];
        $_SESSION['Correo'] = $dato['CorreoElectronico'];


        $_SESSION['CarnetIdentidad'] = $dato['CarnetIdentidad'];
        $_SESSION['rol'] = $dato['IDRol'];
        $_SESSION['rol_name'] = $dato['Rol'];
        header('location: sistema/');
      } else {
        $alert = '<div class="alert alert-danger" role="alert">
              Usuario o Contraseña Incorrecta
            </div>';
        session_destroy();
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>INICIO Design</title>

  <!-- Custom fonts for this template-->
     <!--  <link href="sistema/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">-->
  <!-- Custom styles for this template-->
  <!-- <link href="sistema/css/sb-admin-2.min.css" rel="stylesheet">-->
  
  
      <style media="screen">
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;700&display=swap');

      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #310079;
    
    
}
.background{
           background: #F6F6F6;
    background-image: url("sistema/img/bg.jpg");
    width: 100%;
    height:100%;

  
      position: absolute;

background-position: center center;
  
   background-size:cover;
background-attachment: fixed;

     background-repeat: no-repeat;
       background-size: contain;


}

form{
    height: 580px;
    width: 400px;
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 25%;
    padding: 50px 35px;
    /* background: url("sistema/img/Ellipse.png") */
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
       font-family: 'Poppins',sans-serif;
 
     color: #080710;
    font-size: 20px;
    font-weight: 500;
    line-height: 22px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
color: #080710;
    background-color: #EAF0F7;
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
   color: #8d8aa8;
}
label{
    color: #080710;
    
}

button{
    margin-top: 25px;
    width: 100%;
    background: linear-gradient(90deg, #B224EF 0%, #7579FF 100%);
    border-radius: 15px;
    color: #f6f5ff;
    
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.social{
  margin-top: 30px;
  display: flex;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 179px;
height: 151px;
}
a:link {
  color: green;
  background-color: transparent;
  text-decoration: none;
}

a:visited {
  color: pink;
  background-color: transparent;
  text-decoration: none;
}

a:hover {
  color: red;
  background-color: transparent;
  text-decoration: underline;
}

a:active {
  color: yellow;
  background-color: transparent;
  text-decoration: underline;
}

    </style>
  
  
  

</head>
<body>
    <div class="background">
      
    </div>
      
    <form method="POST">
       <?php echo isset($alert) ? $alert : ""; ?>
       <h3></h3>
       </br>
        <img src="sistema/img/qwer.png"  width="150" height="160">
        <label for="username">Usuario</label>
        <input type="text" class="form-control" placeholder="Usuario" name="usuario">

        <label for="password">Contraseña</label>
        <input type="password" class="form-control" placeholder="Contraseña" name="clave">
 <a href="./restablecer.php">Olvidé mi contraseña</a> <br>
        <button type="submit" >Iniciar</button>
    
    </form>
</body>
</html>