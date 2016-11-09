
  <?php
         //CREATING THE CONNECTION
         $connection = new mysqli("localhost", "root", "", "libreria");
         //TESTING IF THE CONNECTION WAS RIGHT
         if ($connection->connect_errno) {
             printf("Connection failed: %s\n", $mysqli->connect_error);
             exit();
         }
         
         ?>