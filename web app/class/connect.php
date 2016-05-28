<?php
$hostname="localhost"; //local server name default localhost
$username="root";  //mysql username default is root.
$password="mysql";       //blank if no password is set for mysql.
$database="white_rabbit";  //database name which you created
$con=mysql_connect($hostname,$username,$password);
if(! $con)
{
die('Connection Failed'.mysql_error());
}

mysql_select_db($database,$con);

class db {

    function __construct()
    {
        global $dbh;
        if (!is_null($dbh)) return;
        $dbh = mysql_pconnect(localhost, root, mysql);
        mysql_select_db(white_rabbit);
        mysql_query('SET NAMES utf8');
    }

    function select_list($query)
    {
        $q = mysql_query($query);
        if (!$q) return null;
        $ret = array();
        while ($row = mysql_fetch_array($q, MYSQL_ASSOC)) {
            array_push($ret, $row);
        }
        mysql_free_result($q);
        return $ret;
    }
  }
?>