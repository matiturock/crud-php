<?php

include("../db.php");

$id;
$title;
$description;

if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $query = "SELECT * FROM task WHERE id=$id";
  $result = mysqli_query($connection, $query);

  if (mysqli_num_rows($result) == 1) {
    $data = mysqli_fetch_array($result);
    $title = $data["title"];
    $description = $data["description"];
  } else {
    die("Error al editar la tarea");
  }
}

include("../includes/head.php");
include("../includes/navigation.php");
?>


<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
        <form action="update-task.php?id=<?php echo $id ?>" method="POST">
          <div>
            <label for="" class="form-label fw-bold">Title</label>
            <input type="text" name="title" id="title" value="<?php echo $title ?>" class="form-control" autofocus>
          </div>
          <div class="mt-3">
            <label for="" class="form-label fw-bold">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control"><?php echo $description ?></textarea>
          </div>
          <button type="submit" name="update" class="btn btn-info mt-3 w-100">
            Actualizar
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include("../includes/head.php") ?>