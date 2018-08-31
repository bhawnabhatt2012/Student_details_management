<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
  <body>
   <br>
   
   <div class="container">
   
   <div class="row">
       <div class="col-sm-4"></div>
       <div class="col-sm-4"><h4>Student details portal</h4></div>
       <div class="col-sm-4"></div>
   </div>
   <br>
   
   
   <ul class="nav nav-tabs" id="myTab" role="tablist">
     
      <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" >Data entry</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" >update</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="stat-tab" data-toggle="tab" href="#stat" role="tab" >Stats</a>
      </li>
   </ul>
   <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          
          <div class="container">
          <br>
          <br>
        <form action="insert.php" method="post" id="studentDetails" width="100">
          <div class="row">
            <div class="col">
              <input type="text" class="form-control" placeholder="Roll No." name="rollNo" required>
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Student Name" name="studentName" required>
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Dept" name="dept"required>
            </div>
            </div>
            <br>
            
            <div class="row">
                
            <div class="col">
              <input type="text" class="form-control" placeholder="TOC marks/50" name="toc" required>
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="DBMS marks/50" name="dbms" required>
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Algorith marks/50" name="algo" required>
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Networks marks/50" name="networks" required>
            </div>
            
          </div>
          <br>
          
          <button type="submit" class="btn btn-primary" name="submit">Submit Entry</button>
        </form>
    </div>
    <br>
    <br>
    <div class="container">
      <div class="row">
          <div class="col-sm-12">
              <table style="width:100%">
                 <thead>
                     <th>Roll no.</th>
                     <th>Student Name</th>
                     <th>Department</th>
                     <th>TOC Marks</th>
                     <th>DBMS Marks</th>
                     <th>Algorthim Marks</th>
                     <th>Networks marks</th>
                 </thead>
                 <tbody id="studentTableBody">
                 <?php
                    $con=mysqli_connect("localhost","root","","dbmsProject");
                    if(!$con)
                    {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    else
                    {
                        //echo "Connected successfully";
                        $sql="select * from student";
                        $query=mysqli_query($con,$sql);
                        $count=mysqli_num_rows($query);
                        for($i=0;$i<$count;$i++)
                        {
                            $data=mysqli_fetch_array($query);
                            echo "<tr>";
                            echo "<td>".$data[0]."</td>";
                            echo "<td>".$data[1]."</td>";
                            echo "<td>".$data[2]."</td>";
                            echo "<td>".$data[3]."</td>";
                            echo "<td>".$data[4]."</td>";
                            echo "<td>".$data[5]."</td>";
                            echo "<td>".$data[6]."</td>";
                            echo "</tr>";


                        }

                    }
                     
               /* if(isset($_POST["submit"])) 
                {
                    $rollNo=$_POST["rollNo"];
                    $studentName=$_POST["studentName"];
                    $dept=$_POST["dept"];
                    $toc=$_POST["toc"];
                    $dbms=$_POST["dbms"];
                    $algo=$_POST["algo"];
                    $maths=$_POST["maths"];
                    $sql="insert into student (rollNo,studentName,dept,toc,dbms,algo,networks) values ('$rollNo','$studentName','$dept','$toc','$dbms','$algo','$maths')";
                    mysqli_query($con,$sql);
                    
                }*/

                    

                    
                ?>
                  </tbody>
                  
              </table>
               
          </div>
      </div>      
    </div>
    
    <script type="text/javascript">
        $("#studentDetails").submit(function(evt){
            
            evt.preventDefault();
            var url=$(this).attr("action");
            var formData=$(this).serialize();
            $.post(url,formData,function(res)
                  {
                alert(res);
                $.post("fetchData.php",function(response){
                    var x=document.getElementById("studentTableBody");
                    while (x.hasChildNodes()) 
                    {
                        x.removeChild(x.lastChild);
                    }
                    //alert(response);
                    var responseLength=response.length;
                    var itr=responseLength/7;
                    var count=0;
                    for(var i=0;i<itr;i++)
                        {
                            var tr=document.createElement("tr");
                            var td1=document.createElement("td");
                            td1.innerHTML=response[count++];
                            var td2=document.createElement("td");
                            td2.innerHTML=response[count++];
                            var td3=document.createElement("td");
                            td3.innerHTML=response[count++];
                            var td4=document.createElement("td");
                            td4.innerHTML=response[count++];
                            var td5=document.createElement("td");
                            td5.innerHTML=response[count++];
                            var td6=document.createElement("td");
                            td6.innerHTML=response[count++];
                            var td7=document.createElement("td");
                            td7.innerHTML=response[count++];
                            tr.appendChild(td1);
                            tr.appendChild(td2);
                            tr.appendChild(td3);
                            tr.appendChild(td4);
                            tr.appendChild(td5);
                            tr.appendChild(td6);
                            tr.appendChild(td7);
                            x.appendChild(tr);
                            
                            
                        }
                    
                },'json');
                    

                
                
            });
            
        })
    </script>
          
      </div>
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
         <br>
         <br>
         <form action="update.php" method="post" id="studentDetailsUpdate" width="100">
          <div class="row">
            <div class="col-5">
              <input type="text" class="form-control" placeholder="Enter Roll No. of student to be updated" name="rollNo" required>
            </div>
             </div>
             <br>
             <p>Enter updated details :</p>
             <div class="row">
                
                 
            <div class="col">
              <input type="text" class="form-control" placeholder="Student Name" name="studentName" required>
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Dept" name="dept"required>
            </div>
            </div>
            <br>
            
            <div class="row">
                
            <div class="col">
              <input type="text" class="form-control" placeholder="TOC marks/50" name="toc" required>
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="DBMS marks/50" name="dbms" required>
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Algorith marks/50" name="algo" required>
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Networks marks/50" name="networks" required>
            </div>
            
          </div>
          <br>
          
          <button type="submit" class="btn btn-primary" name="submitUpdate">Update</button>
        </form>
          <script type="text/javascript">
        $("#studentDetailsUpdate").submit(function(evt){
            
            evt.preventDefault();
            var url=$(this).attr("action");
            var formData=$(this).serialize();
            $.post(url,formData,function(res)
                  {
                alert(res);
                $.post("fetchData.php",function(response){
                    var x=document.getElementById("studentTableBody");
                    while (x.hasChildNodes()) 
                    {
                        x.removeChild(x.lastChild);
                    }
                   // alert(response);
                    var responseLength=response.length;
                    var itr=responseLength/7;
                    var count=0;
                    for(var i=0;i<itr;i++)
                        {
                            var tr=document.createElement("tr");
                            var td1=document.createElement("td");
                            td1.innerHTML=response[count++];
                            var td2=document.createElement("td");
                            td2.innerHTML=response[count++];
                            var td3=document.createElement("td");
                            td3.innerHTML=response[count++];
                            var td4=document.createElement("td");
                            td4.innerHTML=response[count++];
                            var td5=document.createElement("td");
                            td5.innerHTML=response[count++];
                            var td6=document.createElement("td");
                            td6.innerHTML=response[count++];
                            var td7=document.createElement("td");
                            td7.innerHTML=response[count++];
                            tr.appendChild(td1);
                            tr.appendChild(td2);
                            tr.appendChild(td3);
                            tr.appendChild(td4);
                            tr.appendChild(td5);
                            tr.appendChild(td6);
                            tr.appendChild(td7);
                            x.appendChild(tr);
                            
                            
                        }
                    
                },'json');
                    

                
                
            });
            
        })
    </script>
          
      </div>
      
      
   <div class="tab-pane fade show " id="stat" role="tabpanel" aria-labelledby="stat-tab">
   <br>
     <br>
      <div class="row">
         <div class="col-sm-6">
             <div class="row">
                 <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total number of students :</h6><h6 id="totalStudents">Nil</h6>  
             </div>   
         </div>
      </div>
      <div class="row">
         <div class="col-sm-6">
             <div class="row">
                 <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sum of marks of TOC :</h6><h6 id="sumToc">Nil</h6>  
             </div>   
         </div>
         <div class="col-sm-6">
             <div class="row">
                 <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Average marks in TOC :</h6><h6 id="avgToc">Nil</h6>  
             </div>   
         </div>
      </div>
      <div class="row">
         <div class="col-sm-6">
             <div class="row">
                 <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sum of marks of DBMS :</h6><h6 id="sumDbms">Nil</h6>  
             </div>   
         </div>
         <div class="col-sm-6">
             <div class="row">
                 <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Average marks in DBMS :</h6><h6 id="avgDbms">Nil</h6>  
             </div>   
         </div>
      </div>
      <div class="row">
         <div class="col-sm-6">
             <div class="row">
                 <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sum of marks of Algorithm :</h6><h6 id="sumAlgo">Nil</h6>  
             </div>   
         </div>
         <div class="col-sm-6">
             <div class="row">
                 <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Average marks in Algorithm :</h6><h6 id="avgAlgo">Nil</h6>  
             </div>   
         </div>
      </div>
      <div class="row">
         <div class="col-sm-6">
             <div class="row">
                 <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sum of marks of Networks :</h6><h6 id="sumNetworks">Nil</h6>  
             </div>   
         </div>
         <div class="col-sm-6">
             <div class="row">
                 <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Average marks in Networks :</h6><h6 id="avgNetworks">Nil</h6>  
             </div>   
         </div>
      </div>
      <br>
      <div class="row">
          
          <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><button type="submit" class="btn btn-primary" name="statsRefresh" id="statsRefresh">Click to Refresh</button>
      </div>
      
      <script type="text/javascript">
          $("#statsRefresh").click(function(evt){
              $.post("totalStudents.php",function(response){
                  var x=document.getElementById("totalStudents");
                  x.innerHTML=response;
              });
              
              $.post("avgAlgo.php",function(response){
                  var x=document.getElementById("avgAlgo");
                  x.innerHTML=response;
              });
              $.post("avgDbms.php",function(response){
                  var x=document.getElementById("avgDbms");
                  x.innerHTML=response;
              });
              $.post("avgNetworks.php",function(response){
                  var x=document.getElementById("avgNetworks");
                  x.innerHTML=response;
              });
              $.post("avgToc.php",function(response){
                  var x=document.getElementById("avgToc");
                  x.innerHTML=response;
              });
              $.post("sumAlgo.php",function(response){
                  var x=document.getElementById("sumAlgo");
                  x.innerHTML=response;
              });
              $.post("sumDbms.php",function(response){
                  var avgAlgo=document.getElementById("sumDbms");
                  avgAlgo.innerHTML=response;
              });
              $.post("sumNetworks.php",function(response){
                  var x=document.getElementById("sumNetworks");
                  x.innerHTML=response;
              });
               $.post("sumToc.php",function(response){
                  var x=document.getElementById("sumToc");
                  x.innerHTML=response;
              });
          })         
          
          
      </script>
 
   </div>   
          

      
   </div>
   
   
    
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>