<img id="spin-image" src="your-image-url.jpg" alt="Your image description">
<style>
    .image-spin {
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

</style>
<script>
    var spinImage = document.getElementById("spin-image");

spinImage.addEventListener("click", function() {
  spinImage.classList.add("image-spin");
  
  setTimeout(function() {
    spinImage.classList.remove("image-spin");
  }, 2000);
});

</script>