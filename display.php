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
        <td>

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