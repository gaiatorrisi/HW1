<?php

  if(!empty($_GET["ricerca"]))
  { 
    $conn = mysqli_connect("localhost", "root", "", "beautydb");
    $ricerca=mysqli_real_escape_string($conn,$_GET["ricerca"]);
    $query=" SELECT tipologia,costo FROM regali WHERE tipologia='$ricerca' ";
    $res= mysqli_query($conn, $query) or die(mysqli_error($conn));
    
    $array_ricerca=array();
    while($entry=mysqli_fetch_assoc($res)){
        $array_ricerca[]= array('tipologia'=>$entry['tipologia'], 'costo'=>$entry['costo']);
    }

    echo json_encode($array_ricerca);
    mysqli_free_result($res);
    mysqli_close($conn);
    exit;
  }
?>
