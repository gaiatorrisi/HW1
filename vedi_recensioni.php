<?php 
      include 'auth.php';
      if (checkAuth()) {
          header('Location: base.php');
          exit;
    }

    $conn = mysqli_connect("localhost", "root", "", "beautydb");
//ne mostro solo 5
    $query = "SELECT utente,commento FROM recensioni";
    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
    
    $array_rece = array();
    while($entry = mysqli_fetch_assoc($res)) {
        $array_rece[] = array('utente' => $entry['utente'], 'commento' => $entry['commento']);
        
    }
    echo json_encode($array_rece);
    mysqli_free_result($res);
    mysqli_close($conn);
    exit;

?>
