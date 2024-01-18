<?php

include("../db.php");

if ($_GET["id"]) {
  $id = $_GET["id"];
  $query = "DELETE FROM task WHERE id=$id";
  $result = mysqli_query($connection, $query);

  if ($result) {
    $_SESSION["message"] = "La tarea ha sido eliminada con exito";
    $_SESSION["message_color"]  = "warning";
    header("Location: ../index.php");
  } else {
    die("Falta error cuando se trata de eliminar una tarea");
  }
}
