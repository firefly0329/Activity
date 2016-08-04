<?php 

class dbPDO{
    private static $connection = null;
    function __construct(){
        $db = new PDO("mysql:host=localhost;dbname=Activity;port=3306", "firefly0329", "");
        $db->exec("SET CHARACTER SET utf8");
        self::$connection = $db;
        $db = null;
    }
    function linkConnection(){
        return self::$connection;
    }
    function closeConnection(){
        self::$connection = null;
    }
    
    function selectAll($grammer,$paramArray){
        $pdoLink = self::$connection;
        
        $prepare = $pdoLink->prepare($grammer);
        $prepare->execute($paramArray);
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);

        self::$connection = null;
        return $result;
    }
    function selectOnce($grammer,$paramArray){
        $pdoLink = self::$connection;
        
        $prepare = $pdoLink->prepare($grammer);
        $prepare->execute($paramArray);
        $result = $prepare->fetch(PDO::FETCH_ASSOC);

        self::$connection = null;
        return $result;
    }
    function change($grammer,$paramArray){
        $pdoLink = self::$connection;
        // $pdoLink->exec('LOCK TABLES `activity` READ , `signUp` READ');
        
        $prepare = $pdoLink->prepare($grammer);
        $result = $prepare->execute($paramArray);

        // $pdoLink->exec('UNLOCK TABLES');
        self::$connection = null;
        return $result;
    }
    // function update($grammer,$paramArray){
    //     $pdoLink = self::$connection;
    //     $pdoLink->exec('LOCK TABLES `activity` READ , `signUp` READ');
        
    //     $prepare = $pdoLink->prepare($grammer);
    //     $result = $prepare->execute($paramArray);

    //     $pdoLink->exec('UNLOCK TABLES');
    //     self::$connection = null;
    //     return $result;
    // }
}



/*使用此class的範例

function getOnceActivity($Aid){
        $pdo = new dbPDO;

        $grammer = "SELECT * FROM  `activity` WHERE `Aid` = :Aid";
        $paramArray = array(':Aid' => $Aid);
        $result = $pdo->selectOnce($grammer, $paramArray);
        
        return $result;
    }

*/





?>
