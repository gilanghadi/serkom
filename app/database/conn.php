<?php

// connection database mysql

$DBHOST = "localhost";
$DBUSER = "root";
$DBPASS = "";
$DBNAME = "serkom";


try {
    //code...
    $conn = mysqli_connect($DBHOST, $DBUSER, $DBPASS, $DBNAME);
} catch (\Throwable $th) {
    //throw $th;
    echo "Connection Failed!";
    exit;
}

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
