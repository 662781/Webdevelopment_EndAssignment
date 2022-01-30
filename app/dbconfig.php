<?php
if (getenv('DATABASE_URL') != "") {
    $dbopts = parse_url(getenv('DATABASE_URL'));
    $type = "pgsql";
    $servername = $dbopts["host"];
    $username = $dbopts["user"];
    $password = $dbopts["pass"];
    $database = ltrim($dbopts["path"], '/');
} else {
    //Docker
    // $type = "mysql";
    // $servername = "mysql";
    // $username = "root";
    // $password = "secret123";
    // $database = "pizzatimedb";

    //FreeMySQLHosting.net
    // $Server = "sql5.freemysqlhosting.net";
    // $Name = "sql5469236";
    // $Username = "sql5469236";
    // $Password = "kNpfX1fBjV";
    // $Port_number = "3306";

    $type = "mysql";
    $servername = "sql5.freemysqlhosting.net";
    $username = "sql5469236";
    $password = "kNpfX1fBjV";
    $database = "sql5469236";
}
?>