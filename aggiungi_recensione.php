<?php
  include 'auth.php';
  if (checkAuth()) {
      header('Location: base.php');
      exit;
  }

  if(!empty($_GET["rece"]))
  { 
    $conn = mysqli_connect("localhost", "root", "", "beautydb");
    $username=$_SESSION['username'];
    $recensione=mysqli_real_escape_string($conn,$_GET["rece"]);
    $query="INSERT INTO recensioni (utente, commento) VALUES('$username','$recensione')";
    $res= mysqli_query($conn, $query) or die(mysqli_error($conn));
    if ($res){
      $risposta='ricevuto inserimento';
      echo json_encode($risposta);
    }
    else{
      $risposta='non ricevuto inserimento';
      echo json_encode($risposta);
    }
    mysqli_close($conn);
    exit;
  }
?>

<html>
<script src="aggiungi_recensione.js" defer="true"></script> 
<link rel="stylesheet" href="stile.css">
<section>
<a href="base.php">Home</a>
    <h1>
        Lascia la tua recensione
    </h1>
    <form id="spazio-recensioni" action="" name="spazio-rece" method="GET">
      <input type="text" place-holder="Lascia la tua recensione..." id="commento" title="">
      <input type="submit" id="submit" value="submit">
    </form>
    <section id="box_recensione">
    </section>
</section>

</html>