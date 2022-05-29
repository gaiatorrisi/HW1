<!DOCTYPE html>
<nav>
            <a href="base.php">HOME</a>
            <?php if(empty($_SESSION['username'])){
              echo "<a href='login.php'>MY ACCOUNT</a>";
            }

            if(isset($_SESSION['username'])){
              $user = $_SESSION['username'];
              echo "<a> $user 's account</a>";
              echo "<a href='logout.php'>Logout</a>";
              echo "<a href='aggiungi_recensione.php'>Logout</a>";
            }
            ?>
            <a href="gift-card.php">GIFT CARD</a>
            <a href="contatti.php">CONTACT US</a>
</nav>

<html>
    <script src="vedi_recensioni.js" defer="true"></script> 
    <link rel="stylesheet" href="aboutus.css">
    <script src="aggiungi_recensione.js" defer="true"></script> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Lobster&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <header>
        <h1>Beauty comunity</h1>
    </header>

    <p>Entra anche tu a farne parte e raccontaci la tua esperienza per farci sapere cosa migliorare.</p>

<!--VEDI RECENSIONI -->
    <section id="RECENSIONI">
                <h1>
                    Cosa hanno detto su di noi 
                </h1>
                <button id="recensioni">Clicca per vedere</button>
                <section id="box_recensione">
                </section>
    </section>
</html>