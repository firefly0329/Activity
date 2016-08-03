<?php 
class signUp_model{
    
    function getSignUp($Aid){
        $pdo = new dbPDO;
        $pdoLink = $pdo->linkConnection();
        
        $grammer = "SELECT * FROM  `signUp` WHERE `Aid` LIKE :Aid";
        $prepare = $pdoLink->prepare($grammer);
        $prepare->bindParam(':Aid', $Aid);
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
    
        $pdo->closeConnection();
        return $result;
    }
    function setSignUp($Snumber,$Sname,$Aid){
        $pdo = new dbPDO;
        $pdoLink = $pdo->linkConnection();
        
        $grammer = "INSERT INTO `signUp`(`Snumber`, `Sname`, `Aid`) 
        VALUES (:Snumber,:Sname,:Aid)";
        $prepare = $pdoLink->prepare($grammer);
        $prepare->bindParam(':Snumber', $Snumber);
        $prepare->bindParam(':Sname', $Sname);
        $prepare->bindParam(':Aid', $Aid);
        $result = $prepare->execute();
        // $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
    
        $pdo->closeConnection();
        // echo $result;
        return $result;
    }
    function getOnceSignUp($Aid,$Snumber,$Sname){
        $pdo = new dbPDO;
        $pdoLink = $pdo->linkConnection();
        
        $grammer = "SELECT * FROM  `signUp` WHERE 
        `Aid` LIKE :Aid AND `Snumber` LIKE :Snumber AND `Sname` LIKE :Sname";
        $prepare = $pdoLink->prepare($grammer);
        $prepare->bindParam(':Aid', $Aid);
        $prepare->bindParam(':Snumber', $Snumber);
        $prepare->bindParam(':Sname', $Sname);
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
    
        $pdo->closeConnection();
        return $result;
    }
    function updateSignUp($Snumber,$Sname,$Aid,$togethe,$Sid){
        $pdo = new dbPDO;
        $pdoLink = $pdo->linkConnection();
        
        $grammer = "UPDATE `signUp` SET `Snumber`=:Snumber,`Sname`=:Sname,`Aid`=:Aid
        ,`sign`=1,`together`=:together WHERE `Sid` LIKE :Sid";
        $prepare = $pdoLink->prepare($grammer);
        $prepare->bindParam(':Snumber', $Snumber);
        $prepare->bindParam(':Sname', $Sname);
        $prepare->bindParam(':Aid', $Aid);
        $prepare->bindParam(':together', $together);
        $prepare->bindParam(':Sid', $Sid);
        $result = $prepare->execute();
        // $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
    
        $pdo->closeConnection();
        // echo $result;
        return $result;
    }
    
    
}