#!/usr/local/bin/php

<?php

$oracle_conn = oci_connect( 'username', 'password', '//oracle.cise.ufl.edu/orcl' );

$datetime = "It is currently: " . date('l, g:i A');

?>