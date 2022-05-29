<?php
  include 'auth.php';
  if (checkAuth()) {
      header('Location: base.php');
      exit;
  }
  

  if(!empty($_POST["username"]) && !empty($_POST["password"]))
   {     
     $conn=mysqli_connect("localhost","root","","beautydb");
     $username=mysqli_real_escape_string($conn, $_POST["username"]);
     $password=mysqli_real_escape_string($conn, $_POST["password"]);
     $query="SELECT username, password FROM account WHERE username='$username'";
     $res= mysqli_query($conn, $query) or die(mysqli_error($conn));;
     if(mysqli_num_rows($res)>0)
     {
      $login = mysqli_fetch_assoc($res);
      if (password_verify($_POST['password'], $login['password'])) {
        $_SESSION["username"]=$_POST["username"];
        $_SESSION['log']=$login['id'];
        header("Location: base.php");
        mysqli_free_result($res);
        mysqli_close($conn);
        exit;
      }
      else{
        $error=true;
      }
     }
     else{
       $error=true;
     }
        
  }
?>
<!DOCTYPE html>
<html>
  <head>
  <head>
    <title> Login </title>
    <meta name="viewpoint" content="width=device-width, initial-scale=1">
    <script src="login.js" defer="true"></script> 
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Lobster&family=Roboto:wght@100&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="account.css">

  </head>

  <body>
  <nav>
    <a href="base.php">HOME</a>
    <a href="gift-card.php">GIFT CARD</a>
    <a href="about-us.php">ABOUT US</a>
    <a href="contatti.php">CONTACT US</a>
  </nav>
  <header>
      <h1> Area personale </h1>
  </header>
    <section>
      <main>
            <?php
                // Verifica la presenza di errori
                if(isset($error))
                {
                    echo "Credenziali Sbagliate";    
                }
            ?>
          
            <form action="" name="login" method="POST">
               
              <label>Username</label><br>
              <input type="text" name="username" >
               <br>
              
              <label>Password</label><br>
              <input type="password" name="password" >
               <br>
               <br>
                <input type="submit" name="submit" id="submit" value="Login" action="base.php">
            </form>
            <br>
        
          <form action="signup.php" name="iscriviti" method="POST">
            <label>Non sei ancora iscritto?</label><br>
            <input type="submit" name="iscrizione" id="iscrizione" value="Iscriviti">
          </form>
          
        </main>
    </section> 

  </body>
</html>