<?php

include("db.php");

if (isset($_POST["save_task"])) {
  $title = $_POST["title"];
  $description = $_POST["description"];

  $quey = "INSERT INTO task(title, description) VALUES('$title', '$description')";
  $result_mode = mysqli_query($connection, $quey);

  if ($result_mode) {
    echo "Saving";
    header("Location: index.php");
  } else {
    die("Consulta pal choto");
  }

  $_SESSION["message"] = "Task saved successfully";
  $_SESSION["message_color"] = "success";
}
