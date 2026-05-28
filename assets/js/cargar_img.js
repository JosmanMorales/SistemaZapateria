function cambiar(){
    var pdrs = document.getElementById('file-upload1').files[0].name;
    document.getElementById('info1').innerHTML = pdrs;
}
function cambio(){
    var input = document.querySelector(".informacion1 #file-upload1"),
    img = document.querySelector(".informacion1 .img1");
  
  input.addEventListener("change", function(){
    var file = this.files[0],
        reader = new FileReader();
          
    reader.addEventListener("load", function(e){
      if (img.style.opacity == 0){
        img.src = e.target.result;
      img.style.opacity = 1;
        }
    else{
        img.style.opacity = 0;
      setTimeout(function(){
          img.src = e.target.result;
          img.style.opacity = 1;
            }, 2250);
        }
    }, false);
        
  reader.readAsDataURL(file);
  }, false);
  }

  function cambiar2(){
    var pdrs = document.getElementById('file-upload2').files[0].name;
    document.getElementById('info2').innerHTML = pdrs;
}
function cambio2(){
    var input = document.querySelector(".informacion2 #file-upload2"),
    img = document.querySelector(".informacion2 .img2");
  
  input.addEventListener("change", function(){
    var file = this.files[0],
        reader = new FileReader();
          
    reader.addEventListener("load", function(e){
      if (img.style.opacity == 0){
        img.src = e.target.result;
      img.style.opacity = 1;
        }
    else{
        img.style.opacity = 0;
      setTimeout(function(){
          img.src = e.target.result;
          img.style.opacity = 1;
            }, 2250);
        }
    }, false);
        
  reader.readAsDataURL(file);
  }, false);
  }