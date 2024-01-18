<?php
// to sabe the sessoin, dado que el protocolo HTTP es stateless
$is_start_session = session_start();
if ($is_start_session) {
  echo "Session start";
}

// to save the connection to db
$connection = new mysqli("localhost", "root", "", "task_crud");

if (isset($connection)) {
  echo "DB connected";
}
