<?php
if (getenv('DATABASE_URL') != "") {
    //Heroku
    // $dbopts = parse_url(getenv('DATABASE_URL'));
    // $type = "pgsql";
    // $servername = $dbopts["host"];
    // $username = $dbopts["user"];
    // $password = $dbopts["pass"];
    // $database = ltrim($dbopts["path"], '/');

    $type = "mysql";
    $servername = "sql5.freemysqlhosting.net";
    $database = "sql5469236";
    $username = "sql5469236";
    $password = "kNpfX1fBjV";
} else {
    //Docker
    // $type = "mysql";
    // $servername = "mysql";
    // $username = "root";
    // $password = "secret123";
    // $database = "pizzatimedb";
}
?>