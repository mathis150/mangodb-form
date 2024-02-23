<?php

    define("DATABASE", array(
        "host" => "localhost",
        "username" => "",
        "password" => "",
        "appName" => ""
    ));

    define("MONGODB", "mongodb+srv://".DATABASE['username'].":".DATABASE['password']."@".DATABASE['host']."/?retryWrites=true&w=majority&appName=".DATABASE['appName']);
    define("MONGODB_LOCAL", "mongodb://localhost:27017");

    define("SERVICE_TYPE", "prod");

?>