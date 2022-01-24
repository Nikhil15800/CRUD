<?php require"db_connect.php" ?>


<!doctype html >
  <html lang="en">
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

          <!-- Bootstrap CSS -->
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">


              <title>iNotes - Notes taking made easy</title>
            </head>
            <body>




              <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#">iNotes </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">About</a>
                    </li>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Contect Us</a>
                  </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
              </div>
            </nav>

            <?php
            if($insert){
              echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
              <strong>Success!</strong> You note has been submitted.
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>";
        }
      ?>
            <div class="container my-4">
              <h2>Add Notes</h2>
              <form action="/crud/index.php" method='post'>
                <div class="form-group">
                  <label for="title">Note Title</label>
                  <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Title">

                    <div class="form-group">
                      <label for="description">Note Description</label>
                      <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Note</button>
                  </form>
                </div>

                <div class="container">


                  <table class="table" id="myTable">
                    <thead>
                      <tr>
                        <th scope="col">S.no</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions </th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      $sql = "SELECT * FROM `notes`";
                      $result = mysqli_query($conn,$sql);
                      $sno = 0;
                      while($row = mysqli_fetch_assoc($result)){
                        $sno = $sno + 1;?>
                      <tr>
                        <th scope='row'><?php echo $sno ?> </th>
                        <td><?php echo $row['title'] ?></td>
                        <td><?php echo $row['description'] ?></td>
                        <td>
                          <button type="button" class="btn btn-info btn-sm"><a href="edit.php?id=<?php echo $row['sno']; ?>"> Edit </a></button>
                          <a href="delete.php?id=<?php echo $row['sno']; ?>">Delete</a>
                        </td>
                      </tr>

                      <?php }
        ?>

                    </tbody>
                  </table>
                </div>
                <!-- Optional JavaScript -->
                <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
                <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
                <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
                <script>
                  $(document).ready( function () {
                    $('#myTable').DataTable();
      } );
                </script>
              </body>
            </html>