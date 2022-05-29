<?php
  include 'auth.php';
  if (checkAuth()) {
      header('Location: base.php');
      exit;
  }
  
  if(!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["nome"]) && !empty($_POST["cognome"] && !empty($_POST["email"])))
   { 
     $error= array();
     $conn = mysqli_connect("localhost", "root", "", "beautydb");
     $username = mysqli_real_escape_string($conn, $_POST["username"]);
     $query = "SELECT username FROM account WHERE username = '$username'";
     $res = mysqli_query($conn, $query) or die(mysqli_error($conn));;
     if (mysqli_num_rows($res) > 0) {
        $error= "Username già utilizzato";
     }else{
        $password=mysqli_real_escape_string($conn,$_POST["password"]);
        $password = password_hash($password, PASSWORD_BCRYPT);
        $nome=mysqli_real_escape_string($conn,$_POST["nome"]);
        $cognome=mysqli_real_escape_string($conn,$_POST["cognome"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $query="INSERT INTO account (nome, cognome, email, username, password) VALUES('$nome','$cognome','$email','$username','$password')";
        echo $query;
        if( mysqli_query($conn,$query))
        {
          $_SESSION["iscrizione"]=true;
            header("Location: login.php");
            mysqli_close($conn);
            exit;
        }
      }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Registrazione </title>
        <link rel="stylesheet" href="registrazion.css">
        <meta name="viewpoint" content="width=device-width, initial-scale=1">
        <script src="signup.js" defer="true"></script>
        <link rel="stylesheet" href="account.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Lobster&family=Roboto:wght@100&display=swap" rel="stylesheet">    
    
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

    <form action="" name="iscriviti2" method="POST">
      <label>Nome</label><br>
      <input type="text" name="nome">
      <br>

      <label>Cognome</label><br>
      <input type="text" name="cognome">
      <br>

      <label> Email</label><br>
      <input type="text" name="email">
      <br>
      
      <label id="username_label">Username</label><br>
      <input type="text" id="username" name="username" pattern="{5,20}$" title="Inserisci un username che abbia una lunghezza compresa tra 5 e 20 caretteri">
      <br>
        <?php
          if (isset($error)) {
              echo "<span class='error'>Username non disponibile</span><br>";
          }
        ?>
      <label>Password</label><br>
      <input type="password" name="password" id="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{5,15}$" title="La password deve contenere minimo 5, massimo 15 caratteri e comprendere almeno una lettera maiuscola, una minuscola, un numero e un carattere speciale">
      <br>

      <input type="submit" name="iscrizione" id="iscrizione" value="Iscriviti">
      </form>
    <br>
    
    <form action="login.php" name="login" method="POST">
            <label>Sei già iscritto?</label><br>
            <input type="submit" name="Login" id="submit" value="Login">
          </form>
   
  </section>


</body>
</html>