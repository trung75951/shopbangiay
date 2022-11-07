<?php
class connect
{
    var $db = null;
    public function __construct()
    {
        // $dsn='mysql:host=localhost;dbname=giay';
        // $user='root';
        // $pass='';

        // $dsn = 'mysql:host=mysql-94690-0.cloudclusters.net;dbname=giay,port=17367';
        // $user = 'admin';
        // $pass = '2aJMdvkU';


        $host = 'mysql-94690-0.cloudclusters.net';
        $db   = 'giay';
        $user = 'admin';
        $pass = '2aJMdvkU';
        $port = "17367";
        $charset = 'utf8';

        
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";

        $this->db = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    }
    function getInstance($select)
    {
        $results = $this->db->query($select);
        $result = $results->fetch();
        return $result;
    }
    function getList($select)
    {
        $results = $this->db->query($select);
        return $results;
    }
    function exec($query)
    {
        $results = $this->db->exec($query);
        return $results;
    }
}
