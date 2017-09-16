<?php
$con = @mysql_connect("localhost","root","58737d9134");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("dy25", $con);
mysql_query('set names utf-8');
// some code
?>