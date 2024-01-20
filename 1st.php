<?php
$insert=false;
$update=false;
$delete=false;
  //Database connection
  $servername="localhost";
  $username = "root";
  $password ="";
  $database="notes";
  
  //Creat a connection
  $conn= mysqli_connect($servername, $username, $password, $database);
  if (!$conn) {
    die("Sorry we faield to connect".mysqli_connect_error());
  } 
    // ------------Delete----------------------
  if(isset($_GET['delete'])){
    $srno=$_GET['delete'];
    $delete=true;
    $sql = "DELETE FROM `notes` WHERE `srno` = $srno";
    $result = mysqli_query($conn, $sql);
  }
  //<<<<<-----------------Insertion of data------------------------------->>>>>
  if ($_SERVER['REQUEST_METHOD'] =="POST") {
     if (isset($_POST['snoEdit'])) {
      //update inotes here
      $sno=$_POST["snoEdit"];
      $title= $_POST["titleEdit"];
      $description= $_POST["descriptionEdit"];
      $sql = "UPDATE `notes` SET `title` = '$title' , `description` = '$description' WHERE `notes`.`srno` = $sno";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        $update=true;
        }
        else {
        echo "There is a error----->". mysqli_error($conn);
        }

     }
     else{
     $title= $_POST["title"];
     $description= $_POST["description"];
     $sql = "INSERT INTO `notes` ( `title`, `description`, `time`) VALUES ('$title', '$description', current_timestamp())";
     $result = mysqli_query($conn, $sql);
       if ($result) {
       $insert=true;
       }
       else {
       echo "There is a error----->". mysqli_error($conn);
       }
     }
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>GCOEY|iNotes</title>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <style>
     th {
    cursor: pointer;
}
    </style>
  </head>
  <body>
    <!-- Edit Modal modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">
Edit Modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit this iNote</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/crud/index.php?update=true" method="post">
          <input type="hidden" name="snoEdit" id="snoEdit">
          <div class="form-group">
            <label for="title">Note's Title</label>
            <input type="text" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
              <label for="description">Note's Description</label>
              <textarea class="form-control" id="descriptionEdit" name="descriptionEdit" rows="3"></textarea>
            </div>
            <hr>
            <button type="button" class="btn btn-secondary" data-dismiss="modal" color="red">Cancel</button>
          <button type="submit" class="btn btn-primary">Update iNote</button>
        </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
 
         
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <img src="/crud/logo1.png" alt="" id="logo" class="logo" >
        <a class="navbar-brand" href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GCOEY|iNotes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="/crud/index.php">iNotes<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">About<span class="sr-only">(current)</span></a>
              </li><li class="nav-item active">
                <a class="nav-link" href="#">Contact<span class="sr-only">(current)</span></a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
          </ul>

                               <!-------------- search button  ----------------->

          <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form> -->
        </div>
      </nav>
      <?php
        if ($insert) {
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert" bg="green">
          <strong>Successfull!</strong> Your iNote is inserted.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>'; 
        }
        if ($update) {
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert" bg="green">
          <strong>Successfull!</strong> Your iNote is updated!!.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>'; 
        }
        if ($delete) {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" bg="red">
          <strong>Deleted!</strong> Your iNote is delete.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>'; 
        }
        
      ?>
      <div class="container my-4">
        <h2>Creat your iNotes here.</h2>
        <form action="/crud/index.php" method="post">
            <div class="form-group">
              <label for="title">Note's Title</label>
              <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="description">Note's Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
              </div>
            <button type="submit" class="btn btn-primary">Add iNote</button>
          </form>
      </div>
      <div class="container my-4">
      <table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">Sr. No</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php
          $sql = "SELECT * FROM `notes`"; 
          $result= mysqli_query($conn, $sql);
          $sno=0;
          while ($row = mysqli_fetch_assoc($result)) {
            $sno=$sno+1;
            echo " <tr>
            <th scope='row'>".$sno."</th>
            <td>".$row['title']."</td>
            <td>".$row['description']."</td>
            <td><button class='edit btn btn-sm btn-primary' id=".$row['srno'].">Edit</button> &nbsp; <button class='delete btn btn-sm btn-danger dlt' id= d".$row['srno'].">Delete</button></td>
          </tr> ";
          }
        ?> 
  </tbody>
</table>
  <hr>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready( function () {
      $('#myTable').DataTable();
      } );
    </script>
      <script>
              // -----------------Edit Script------------------
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element)=>{
          element.addEventListener("click",(e)=>{
             console.log("edit", );
             tr = e.target.parentNode.parentNode;
             title= tr.getElementsByTagName("td")[0].innerText ;
             description= tr.getElementsByTagName("td")[1].innerText ;
             console.log(title, description);
             titleEdit.value = title;
             descriptionEdit.value = description;
             snoEdit.value=e.target.id;
             console.log(e.target.id)
             $('#editModal').modal('toggle')
          })
        })
              // -----------------Delete Script-----------------
        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element)=>{
          element.addEventListener("click",(e)=>{
             console.log("edit", );
             srno = e.target.id.substr(1,);
             if(confirm("Do you want to delete?")){
              console.log("Yes");
              window.location=`/crud/index.php?delete=${srno}`;
              //Create a form use post request to submit a form
             }
              else{
              console.log("No");
             }
            
          })
        })
        </script>
  </body>
</html>