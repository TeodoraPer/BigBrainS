<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <title>Document</title>
    <script>
        $(document).ready(function(){ 
                $("#submit").click(function(e){
               $.ajax({
    type:'POST',
    url:"poruka",
    data:{name:$('#name').val()},
    success:function(result,status,xhr){    
    $('#message').html(result);},
    error:function(xhr,status,error){ 
                   $("#message").html(error);
               }
     
               })
 
                })
            
        })
    </script>
</head>
<body>
    <h1>Enter name</h1>
    <input type="text" id="name">
    <button id="submit">Pitisni</button>
    <div id="message"></div>
</body>
</html>