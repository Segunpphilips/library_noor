<?php

include_once "classes.php";

    $book_department = $_GET['dept_id'];

    //create Books instance
    $obj = new Books;
    
    $books = $obj->getdepartmentalBooks($book_department);
    $department = $obj->getBookDepartment($book_department);


    // echo "<pre>";
    // var_dump($department);
    // echo "</pre>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Noor Takaful Insurance Limited</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='assets/css/bootstrap.min.css' rel='stylesheet'>
    <link href='assets/css/animate.css'>
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <style>
        body{
            height: 100%;
        }
        #body-div{
        background-image: url("assets/images/library1.jpg");
          height: 300px;
          background-repeat: no-repeat;
          background-attachment: scroll;
          background-size: cover;
          position: relative;
        }
        .fullScreen {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
      <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand" href="index.php"><img src="assets/images/Logo2.PNG" class="img-fluid" alt="noor takaful logo"></a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse align-items-center" id="collapsibleNavId">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link btn btn-primary text-light" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ml-md-4">
              <a class="nav-link btn btn-primary text-light" href="form.php">Submit a book</a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="container-fluid text-center mb-md-5"  id="body-div">
        <div class="row" style="height: auto; position: absolute; top: 45%; left: 28%; margin: 0; -ms-transform: translateY(-50%); transform: translateY(-50%) !important;">
            <div class="col justify-content-center">
                <h1 class="text-light text-center">Welcome to <?php if($department["department_name"] == 'General Knowledge'){ echo $department["department_name"]." Section"; }else{ echo $department["department_name"].' Department Library';} ?> </h1>
            </div>
        </div>
      </div>
      <div class="row mt-4" style="min-height: 35rem;">
        <?php
        if (is_array($books)) {
          $kounter = 0;
          foreach ($books as $book) {
            ++$kounter;
        ?>
          <div class="col-md-3 col-sm-12 mt-2 mb-2">
            <div style="min-height: 20rem;">
              <div class="card" style="width: 18rem;">
                <img src="assets/images/library3.jpg" class="card-img-top" height="200px" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?=$book['book_name']?></h5>
                  <p class="card-text">A library of books to fufil the needs of employees. Noor Takaful your win-win Insurance platform</p>
                  <div class="row">
                    <div class="col"><form action=""><a class="btn btn-info" href="assets/book_upload/<?=$book['book_pdf']?>" download>Download</a></form></div>
                    <div class="col"><a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#viewBook<?=$kounter?>">View</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- View Book Modal -->
        <div class="modal fade" id="viewBook<?=$kounter?>" tabindex="-1" aria-labelledby="staticBackdropLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?=$book['book_name']?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" style="height: 80vh;">
                <iframe src="assets/book_upload/<?=$book['book_pdf']?>" id="iframe" frameborder="0" width="100%" height="620px" allowfullscreen></iframe>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="fullscreen">View Fullscreen</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <?php
             }
          }else{
            echo $books;
          }
        ?>
      </div>
      <footer class="row">
        <div class="align-item col" style="padding:1px; background-color:#333745" >
          <h6 class="text-center" style="color:white">&copy; <?=date('Y')?></h6>
          <h6 class="text-center" style="color:white">Developed by Noor Takaful ICT Dept. | 07036300546 </h6>
        </div>
      </footer>
    </div>

    <script src=assets/js/jquery.min.js></script>
    <script type='text/javascript' src='assets/js/popper.min.js'></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="">
        $('#fullscreen').click(function(){
            $('#viewBook').addClass("fullScreen")
        })
    </script>
</body>
</html>