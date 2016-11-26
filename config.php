#!/usr/local/bin/php

<?php

$oracle_conn = oci_connect( 'username', 'password', '//oracle.cise.ufl.edu/orcl' );

$datetime = "<a href='index-7-data.php'>It is currently: " . date('l, g:i A') . "</a>";

?>