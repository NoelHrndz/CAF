<!DOCTYPE html>
<html lang="en">
  
<head>
  <title>Test</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    img{
      height: 200px;
    }
  </style>
</head>
<body>
 <img src="https://images.unsplash.com/photo-1606115915090-be18fea23ec7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=465&q=80" id="myImg">
  <div id="base64">

  </div>
  <script>
  function toDataURL(src, callback){
    var image = new Image();
    image.crossOrigin = 'Anonymous';
 
    image.onload = function(){
      var canvas = document.createElement('canvas');
      var context = canvas.getContext('2d');
      canvas.height = this.naturalHeight;
      canvas.width = this.naturalWidth;
      context.drawImage(this, 0, 0);
      var dataURL = canvas.toDataURL('image/jpeg');
      callback(dataURL);
    };
    image.src = src;
  }
      toDataURL('https://image.goat.com/transform/v1/attachments/product_template_additional_pictures/images/041/871/685/original/12966_01.jpg.jpeg?action=crop&width=2000', function(dataURL){
        $('#base64').html("<h5>"+dataURL+"</h5>");      
    })
  </script>
</body>
  
</html>