<br>


<div style="margin-left:150px; margin-top: 30px";>
<div class="btn-group">
       
              </div>
</div>


<div class="card-deck" style="padding: 10px; margin-top: 20px";>
  

&nbsp;&nbsp;


<!-- back to top begining -->
<button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top">
  <i class="fas fa-arrow-up">Top</i>
</button>

<!-- Back to top button -->
<div class="container mt-4 text-center" style="height: 50px;">
</div>
<!-- Back to top button ends here -->


  <script src=js/jquery.min.js></script>
  <script type='text/javascript' src='js/popper.min.js'></script>
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
    
// end of back to top



</script>

  <div style="padding:1px; background-color:#333745" class="container-fluid" >
    <h6 align="center" style="color:white">&copy; 2021</h6>
  <h6 align="center" style="color:white">Developed by Segun Philips | segunphilips1@gmail.com | 07036300546 </h6>
  </div>

</div>

</div>
<!-- body closing div -->

</body>
</html>