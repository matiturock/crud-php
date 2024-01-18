<?php

include("../db.php");

if (isset($_POST["update"])) {
  $id = $_GET["id"];
  $title = $_POST["title"];
  $description = $_POST["description"];

  $query = "UPDATE task SET title='$title', description='$description' WHERE id='$id'";
  $result = mysqli_query($connection, $query);

  if ($result) {
    $_SESSION["message"] = "Tarea actualziada";
    $_SESSION["message_color"] = "success";
    header("Location: ../index.php");
  } else {
    die("Error al actualizar tarea");
  }
}
