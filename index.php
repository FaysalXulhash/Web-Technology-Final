<link rel="stylesheet" type="text/css" href="css/slider.css">
<?php include 'menu.php'; ?>
<!--start-->
<div class="col-md-12">
  <div class="slideshow">

<div class="mySlides">
 <img src="img/Nstu.jpg" style="width:100%;height:500px"> 
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
<br>
 

<div style="margin-left: 530px"> <a href="register.php"> <input type="button" value="Registration" style="width: 160px;height: 50px;background-color: #078700;color: white;border-radius: 5px;font-weight: bold" ></a></div>



</div>
<!--end-->

