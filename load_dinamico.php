<?php

    $conn = mysqli_connect("localhost", "root", "", "beautydb");
    $query=" SELECT intestazione,descrizione,foto FROM trattamenti ";
    $res= mysqli_query($conn, $query) or die(mysqli_error($conn));
    
    $array_load=array();
    while($entry=mysqli_fetch_assoc($res)){
        $array_load[]= array('intestazione'=>$entry['intestazione'], 'descrizione'=>$entry['descrizione'],'foto'=>$entry['foto']);
    }

    echo json_encode($array_load);
    mysqli_free_result($res);
    mysqli_close($conn);
    exit;
?>
