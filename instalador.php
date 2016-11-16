<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  </head>
  <body style="background-color:#58D3F7">
    <div style="width:1000px;margin: 0 auto;margin-top:41px;">
      <div>
          <h1 style="margin-left:25px;margin-bottom:25px;color:white";>Libreria: Instalador Web</h1>
    <div class='form-group col-lg-5'>
            <form action="" method="post">

    					<div class="form-group">
                <input type="text" name="dbuser" class="form-control input-lg " placeholder="Usuario" required>		</div>
    				</div>
    				<div class="form-group col-lg-5">
    					<div class="form-group">
                    <input type="password" name="dbpass" class="form-control input-lg" placeholder="Contraseña">
    					</div>
    				</div>
            <div class="form-group col-lg-5">
    					<div class="form-group">
                  <input type="text" name="dbhost" class="form-control input-lg" placeholder="Host de la BD" required>
                </div>
    				</div>

            <div class="form-group col-lg-5">
              <div class="form-group">
                  <input type="text" name="dbase" class="form-control input-lg" placeholder="Nombre de la BD" required>
                </div>
            </div>
            <div class="form-group col-lg-5">
              <div class="form-group">
                <p style="font-size:20px;margin-top:10px;color:white">Contenido de la Base de Datos:</p>
              </div>
            </div>
            <div class="form-group col-lg-5">
              <div class="form-group">
            <select class="form-control input-lg" name="contenido" required>
              <option class="form-control input-lg" value="completa">Base de datos y contenido</option>
              <option class="form-control input-lg" value="no_completa">Solo Base de datos</option>
            </select>
              </div>
            </div>
            <div class="form-group col-lg-5">
            <div class="form-group">
            <input style="background-color:white;color:#0C5484" type="submit" value="Instalar" class="btn btn-primary pull-left">
            </div>
            </div>
            </div>
          </div>
          </div>

        </form>
        
              <?php
          if(isset($_POST["dbuser"])){
              $db_user=$_POST["dbuser"];
               $db_password=$_POST["dbpass"];
              $db_name=$_POST["dbase"];
              $db_host=$_POST["dbhost"];
              $connection = new mysqli($db_host,$db_user,$db_password,$db_name);
                 //TESTING IF THE CONNECTION WAS RIGHT
              if ($connection->connect_errno) {
                   printf("Connection failed: %s\n", $connection->connect_error);
                   exit();
              }else{
                include("./database.php");
                $file = fopen("./db_var.php", "a");
                fwrite($file, "<?php"."\n");
                fwrite($file, "$"."database="."'".$db_name."';"."\n");
                fwrite($file, "$"."user="."'".$db_user."';"."\n");
                fwrite($file, "$"."password="."'".$db_password."';"."\n");
                fwrite($file, "$"."host="."'".$db_host."';"."\n");
                fwrite($file, "?>"."\n");
                fclose($file);
                unlink('instalacion.php');
                 unlink('database.php');
                 header('Location:./index.php/');
               }
              }
        ?>
    </div>
  </body>
</html>
