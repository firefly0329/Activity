<?php 

class dbPDO{
    private static $connection = null;
    function __construct(){
        $db = new PDO("mysql:host=localhost;dbname=Activity;port=3306", "root", "");
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
    
}
/*使用此class的範例
function getMessage($menuId){
    $pdo = new dbPDO;
    $pdoLink = $pdo->linkConnection();
    
    $grammer = "select * from message where menuId like :menuId order by time desc";
    $prepare = $pdoLink->prepare($grammer);
    $prepare->bindParam(':menuId', $menuId);
    $prepare->execute();
    $result = $prepare->fetchAll(PDO::FETCH_ASSOC);

    $pdo->closeConnection();
    return $result;
}

*/





?>
