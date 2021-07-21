<?php session_start(); ?>
<div class="container-fluid">
  <nav class="navbar navbar-dark" style="background-color: #e3f2fd;" >
   <div class="container-fluid">
   <div class="navbar-header">
    <a class="navbar-brand" href="index.php">EuIs</a>
    </div>
   <ul class="nav navbar-nav">
     <li><a href="index.php">Home</a></li>
      <li><a href="inscription.php">Inscription</a></li>
      <li><a href="jeu.php">Règles du jeu</a></li>
    <li><a href="score.php">High score</a></li>
   </ul>
<?php
  if(!(isset($_SESSION['ps'])))
          {
            ?>
     <form id="signin" class="navbar-form navbar-right" role="form"  action ="check.php" method= "POST">
           <div class="input-group">
               <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
               <input id="" type="text" class="form-control" name="ps" value="" placeholder="Pseudo" required>
           </div>

           <div class="input-group">
               <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
               <input id="password" type="password" class="form-control" name="pwd" value="" placeholder="Password" required>
           </div>

           <button type="submit" class="btn btn-primary">Login</button>
      </form>
<?php
          } else {
?>
<ul class="nav navbar-nav navbar-right">
            <li id="services"><a href="membre.php">Bienvenue <?php echo $_SESSION['ps'];?></a></li>
            <li id="services"><a href="Deconnexion.php">Deconnexion</a></li>
</ul>
<?php
}?>
    </div>
        </nav>
  </div>
