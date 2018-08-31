<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alegreya" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet">



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    
    
  </head>
  <body>
   
   <?php
      ob_start();
      if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
      ?>
     
    
    
    
    
 <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
      
      <a class="navbar-brand" href="#">
       <a class="navbar-brand" href="#">
    <!--  <img src="igclogo.png" width="30" height="30" class="d-inline-block align-top" alt="">   -->
    Student management portal
  </a>
</a>
  

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
  </div>  
  <span class="navbar-text">
  <ul class="navbar-nav mr-auto">
   <li class="nav-item">
        <a class="nav-link" href="signUp.php">SignUp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
      </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Login&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
      </li> 
      
     
      </ul>
   
    </span>
  
</nav>
   
   
   
   <div class="container">
    <div class="row">
        
        <div class="col-sm-4">
           <br>
           <br>
            <div align="center" style="font-family: 'Patua One', cursive;
                     " class="col-sm-8"><h3>&nbsp;&nbsp;&nbsp;&nbsp;Login</h3></div>
        </div>
        
    </div>
     <div class="row">
        
        <div class="col-sm-4">
           
           <br>
           <br>
            <form action="" method="post">
            <div class="form-group row">
             
              <div class="col-10">
                    <input class="form-control" type="text" placeholder="Name" id="example-text-input" name="name" required>
              </div>  
              
              <br>
              <br>  
              <div class="col-10">
                    <input class="form-control" type="password" placeholder="Password" id="example-text-input" name="pass" required>
              </div>
              
            
            <br>
            <br>
            
            <div class="col-10">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>  
            </div>       
                </div>
            </form>
         </div>
           
            
     </div>

   </div>
      
      <?php
      
      
     
        if(isset($_POST["submit"]))
        {
            $con=mysqli_connect("localhost","root","","dbmsproject");
            $name=$_POST["name"];
            $pass=$_POST["pass"];
            
            
            if(!$con)
            {
                die("Connection failed: " . mysqli_connect_error());
            }
            else
            {
                echo "Connected successfully";  
                  
                        
                       
                    $sql="SELECT * FROM faculty WHERE name='$name' AND pass='$pass'";
                    $query=mysqli_query($con,$sql);
                    $rows=mysqli_num_rows($query);
                    if($rows==1)
                    {
                        
                       
                        header("Location:index.php");
                        
                    }
                    else
                    {
                        echo "Username or password is invalide!";
                    }
                }
            }
        
ob_end_flush();
      ?>
      
      
      
          
      
      
      

   
   
   
   
   
   
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>