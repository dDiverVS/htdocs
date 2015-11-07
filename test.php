<?php
//Create your connection
$ftp_conn = ftp_ssl_connect( "192.168.1.102" );

//Login
$login_result = ftp_login($ftp_conn,"angel","inves");

if( $login_result )
   
    {
        echo "Success";
    }
    else
    {
        echo "An error occured";
    }

?>