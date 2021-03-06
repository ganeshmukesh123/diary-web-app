<?php
   include("connection.php");
   if(!isset($_SESSION['id'])){
   	    header('Location: '.'http://localhost:8080/diary-web-app/index.php');
   }
   $content="";
   $query="SELECT `content` FROM `diary_users` WHERE `user_id`='".$_SESSION['id']."'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_assoc($result); 
    $content=$row['content'];

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Diary</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
  	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#">
	  <?php
		  $query="SELECT `username` FROM `diary_users` WHERE `user_id`='".$_SESSION['id']."'";
		  $result = mysqli_query($conn,$query);
		  $row=mysqli_fetch_assoc($result);
		  echo "Welcome  <strong>".$row['username']."</strong>";
	  ?>
	  </a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <div class="form-inline mt-2 mt-md-0" style="margin-left: auto;">
          <a class="btn btn-outline-danger my-2 my-sm-0" href="#" id="logout">Logout</a>
        </div>

	  </div>
	</nav>
	<div class="form-group" style="margin:16px;
	">
	    <textarea class="form-control" id="diary_content" rows="16">
	       <?php
	       echo $content;
		    ?>
		   	
		</textarea>
    <a href="#" class="btn btn-primary btn-lg" role="button" aria-pressed="true" id="saveContent" style="width: 100%;margin-top: 16px;">Save</a>
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script type="text/javascript">

    	$("#saveContent").click(function(){
    		//console.log($("#diary_content").val());
    		updateContentInDB();
    	});

      $("#logout").click(function(){
        updateContentInDB();
        window.location="actions.php?function=logout";
      });

      function updateContentInDB(){
        $.ajax({
          type:"post",
          url:"actions.php?actions=updateContent",
          data:"content="+$("#diary_content").val(),
          success: function(result){
            if(result == "1"){
                  //console.log("success");
                  //window.location ="loggedInPage.php";
                }
                else{
                  //console.log("failure");
                }
          }
        });
      }


    </script>
  </body>
</html>
