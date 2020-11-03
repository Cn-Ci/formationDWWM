<?php
    function connection() { 
        $db = mysqli_init();
        mysqli_real_connect($db, 'localhost','root','','afpa_test');
        return $db;
    }