<style>
   #overlay {
   position: fixed;
   top: 0;
   left: 0;
   right: 0;
   bottom: 0;
   background-color: rgba(0, 0, 0, 0.5);
   z-index: 999999;
   display: flex;
   justify-content: center;
   align-items: center;
   }
   #loader {
   border: 0px solid white;
   border-top:2px solid red;
   border-right:2px solid red;
   border-bottom:2px solid red;
   border-radius: 50%;
   width: 30px;
   height: 30px;
   animation: spin 2s linear infinite;
   z-index: 999999;
   }
   @keyframes spin {
   0% { transform: rotate(0deg); }
   100% { transform: rotate(360deg); }
   }
   #content {
   /* Your content styles go here */
   display: none;
   }
</style>
<div id="overlay">
   <div id="loader"></div>
</div>
<script>
   window.addEventListener("load", function() {
   var overlay = document.getElementById("overlay");
   var content = document.getElementById("content");
   
   overlay.style.display = "flex";
   
   setTimeout(function() {
   overlay.style.display = "none";
   content.style.display = "block";
   }, 1000);
   });
   
</script>