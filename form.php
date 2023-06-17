<!doctype html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>contact us</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

          <div class="container-fluid">
               <a class="navbar-brand" href="#">Navbar</a>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                         <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="/php/get_post.php">Home</a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="#">get/post tutorial</a>
                         </li>
                         <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                   Dropdown
                              </a>
                              <ul class="dropdown-menu">
                                   <li><a class="dropdown-item" href="#">Action</a></li>
                                   <li><a class="dropdown-item" href="#">Another action</a></li>
                                   <li>
                                        <hr class="dropdown-divider">
                                   </li>
                                   <li><a class="dropdown-item" href="#">Something else here</a></li>
                              </ul>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link disabled">Disabled</a>
                         </li>
                    </ul>
                    <form class="d-flex" role="search">
                         <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                         <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
               </div>
          </div>
     </nav>
     <?php
if($_SERVER['REQUEST_METHOD']=='POST'){
     $name=$_POST['name'];
     $email=$_POST['email'];
    $desc=$_POST['desc'];
    
   //submit to database
$servername="localhost";
$username="root";
$password="";
$database="contactus";
//create a connection
$conn=mysqli_connect($servername,$username,$password,$database);
// echo "connection was successful";
if(!$conn){
     die("sorry we failed to connect:".mysqli_connect_error());

}
else{
     echo "connection was successful<br>";

//submit to the database
//sql query to be executed
$sql="INSERT INTO `contactto` (`name`, `email`, `concern`, `dt`) VALUES ('$name', '$email', '$desc', current_timestamp())";
$result=mysqli_query($conn,$sql); 
if($result){
     echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
     <strong>success</strong> your entry has been submitted successfully!
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>';
}

else{
     echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
     <strong>success</strong> your entry has not been submitted successfully!we regret the inconvenient!
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>';
     mysqli_error($conn);

}
}
}
?>
     <div class="container mt-3">
          <h1>please, enter your email and password</h1>
          <form action="/php/form.php" method="post">
               <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">name</label>
                    <input type="text" class="form-control" name="name" id="Email" aria-describedby="emailHelp">
               </div>
               <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="Email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
               </div>
               <label for="exampleInputEmail1" class="form-label">description</label>
               <div class="form-group">
                    <textarea class="form-control" name="desc" id="" cols="30" rows="10"></textarea>
               </div>
               <button type="submit" class="btn btn-primary">Submit</button>
          </form>
     </div>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
     </script>
</body>

</html>