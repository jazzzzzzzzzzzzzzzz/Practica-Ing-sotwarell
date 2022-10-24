<?php
include 'connect.php';
if(isset($_POST['submit'])){

    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];

    $sql="insert into `crud` (name,email,mobile,password)
    values('$name','$email','$mobile','$password')";
    $result=mysqli_query($con,$sql);

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






</body>

</html>