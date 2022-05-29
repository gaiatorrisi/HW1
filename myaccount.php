<?php
  include 'auth.php';
  if (checkAuth()) {
      header('Location: home.php');
      exit;
  }
?>
<!DOCTYPE html>
<html>
  <head>
  <head>
    <title>My account</title>
    <meta name="viewpoint" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <script src="aggiungi_recensione.js" defer="true"></script> 
    <script src="random.js" defer="true"></script> 
    <script src="spotify.js" defer="true"></script> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Lobster&family=Roboto:wght@100&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="myaccount.css">
    <link rel="stylesheet" href="api.css">

  </head>

  <body>
  <nav>
    <a href="base.php">HOME</a>
    <a href="gift-card.php">GIFT CARD</a>
    <a href="about-us.php">ABOUT US</a>
    <?php if(empty($_SESSION['username'])){
      echo "<a href='login.php'>MY ACCOUNT</a>";
    }

    if(isset($_SESSION['username'])){
      $user = $_SESSION['username'];
      echo "<a> $user 's account</a>";
      echo "<a href='logout.php'>LOGOUT</a>";
    }
    ?>
    <a href="contatti.php">CONTACT US</a>
  </nav>

  <div class="typing-demo">
        <?php
            if(isset($_SESSION['username'])){
                $user = $_SESSION['username'];
                echo "<p> Welcome , $user ! ❥</p>";
            }
            ?>
  </div>
  </div>
<section>
    <div id="profilo">
    <div>
            <img src="">
            </div>
            <?php
        if(isset($_SESSION['username'])){
          $user = $_SESSION['username'];
          echo "<p>$user's beauty </br> profile </p>";
        }
    ?>
    </div>

    <section id="RECENSIONI">
      <form id="spazio-recensioni" action="" name="spazio-rece" method="GET">
        <h1>Lascia la tua recensione</h1>
        <input type="text" place-holder="Lascia la tua recensione..." id="commento" title="">
        <input type="submit" id="submit">
      </form>
      <section id="box_recensione">
      </section>
    </section>


    <section id="SPOTIFY">
            <form id="form_musica">
                <h4>Servizio offerto da Spotify </h4>
                <p>Seleziona il tipo di trattamento che riceverai, poi inserisci un titolo.</br>
                Qui sotto visualizzerai le canzoni che potrai ascoltare in quell'intervallo di tempo:</p>
                    <select name = 'tipo' id='tipo'>
                        <option value='manicure'>Manicure (15-20 min)</option>
                        <option value='massaggio'>Massaggio(25-35 min)</option>
                        <option value='trucco'>Trucco(30-40 min)</option>
                    </select>
                <input type='text'  placeholder="Scrivi qui..." id='album'  >
                <input type='submit' id='submit'>            
            </form>
            <div class="flex-container">
                <section id="box_musica">
                </section>
            </div>
    </section>
  </section>

  </body>
</html>