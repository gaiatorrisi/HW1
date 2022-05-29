<!DOCTYPE html>
  <html>
    <head>
        
      <title>Gift Card</title>
      <meta name="viewpoint" content="width=device-width, initial-scale=1">
      <script src="cerca.js" defer="true"></script> 
      <link rel="stylesheet" href="regalo.css">
      <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Lobster&family=Roboto:wght@100&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
      <meta charset="utf-8">

    </head>
<body>
    <nav>
      <a href="base.php">HOME</a>
      <a href="about-us.php">ABOUT US</a>
      <?php if(empty($_SESSION['username'])){
        echo "<a href='login.php'>MY ACCOUNT</a>";
      }

      if(isset($_SESSION['username'])){
        $user = $_SESSION['username'];
        echo "<a href='myaccount.php'> $user 's account</a>";
        echo "<a href='logout.php'>Logout</a>";
      }
      ?>
      <a href="contatti.php">CONTACT US</a>
    
    </nav>

    <header>
        <h1>Regala benessere</h1>
    </header>

    <p>Le Gift Card sono l’ideale per chi desidera regalare momenti indimenticabili di relax e di benessere.</p>

  <section>
    <div class="flex-container">
        <div class="base">
                <div>
                    <img src="one.png" />
                </div>
        </div>
        <div class="base">
                <div>
                    <img src="2.png" />
                </div>
        </div>
        <div class="base">
                <div>
                    <img src="3.png" />
                </div>
        </div>
    </div>

    <p>Cerca qui la card per conoscere tutte le info</p>
    <form id="barra-ricerca" method="get">

        <input type="text" id="ricerca_regalo"></input>
        
        <input type='submit' id="submit"></input>
    </form>
    <section id="box_ricerca">
    </section>
  </section>

    </body>
  </html>