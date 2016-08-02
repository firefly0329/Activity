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
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
    
        $pdo->closeConnection();
        return $result;
    }
    
    function setActivity(){
        $pdo = new dbPDO;
        $pdoLink = $pdo->linkConnection();
        
        $grammer = "INSERT INTO `activity`(`Aname`, `startTime`, `endTime`, `numberUpper`, `together`, `content`) 
        VALUES (:Aname,:startTime,:endTime,:numberUpper,:together,:content)";
        $prepare = $pdoLink->prepare($grammer);
        $prepare->bindParam(':Aname', $_POST['Aname']);
        $prepare->bindParam(':startTime', $_POST['startTime']);
        $prepare->bindParam(':endTime', $_POST['endTime']);
        $prepare->bindParam(':numberUpper', $_POST['numberUpper']);
        $prepare->bindParam(':together', $_POST['together']);
        $prepare->bindParam(':content', $_POST['content']);
        $result = $prepare->execute();
        // $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
    
        $pdo->closeConnection();
        return $result;
    } 
}



?>