<?php 
class activity_model{
    
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
    
    function getOnceActivity($Aid){
        $pdo = new dbPDO;
        $pdoLink = $pdo->linkConnection();
        
        $grammer = "SELECT * FROM  `activity` WHERE `Aid` LIKE :Aid";
        $prepare = $pdoLink->prepare($grammer);
        $prepare->bindParam(':Aid', $Aid);
        $prepare->execute();
        $result = $prepare->fetch(PDO::FETCH_ASSOC);
    
        $pdo->closeConnection();
        return $result;
    }
    
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
}



?>