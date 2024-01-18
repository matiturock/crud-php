<?php include("db.php") ?>

<!DOCTYPE html>
<html lang="en">

<?php include("includes/head.php") ?>

<?php include("includes/navigation.php") ?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <div class="card card-body">
        <form action="save_task.php" method="POST">
          <div>
            <label for="" class="form-label fw-bold">Title</label>
            <input type="text" name="title" id="title" placeholder="Enter task title" class="form-control" autofocus>
          </div>
          <div class="mt-3">
            <label for="" class="form-label fw-bold">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Enter task description"></textarea>
          </div>
          <button type="submit" name="save_task" class="btn btn-primary mt-3 w-100">
            Guardar
          </button>
        </form>
      </div>

      <?php
      if ($_SESSION) {
        if ($_SESSION["message"]) {
          echo '<div class="alert alert-' . $_SESSION["message_color"] . ' mt-3 alert-dismissible fade show" role="alert"" role="alert">' . $_SESSION["message"] . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
          session_unset();
        }
      }

      ?>

    </div>
    <div class="col-md-8">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Created at</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "SELECT * FROM task";
          $restult_tasks = mysqli_query($connection, $query);
          while ($item = mysqli_fetch_array($restult_tasks)) {
            echo '<tr>';
            echo '<th scope="row">' . $item["id"] . '</th>';
            echo '<td>' . $item["title"] . '</td>';
            echo '<td>' . $item["description"] . '</td>';
            echo '<td>' . $item["created_at"] . '</td>';
            echo '<td> <a href="controller/edit-task.php?id=' . $item["id"] . '" class="btn btn-outline-info btn-sm">Edit</a> <a href="controller/delete-task.php?id=' . $item["id"] . '" class="btn btn-outline-danger btn-sm">Delete</a> </td>';
            echo '</tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include("includes/footer.php") ?>