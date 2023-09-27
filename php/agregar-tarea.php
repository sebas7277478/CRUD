<?php

include("database.php");

if(isset($_POST["name"])){
    $task_name = $_POST["name"];
    $task_description = $_POST["description"];

    $query = "INSERT into tareas (name, description) VALUES ('$task_name', '$task_description')";
    $result = pg_query($connecction, $query);

    if(!$result) {
        die("Hubo un error en la consulta". pg_error($connecction));
    }

    echo "Tarea agregada!";
}