<!DOCTYPE html>
<head>
   <title>  Inscription </title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
       <!-- jQuery library -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <!-- Latest compiled JavaScript -->
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$(function(){    $("#header").load("header.php");});
     </script>
</head>
<body>
<div id = "header" >
       </div>
       <div class="container-fluid">
       <div class="col-md-6">
<form action="/insc.php" method="post">
             <div class="form-row">
             <div class="form-group col-md-6">
                     <label for="text">Nom</label>
                <input type="text" class="form-control" name = "nom" placeholder="First name" required>
                  </div>
              <div class="form-group col-md-6">
                     <label for="text">Prénom</label>
                  <input type="text" class="form-control" name = " prenom" placeholder="Last name" required>
                </div>
              </div >
           <div class="form-row">
                   <div class="form-group col-md-6">
           <label for="text">Pseudo</label>
                <input type="text" class="form-control" id="text" name = "ps" placeholder="Pseudo"required>
              </div>
           </div>
            <div class="form-row">
               <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                  <input type="email" class="form-control" id="inputEmail4" name = "email" placeholder="Email" required>
                </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">Password</label>
                         <input type="password" class="form-control" id="inputPassword4" name ="pwd" placeholder="Password"required>
                          </div>

              <button type="submit" class="btn btn-primary">Sign in</button>


                </div>
             </form>
        </div>
</div>
</body>
