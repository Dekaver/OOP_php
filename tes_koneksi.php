<?php
          $mysqli = new mysqli("localhost", "root", "", "database");

          /* check connection */
          if (mysqli_connect_errno()) {
              printf("Connect failed: %s\n", mysqli_connect_error());
              exit();
          }else{
	      printf("success.....!");
	  }
?>