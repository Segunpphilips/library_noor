
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Noor Takaful Insurance Limited</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='css/bootstrap.min.css' rel='stylesheet'>
        <link href='animate.css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

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
    height: 50vh
}

body{
 background-image: url("images/knowledges.jpg");
  height: 600px;
  background-repeat: no-repeat;
  background-attachment: scroll;
  background-size: cover;
}



.card:hover{
  transform: scale(1.1);
}


</style>

    </head>

    <body>
    <div class="container-fluid">
    <div>
      <div>
      <div>
          <nav class="navbar navbar-expand-lg navbar-light" style="background-color: white;">
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li>
                <a href="index.php"><img src="images/Logo2.PNG" class="img-fluid" alt="Sample image" style="margin-right:300px"></a>
              </li>
              <li class="nav-item active">
                <a type="button" class="btn btn-primary" class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
               </li>
               &nbsp;&nbsp;
                
              &nbsp;&nbsp;
            <li class="nav-item active">
              <a type="button" class="btn btn-primary" class="nav-link" href="contact.php">Submit a book <span class="sr-only">(current)</span></a>
            </li>
            </ul>
          </div>
          <div>
            <form class="form-inline my-2 my-lg-0">
            
            &nbsp;&nbsp;
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-light my-2 my-sm-0" type="submit" id="search">Search</button>
          </form>
      </div>
        </nav>
  </div>

&nbsp;&nbsp;
&nbsp;&nbsp;

<div>
 <strong><h1 class="animate__animated animate__rubberBand" style="color: blue;" align="center">WELCOME TO NOOR TAKAFUL LIBRARY!</h1></strong>
</div>

<div style="background-color: #2976DB">
  <h3 align="center" style="color:white"> Download your e-books here....</h3>
</div>

</div>

<!-- Closing of first div -->




 </form>

<div id="displaydata"></div>
<div>
  <h2 id="displaysucc"></h2>
</div>

</div>
<div id="displaydata"></div>
</div>

<!--Begining of book link Modal -->


<!-- End of Wellness modal -->

</div>

&nbsp;
&nbsp;
&nbsp;

<div style="margin-top: 150px;">


</div>

&nbsp;&nbsp;


<!-- back to top begining -->
<button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top">
  <i class="fas fa-arrow-up">Top</i>
</button>

<!-- Back to top button -->
<div class="container mt-4 text-center" style="height: 350px;">
</div>
<!-- Back to top button ends here -->

  <script type='text/javascript' src='js/jquery.min.js'></script>
  <script type='text/javascript' src='js/popper.min.js'></script>
  <script text='javascript' src='js/bootstrap.js'></script>
  <script src=js/jquery.min.js></script>
  <script type='text/javascript' src='js/popper.min.js'></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script type="text/javascript" language="javascript">

   
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
//End of back to top



$(document).ready(function(){
  $("#state").change(function(){
    //alert ("Here");
    var local =$(this).val();
    //alert(local);
    $.ajax({
      type: "POST",
      url: "lga.php",
      data:{state : local}
    }).done(function(data){
      $("#lga").html(data);
    });

  });

//end of Local Government search ajax function


});


$(document).ready(function(){
  $("#state").change(function(){
    //alert ("Here");
    var local =$(this).val();
    //alert(local);
    $.ajax({
      type: "POST",
      url: "lga.php",
      data:{state : local}
    }).done(function(data){
      $("#lga").html(data);
    });

  });


});


</script>

  <div style="padding:1px; background-color:#333745">
    <h6 align="center" style="color:white">&copy; 2022</h6>
  <h6 align="center" style="color:white">Developed by Noor Takaful ICT Dept.| 07036300546 </h6>
            <ul class="social-list">
              <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-facebook"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li><a  href="#"><i class="fa fa-facebook"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
              <li><a  href="#"><i class="fa fa-facebook"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
  </div>

</div>
</div>
</body>
</html>