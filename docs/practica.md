<!--PRACTICA 1 --Jazmin Lucero Quispe Ledezma

¿Qué es una to-do list? Una lista de tareas pendientes, comúnmente conocida como to-do list, es una lista de lo que tienes pendiente por hacer. Contiene, básicamente, cualquier actividad que debes realizar, pero tener la lista por escrito no significa necesariamente que sea útil.

En este proyecto de todolist se aperturo varios proyectos que están entrelazados entre si como es el caso de user.php, display.php, connect.php, update, delete.

En el proyecto de user.php están las clases, importaciones y el formulario a usar de boostrap, también se insertaron datos de la base de datos en ese archivo para su correcta ejecucion.
tenemos la coexion con el proyecto de connect.php para indicarnos si se pudieron insertar los datos a la base de datos de phpmyadmin.-->


<?php
include 'connect.php';
if(isset($_POST['submit'])){

    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];

<!--esta la insercion de datos de cada uno de los campos-->

    $sql="insert into `crud` (name,email,mobile,password)
    values('$name','$email','$mobile','$password')";
    $result=mysqli_query($con,$sql);

<!--aca se tiene una condicion para ayudarnos asaber si se pudo ingresar los datos y al avez si fueron guardados 
correctamente en la base de datos.-->

    if($result){
        echo "Datos insertados con éxito";
    }else{
        die(mysqli_error($con));
    }
}
?>

<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- se hizo uso de boostrap en cuanto a sus estilos de formulario para pueda tener una mejor apariencia -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css">

    <title>login</title>
</head>

<body>
    <style>
    body{
       background-color:#FFA833;
    }
    </style>   
    </body>
    <!--creacion de clases para el formulario -->
    <div class="container">
        <form method="post">
            <center>
            <!--ingreso del nombre del usuario-->
                <div class="form-group">
                   <strong> <label>Nombre</label> </strong>
                  <input type="text" class="form-control" 
                  placeholder="Ingrese su nombre" 
                  name="name" autocomplete="off">
                </div>
<!-- ingreso de correo-->
                <div class="form-group">
                <strong><label>Correo</label> </strong>
                    <input type="email" class="form-control" 
                    placeholder="Ingrese su email" 
                    name="email" autocomplete="off">
                </div>

<!-- ingreso de numero telefonico-->
                <div class="form-group">
                <strong><label>Telefono</label></strong>
                    <input type="text" class="form-control" 
                    placeholder="Ingrese su numero de telefono" 
                    name="mobile" autocomplete="off">
                </div>
<!--Ingreso de contraseña-->
                <div class="form-group">
                <strong><label> Contraseña</label></strong>
                    <input type="text" class="form-control" 
                    placeholder="Ingrese su contraseña" 
                    name="password" autocomplete="off">
                </div>
<!--boton para poder ingresar los datos-->
                <button type="submit" class="btn btn-primary" name="submit">Ingresar</button>

        </form>
    </div>
    </center>

</body>

</html>


<!-- Creación de un proyecto como connect.php para comprobar la conexión del visual con el phpmyadmin con un mensaje error en caso no se realice bien-->

<?php
$con=new mysqli('localhost','root','','crudoperation');

if(!$con){
    die(mysqli_error($con));

}
?>
 
 <!-- Instalacion de XAMPP para poder crear una base de datos con mysql y apache para el adecuado funcionamiento de proyecto. Una vez instalo correctamente se hicieron las siguientes funciones .
 Creación de una nueva base de datos en phpmyAdmin con el nombre de crudoperacion y una tabla crud con el ingreso de id , name, email, mobile, passord, con sus ingresos de variables y definición de su primary key.-->


<!--Se conecto a la base de datos desde el archivo display.
Se copiaron los datos de user.php a display.php ya que son los mismos datos que se necesitan.
Creación de botones para borrar y actualizar datos relacionados con id(primary key).-->


<!-- Se incluye la coneccion de connect,php-->
 <?php
include 'connect.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, 
    initial-scale=1.0">
    <title>crud operacion</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css">
