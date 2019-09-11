<?php
  session_start(); //inicializa
  session_unset(); //limpa
  session_destroy(); //destroi
  header("Location: ../view/login.php");
?>
