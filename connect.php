<?php
$konek  = new mysqli('localhost','root','','penilaian');
if($konek->connect_errno){
    "database error".$konek->connect_error;
}

?>