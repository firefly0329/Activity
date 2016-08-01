<?php 

class db2{
    private static $connection = null;
    function __construct(){
        $db2 = new PDO("mysql:host=localhost;dbname=recipe;port=3306", "root", "");
        $db2->exec("SET CHARACTER SET utf8");
        self::$connection = $db2;
        $db2 = null;
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
    $pdo = new db2;
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
