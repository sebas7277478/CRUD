<?php

include("database.php");

$query = "SELECT * FROM tareas";
$result = pg_query($connecction, $query);

if(!$result) {
    die("Hubo un error en la consulta". pg_error($connecction));
}

$json = array();

while($row = pg_fetch_array($result)){
    $json[] = array(
        "id"=>$row["id"],
        "name"=>$row["name"],
        "description"=>$row["description"]
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;