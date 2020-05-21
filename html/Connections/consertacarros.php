<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_consertacarros = "mysql.consertacarros.com.br";
$database_consertacarros = "consertacarros";
$username_consertacarros = "consertacarros";
$password_consertacarros = "romeiro2017";
$consertacarros = mysql_pconnect($hostname_consertacarros, $username_consertacarros, $password_consertacarros) or trigger_error(mysql_error(),E_USER_ERROR); 
?>