<?php

include("database.php");

$search = $_POST["search"];

if(!empty($search)) {
    $query = "SELECT * FROM tareas WHERE name LIKE '$search%'";
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
}