</head>
<body>
    <div class="container">
        <button class="btn btn-primary my-5"> <a href="user.php"
        class="text-light">Agregar usuario</a>
        </button>
<!--campos de la tabla que se vera -->
        <table class="table">
  <thead>
    <tr>
      <th scope="col">SI no</th>
      <th scope="col">Nombre</th>
      <th scope="col">Correo</th>
      <th scope="col">Telefono</th>
      <th scope="col">Contraseña</th>
      <th scope="col">Operacion</th>
    </tr>
  </thead>
  <tbody>

<!--son funciones para que se pueda evidenciar los diferentes ingresos o modificaciones ,eliminaciones que se hara-->
  <?php 

$sql="Select * from `crud`";
$result=mysqli_query($con,$sql);
if($result){
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $name=$row['name'];
        $email=$row['email'];
        $mobile=$row['mobile'];
        $password=$row['password'];
        echo '<tr>
        <th scope="row">'.$id.'</th>
        <td>'.$name.'</td>
        <td>'.$email.'</td>
        <td>'.$mobile.'</td>
        <td>'.$password.'</td>
        <td><>
<!--acciones para que los botones puedan eliminar u actualizar datos -->
  <button class="btn btn-primary"><a href="update.php?
  updateid='.$id.'"class="text-light">Actualizar</a></
  button>
  <button class="btn btn-danger"><a href="delete.php?
  deleteid='.$id.'"class="text-light">Eliminar</a></
  button>
  </td>
        </tr>';

    }
}

  ?>
 
  </tbody>
</table>
    </div>
</body>
</html>
 <!--CREAR ARCHIVO delete.php - conectarse al BOTÓN ELIMINAR EN EL ARCHIVO display.php-->
 <!--Creacion del archivo delete.php donde contiene la consulta de eliminación para el botón que esta en el proyecto de display.php-->

 <!--connecion con la base de datos y eliminacion de los datos en funcion a display.php ya que ahi estan los datos a eliminar-->
 <?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="delete from `crud` where id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        //echo "Deleted successfull";
        header('location:display.php');
    }else{
        die(mysqli_error($con));
    }

}
?> 




<?php
include 'connect.php';
$id=$_GET['updateid'];
$sql="select * from `crud` where id=$id";
$result=mysqli_query($con,$sql);

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];

    $sql="update `crud` set id=$id,name='$name',
    email='$email',mobile='$mobile',password='$password'
    where id=$id";
    $result=mysqli_query($con,$sql);

    if($result){
        echo "updated succesfuuly";
        //header('location:display.php');
    }else{
        die(mysqli_error($con));
    }
}
?>
<!--CREAR CÓDIGO PARA EL ARCHIVO update.php PARA EJECUTAR LA OPERACIÓN DE ACTUALIZACIÓN-->

<!-- creacion del update viene a ser practicamente el mismo codigo de user.php ya que actualizara todos los datos que se quieran modificar-->



<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css">

    <title>login</title>
</head>

<body>
    <style>
    body{
       background-color:#FFA833;
    }
    </style>   
    </body>
    <div class="container">
        <form method="post">
            <center>
                <div class="form-group">
                   <strong> <label>Nombre</label> </strong>
                  <input type="text" class="form-control" 
                  placeholder="Ingrese su nombre" 
                  name="name" autocomplete="off">
                </div>

                <div class="form-group">
                <strong><label>Correo</label> </strong>
                    <input type="email" class="form-control" 
                    placeholder="Ingrese su email" 
                    name="email" autocomplete="off">
                </div>


                <div class="form-group">
                <strong><label>Telefono</label></strong>
                    <input type="text" class="form-control" 
                    placeholder="Ingrese su numero de telefono" 
                    name="mobile" autocomplete="off">
                </div>

                <div class="form-group">
                <strong><label> Contraseña</label></strong>
                    <input type="text" class="form-control" 
                    placeholder="Ingrese su contraseña" 
                    name="password" autocomplete="off">
                </div>

                <button type="submit" class="btn btn-primary" name="submit">Ingresar</button>

        </form>
    </div>
    </center>

