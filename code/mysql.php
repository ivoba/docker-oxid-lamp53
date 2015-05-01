<?php

$host = 'mysql';
$user = 'root';
$passwd = 'rootPW';

$link = mysql_connect($host, $user, $passwd);

if (!$link) {
    echo "<p>Could not connect to the server '" . $host . "'</p>\n";
    echo mysql_error();
} else {
    echo "<p>Successfully connected to the server '" . $host . "'</p>\n";
    printf("MySQL client info: %s\n", mysql_get_client_info());
    printf("MySQL host info: %s\n", mysql_get_host_info());
    printf("MySQL server version: %s\n", mysql_get_server_info());
    printf("MySQL protocol version: %s\n", mysql_get_proto_info());
}
