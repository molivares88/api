<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div id="div1" class="container">
  <h1>My First Bootstrap Page</h1>
  <p>Hide tag h1.</p>
</div>

<div id="div2" class="container">
  <h1>Hide tag p.</h1>
  <p>This is some text.</p>
</div>

<div id="div3" class="container">
  <h1>Information</h1>
  <p>Results..</p>
</div>

<div id="div4" class="container">
  <h1>Information (append if es igual restaurante)</h1>
  <h2>Information (append if es igual gym)</h2>
  <p>End.</p>
</div>

<div id="div5" class="container">
  <h1>Call function on events on HTML, click next:</h1>
  <h2 onclick="get_categories2('h2')">Show value, onClick!</h2>
  <p>End event.</p>
</div>


<div id="div6" class="container">
  <h1>List:</h1>
  <select id="sel1">
  <option>Choose one please:</option>
  </select> 
</div>

<div id="div7" class="container">
  <h1>List:</h1>
  <select id="sel2">
  <option>Choose one please:</option>
  </select> 
  <p>End.</p>
</div>

<script>
    
    $(document).ready(function(){
        //alert("Its work!"); manda mensaje al usuario..
        //$(".container").hide(); esconde todas las clases 'container'..
        $("#div1 h1").hide(); //esconde tag h1 de div1
        $("#div2 p").hide(); //esconde tag p de div2 

        $("#sel1").change(function(){
            var valor = $(this).children("option:selected").val();
            var endpoint = "http://localhost/api/bi_description_get_id/"+valor; //be carefully by slash
            $.ajax({
                url     : endpoint,
                type    : "get",
                success : (function(data) {
                    $("#sel2").html("<option value='"+data.BusinessDescription.id+"'>"+data.BusinessDescription.name+"</option>");
                })
            });
        });

        var endpoint = "http://localhost/api/bi_categories_getall";
        $.ajax({
            url     : endpoint,
            type    : "get",
            success : (function(data) {
                $.each(data,function(key,value){
                    $("#sel1").append("<option value='"+value.BusinessCategories.id+"'>"+value.BusinessCategories.name+"</option>");
                });
            })
        });
    });

    var url = "http://localhost/";
    get_categories();
    get_categories2();
    get_categories3();

    function get_categories(){
        $.ajax({
            url     : url+"api/bi_categories_getall",
            type    : "get",
            success : function (data) {
                console.log(data);
                $.each( data, function(key, value){
                    $("#div3").append("<p>"+value.BusinessCategories.name+"</p>");
                    if(value.BusinessCategories.name=="Restaurante")
                    {
                        $("#div4 h1").append("<p>"+value.BusinessCategories.name+"</p>");
                    }
                    else if(value.BusinessCategories.name=="Gym")
                    {
                        $("#div4 h2").append("<p>"+value.BusinessCategories.name+"</p>");
                    }
                });
            }
        });
    }

    function get_categories2(parameter){
        $.ajax({
            url     : url+"api/bi_categories_getall",
            type    : "get",
            success : function (data) {
                console.log(data);
                $.each( data, function(key, value){
                    $("#div5 "+parameter+"").append(" Value = "+value.BusinessCategories.name+" .");
                    
                });
            }
        });
    }

    function get_categories3(parameter){
        $.ajax({
            url     : url+"api/bi_categories_getall",
            type    : "get",
            success : function (data) {
                console.log(data);
                $.each( data, function(key, value){
                    $("#div6 "+parameter+"").append(" Value = "+value.BusinessCategories.name+" .");
                    
                });
            }
        });
    }

</script>

</body>
</html> 
