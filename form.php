<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
       <title>Noor Takaful Library</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="site.webmanifest">
        <link rel="apple-touch-icon" href="icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link href='assets/css/bootstrap.min.css' rel='stylesheet'>
        <link href='assets/css/animate.css'>
        <link href='assets/css/dropzone.css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">



  <style>

        #btn-back-to-top {
        position: fixed;
        bottom: 20px;
        right: 20px;
        display: none
      }


    * {
    margin: 0;
    padding: 0;
    list-style: none;
    text-decoration: none;
    box-sizing: border-box
    }

body {
    font-family: 'sans-serif';
    background-position: center;
    background-size: cover;
    height: 150vh
}

body{
 background-image: url("assets/images/Library.jpg");
  height: 100px;
  background-repeat: no-repeat;
  background-attachment: scroll;
  background-size: cover;
}

.container{
   background-image: url("assets/images/LibraryQuote.jpg");
  height: 50px;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}


</style>

    </head>

    <body>
    <div class="container-fluid">
      <div>
      <div>
          <nav class="navbar navbar-expand-lg navbar-light" style="background-color: white;">
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li>
                <a href="index.php"><img src="assets/images/Logo2.png" class="img-fluid" alt="Sample image" style="margin-right:400px"></a>
              </li>
              <li class="nav-item active">
                <a type="button" class="btn btn-primary" class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
               </li>
               &nbsp;&nbsp;
                <li class="nav-item active">
                
            </li>
              &nbsp;&nbsp;
            <li class="nav-item active">
            
            </li>
            </ul>
          </div>
          <div>
      </div>
        </nav>
  </div>

&nbsp;&nbsp;
&nbsp;&nbsp;

<div>
 <h1 class="animate__animated animate__rubberBand" style="color: white;" align="center">"A big head with an empty brain is like a big load to the neck."</h1>
</div>
<div style="background-color: blue">
  <h3 align="center" style="color:white">Submit a book below</h3>
</div>
<?php
  if (isset($_GET['upload_error'])) {

    $upload_error = $_GET['upload_error']; 
    $upload_errors = unserialize(urldecode($upload_error));

    echo "<div class='alert alert-danger mt-3'><ul style='list-style-type: circle;'>";
    foreach ($upload_errors as $upload_error) {
      echo "<li>".$upload_error."</li>";
    }
    echo "</ul></div>";
  }
  if (isset($_GET['msg'])) {
     
    echo $_GET['msg'];
  }
?>
</div>
<br>
<form action="process.php" method="post" enctype="multipart/form-data">
  <b><label style="color:white" for="book_name">Book Name</label></b>
<input type="text" id="book_name" name="book_name" value="<?php (isset($_POST['book_name'])) ? $_POST['book_name'] : ''; ?>" class="form-control" placeholder="Noor Takaful Guideline"> <br>

<b><label style="color:white" for="user_email">Personel Email</label></b>
<input type="email" id="user_email"  name="user_email" value="<?php (isset($_POST['user_email'])) ? $_POST['user_email'] : ''; ?>" class="form-control" placeholder="info@noortakaful.com"> <br>

<b><label style="color:white" for="book_department">Book department</label></b>
<select  name="book_department" id="book_department" class="form-control" placeholder=""> 
  <option value="">Select Book Department</option>
  <option value="1">Legal</option>
  <option value="2">General Takaful</option>
  <option value="3">Family Takaful</option>
  <option value="4">Marketing</option>
  <option value="5">Finance/Account</option>
  <option value="6">Administrative</option>
  <option value="7">Information Technology</option>
  <option value="8">General Knowledge</option>
</select><br>

<b style="color:white"><label  for="book_pdf">Upload Book Pdf </label> (<small>Drag and drop files here too</small>)</b>
<input type="file" id="book_pdf" name="book_pdf" class="form-control dropzone" style="height: 80px;"> <br>


<div>
      <b><label style="color:white" for="book_description">Book Description</label></b>
      <textarea cols="50" rows="10" id="book_description" name="book_description" class="form-control" name="text" placeholder="Enter Some Message about the book"></textarea>
</div>

<div class="form-group-checkbox" >
    <label>
      <input type="checkbox" name="tnc" id="tnc" />
      I  agree to the terms and service agreement
    </label>
  </div>

<input type="submit" class="btn btn-primary" id="submit" name="submit" value="Submit">

</form>






<div style="margin-left:500px">
  <i class="fas fa-phone-square-alt" style="color:blue"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span>+234-703-630-0546<span> <br>

  <i class="fas fa-envelope-open-text" style="color:blue"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span>ict@noortakaful.ng<span> <br>

  <i class="fas fa-map-marker-alt" style="color:blue"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span>170, Gbagada Expressway, Lagos<span> <br>
   
</div>

<!-- Closing of first div -->

<div style="margin-left:150px; margin-top: 30px";>
<div class="btn-group">
       
              </div>
</div>


<div class="card-deck" style="padding: 10px; margin-top: 20px";>
  

&nbsp;&nbsp;


<!-- back to top begining -->
<button type="button" class="btn btn-floating btn-lg" style="background-color: rgb(3, 72, 139); color: white;" id="btn-back-to-top">
  <i class="fas fa-arrow-up"></i> Top
</button>

<!-- Back to top button -->
<div class="container mt-4 text-center" style="height: 200px;">
</div>
<!-- Back to top button ends here -->


  <script src=assets/js/jquery.min.js></script>
  <script type='text/javascript' src='assets/js/popper.min.js'></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/dropzone.js"></script>
  <script type="text/javascript" language="javascript">
    // Dropzones    
    Dropzone.discover();

    //Get the button
let mybutton = document.getElementById("btn-back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 20 ||
    document.documentElement.scrollTop > 20
  ) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
    

// Contact us form
$(document).ready(function(){
    $('#showTextBtn').click(function(){
      var uservar=$('#name').val();
      if (uservar.trim() == '') {
        alert('Enter Name')
        return false;
        // return false here means it will not run the code below but one after the other
        // the trim on the if state will help you trim emoty input like a user pressing spacebar
      }
      var email=$('#email').val();
      if (email.trim()== '') {
        alert('enter email')
        return false;
      }
      var msgs=$('#messages').val();
      if (msgs.trim()== '') {
        alert('Type in your messages')
        return false;
      }

      $("#name").val("")
      $('#email').val('')
      $('#messages').val('')
      $("#showTextBtn").text("Thank you.").css({'background-color':'green'});
      // this will clear the username and password field after user have succesffully logged in
    });

  })
    $('#tnc').click(function(){
      var CheckedorNot=$('#tnc').prop('checked');
      if(CheckedorNot == true){
        $('#showTextBtn').removeAttr('disabled');
      }else{
      $('#showTextBtn').attr('disabled',true);
    }
  })


</script>

  <div style="padding:1px; background-color:#333745" class="container-fluid">
    <h6 align="center" style="color:white">&copy; <?= date('Y')?></h6>
  <h6 align="center" style="color:white">Developed Noor Takaful ICT Dept. | 07036300546 </h6>
  </div>

</div>

</div>
</body>
</html>