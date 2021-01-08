<?php
//getting id
$xml=simplexml_load_file("clients.xml") or die("Error: Cannot create object");
$getlast = $xml->xpath('/Clients/client[last()]/@id');

//echo print_r($getid);

$id = 0;

foreach($getlast as $getid)
{
    $id=$getid;
}

echo $id;



?>