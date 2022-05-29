<?php
    $api_key='3086e7c9829545d48f981f22c27d8588';

    $query = urlencode($_GET["email"]);
    $url ='https://emailvalidation.abstractapi.com/v1/?api_key='.$api_key.'&email='.$query.'';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $res= curl_exec($ch);
    $json = json_decode($res, true);
   
    curl_close($ch);
    echo json_encode($json);
?>