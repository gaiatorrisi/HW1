<?php
    include 'auth.php';
    checkAuth();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Beauty Salon</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Lobster&family=Roboto:wght@100&display=swap" rel="stylesheet">
        <meta charset="utf-8">
        <script src="newsletter.js" defer></script>
        <script src="spotify.js" defer></script>
        <script src="load_dinamico.js" defer></script>
        <script src="vedi_recensioni.js" defer="true"></script> 
        <link rel="stylesheet" href="stile.css">
        <link rel="stylesheet" href="api.css">

    </head>

    <body>
<!--BARRA DI NAVIGAZIONE-->
        <nav>
            <a href="gift-card.php">GIFT CARD</a>
            <a href="about-us.php">ABOUT US</a>
            <?php if(empty($_SESSION['username'])){
              echo "<a href='login.php'>MY ACCOUNT</a>";
            }

            if(isset($_SESSION['username'])){
              $user = $_SESSION['username'];
              echo "<a href ='myaccount.php'> $user 's account</a>";
              echo "<a href='logout.php'>LOGOUT</a>";
            }
            ?>
            <a href="contatti.php">CONTACT US</a>

        </nav>

            <header>
                <h1> Beauty Team </h1>
                <div id=logo>
                    <img src="logo.png">
                </div>
            </header>
    
        <!--SEZIONE CENTRALE-->
        <section>
            <div id="descrizione">
                <h1>Vieni a scoprire tutti i nostri trattamenti!</h1>
                <p>
                    Attraverso una consulenza gratutia individueremo il trattamento più idoneo alla cura dell’inestetismo.
                </p>
            </div>
            <div class="flex-container">
            <!--
                    <div class="base">
                        <div>
                        <img src="16.png" />
                        <h1>Manicure</h1>
                            <p> 
                                Limatura delle unghie per forma e lunghezza, bagno mani con perfezionamento
                                zona cuticolare ed eliminazione ipercheratosi in eccesso.</br>
                                <a id="pulsante">LEARN MORE</a>
                            </p
                        </div>
                    </div>
           
                    <div class="base">
                        <div>
                            <img src="17.png" />
                            <h1>Trucco</h1>
                            <p>
                                Per un’occasione speciale avere un trucco che riesce a
                                essere perfetto rappresenta la scelta migliore sotto ogni aspetto.</br>
                                <a id="pulsante">LEARN MORE</a>
                            </p>
                        </div>
                    </div>
            
                    <div class="base">
                        <div>
                        <img src="19.png" />
                        <h1>Massaggi</h1>
                        <p>
                            Mani esperte e oli profumati ti avvolgeranno in modo da
                            riequilibrare il delicato e fondamentale rapporto corpo e anima.</br>
                            <a id="pulsante">LEARN MORE</a>
                        </p>
                        </div>
                    </div>
                    -->
                </div>
        </section>

        <!--HTML PER L'API SULLA NEWSLETTER-->
        <section id="NEWSLETTER">
            <form id="form_newsletter" >
                <h4>Beauty newsletter</h4>
                <p>Iscriviti alla nostra newsletter per rimanere aggiornato su tutte le nostre promo</p>  
                <input type='text'placeholder="La tua mail migliore.."id='email_input' >
                <input type='submit' id='submit' value='Ottieni i vantaggi'>              
            </form>
            <section id="box_email">
            </section>
        </section>


        <!--HTML PER L'API SULLA MUSICA


        <section id="RECENSIONI">
            <h1>
                Cosa hanno detto su di noi 
            </h1>
            <button id="recensioni">Clicca per vedere</button>

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
                <input type='submit' id='submit' value='Cerca'>            
            </form>
            <div class="flex-container">
                <section id="box_musica">
                </section>
            </div>-->
        </section>

        <!--FOOTER -->
        <footer>
            <div class="flex-container wrap">
                <div class="flex-item">
                        <h1>Orario</h1>
                        <p> Lunedi - Sabato </br>
                        09:30 - 20:00</p>
                        <img src='11.png'>
                </div>
                <div class="flex-item">
                        <h1>Telefono</h1>
                        <p> ☏: 095123321 </br>
                            +39 3280876234
                        </p>
                        <img src='12.png'>
                </div>
                <div class="flex-item">
                        <h1>Sede</h1>
                        <p>☞Corso Bellini 78</br> Fiumefreddo di Sicilia  </p>
                        <img src='13.png'>
                </div>
            </div>
        </footer>
    </body>
</html>