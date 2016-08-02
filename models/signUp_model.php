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
        // echo $grammer;
        // echo "Snumber" . $_POST['Snumber'];
        // echo "Sname" . $_POST['Sname'];
        // echo "Aid" . $Aid;
        return $result;
    }
    
    
}