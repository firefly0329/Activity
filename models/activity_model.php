<?php 
class activity_model{
    
    //抓全部的活動
    function getActivity(){
        $pdo = new dbPDO;
        $pdoLink = $pdo->linkConnection();
        
        $grammer = "SELECT * FROM  `activity`";
        $prepare = $pdoLink->prepare($grammer);
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
    
        $pdo->closeConnection();
        return $result;
    }
    
    //抓單筆的活動
    function getOnceActivity($Aid){
        $pdo = new dbPDO;
        $pdoLink = $pdo->linkConnection();
        
        $grammer = "SELECT * FROM  `activity` WHERE `Aid` = :Aid";
        $prepare = $pdoLink->prepare($grammer);
        $prepare->bindParam(':Aid', $Aid);
        $prepare->execute();
        $result = $prepare->fetch(PDO::FETCH_ASSOC);
    
        $pdo->closeConnection();
        return $result;
    }
    
    //新增活動
    function setActivity($Aname,$startTime,$endTime,$numberUpper,$together,$content){
        $pdo = new dbPDO;
        $pdoLink = $pdo->linkConnection();
        echo $startTime;
        $grammer = "INSERT INTO `activity`(`Aname`, `startTime`, `endTime`, `numberUpper`, `Atogether`, `content`) 
        VALUES (:Aname, :startTime, :endTime, :numberUpper, :together, :content)";
        $prepare = $pdoLink->prepare($grammer);
        $prepare->bindParam(':Aname', $Aname);
        $prepare->bindParam(':startTime', $startTime);
        $prepare->bindParam(':endTime', $endTime);
        $prepare->bindParam(':numberUpper', $numberUpper);
        $prepare->bindParam(':together', $together);
        $prepare->bindParam(':content', $content);
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($result);
        $pdo->closeConnection();
        return $result;
    } 
    
    //讀取(單筆)參加人數
    function getOnceNumber($Aid){
        $pdo = new dbPDO;
        $pdoLink = $pdo->linkConnection();
        
        $grammer = "SELECT `number` FROM  `activity` WHERE `Aid` = :Aid";
        $prepare = $pdoLink->prepare($grammer);
        $prepare->bindParam(':Aid', $Aid);
        $prepare->execute();
        $result = $orderNumber = $prepare->fetch(PDO::FETCH_ASSOC);
        
    
        $pdo->closeConnection();
        // echo $result;
        return $result['number'];
    }
    
    //修改參加人數
    function updateAtoghther($Aid,$toghtherADD,$OrderNumber){
        $pdo = new dbPDO;
        $pdoLink = $pdo->linkConnection();
        
        $newNumber = $OrderNumber - ($toghtherADD + 1);
        $grammer = "UPDATE `activity` SET `number` = :number WHERE `Aid` = :Aid";
        $prepare = $pdoLink->prepare($grammer);
        $prepare->bindParam(':number', $newNumber);
        $prepare->bindParam(':Aid', $Aid);
        $result = $prepare->execute();
        // $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
    
        $pdo->closeConnection();
        // echo $result;
        return $result;
    }
}



?>