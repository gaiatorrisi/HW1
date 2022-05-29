<?php
  include 'auth.php';
  if (checkAuth()) {
      header('Location: base.php');
      exit;
  }
  
  if(!empty($_POST["identificativo"]) && !empty($_POST["mail"]) && !empty($_POST["recapito"]) && !empty($_POST["richiesta"]))
   { 
      $error= array();
      $conn = mysqli_connect("localhost", "root", "", "beautydb");
      $nome=mysqli_real_escape_string($conn,$_POST["identificativo"]);
      $mail=mysqli_real_escape_string($conn,$_POST["mail"]);
      $richiesta = mysqli_real_escape_string($conn, $_POST["richiesta"]);
      $tel = mysqli_real_escape_string($conn, $_POST["recapito"]);
      $query="INSERT INTO appuntamenit (nome, mail,tel,richiesta) VALUES('$nome','$mail','$tel','$richiesta')";
      echo $query;
      if( mysqli_query($conn,$query))
      {
        $_SESSION["richiesta"]=true;
          header("Location: contatti.php");
          mysqli_close($conn);
          exit;
      }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Contatti</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Lobster&family=Roboto:wght@100&display=swap" rel="stylesheet">
        <meta charset="utf-8">
        <script src="newsletter.js" defer></script>
        <script src="spotify.js" defer></script>
        <script src="vedi_recensioni.js" defer="true"></script> 
        <link rel="stylesheet" href="stile.css">
        <link rel="stylesheet" href="contatti.css">

<!--BARRA DI NAVIGAZIONE-->
        <nav>
            <a href="base.php">HOME</a>
            <a href="about-us.php">ABOUT US</a>
            <?php if(empty($_SESSION['username'])){
              echo "<a href='login.php'>MY ACCOUNT</a>";
            }

            if(isset($_SESSION['username'])){
              $user = $_SESSION['username'];
              echo "<a> $user 's account</a>";
              echo "<a href='logout.php'>Logout</a>";
            }
            ?>
            <a href="contatti.php">CONTACT US</a>

        </nav>

        <header>
                <h1>Rimaniamo in contatto</h1>
        </header>

    
        <!--SEZIONE CENTRALE-->
    <section>
        <p>
        Lo staff del centro è professionale, gentile e disponibile, in grado di mettere a proprio agio </br>
        qualsiasi tipologia di cliente e di soddisfare qualsiasi richiesta, con risultati professionali </br>
        eccellenti. Il centro è aperto dalle 9:30 alle 20 ed è possibile prenotare una seduta </br>
        telefonicamente o recarsi presso la struttura in Corso Bellini 78, a Fiumefreddo per </br>
        chiedere una consulenza direttamente alla titolare e al suo staff </br>
        </p>
      <!--FORM PER RICHIEDERE UN APPUNTAMENTO-->
        <div class="container">  
          <form id="contact" action="" method="POST">
            <fieldset>
              <input placeholder="Nome e cognome" type="text" name="identificativo">
            </fieldset>
            <fieldset>
              <input placeholder="Email" type="email" name="mail" >
            </fieldset>
            <fieldset>
              <input placeholder="Numero di telefono " type="tel" name="recapito">
            </fieldset>
            <fieldset>
              <textarea placeholder="Il tuo messaggio.." name="richiesta"></textarea>
            </fieldset>
            <fieldset>
              <input name="submit" type="submit" value="Invia richiesta" id="sumbit"></input>
            </fieldset>
          </form>
        </div>
      </section>
    </body>
</html>