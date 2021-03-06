<?php 
class signUp_model{
    
    //抓某活動的全部可報名員工
    function getSignUp($Aid){
        $pdo = new dbPDO;

        $grammer = "SELECT * FROM  `signUp` WHERE `Aid` = :Aid";
        $paramArray = array(':Aid' => $Aid);
        $result = $pdo->selectAll($grammer, $paramArray);
        
        return $result;
    }
    
    
    //新增某活動的可報名員工
    function setSignUp($Snumber,$Sname,$Aid){
        $pdo = new dbPDO;

        $grammer = "INSERT INTO `signUp`(`Snumber`, `Sname`, `Aid`) 
        VALUES (:Snumber,:Sname,:Aid)";
        $paramArray = array(':Snumber' => $Snumber,
                            ':Sname' => $Sname,
                            ':Aid' => $Aid);
        $result = $pdo->change($grammer, $paramArray);
        
        return $result;
    }
    
    
    // 輸入活動ID.員工編號.員工名稱 取出指定的某筆資料的Sid.報名狀況
    function getOnceSignUp($Aid,$Snumber,$Sname){
        $pdo = new dbPDO;

        $grammer = "SELECT `Sid`, `sign` FROM  `signUp` WHERE 
        `Aid` = :Aid AND `Snumber` = :Snumber AND `Sname` = :Sname";
        $paramArray = array(':Aid' => $Aid,
                            ':Snumber' => $Snumber,
                            ':Sname' => $Sname);
        $result = $pdo->selectOnce($grammer, $paramArray);
        
        // $pdo->closeConnection();
        return $result;
    }
    //修改某活動某個員工的報名狀況.攜伴人數
    function updateSignUp($Snumber,$Sname,$Aid,$together,$Sid){
        $pdo = new dbPDO;

        $grammer = "UPDATE `signUp` SET `Snumber`=:Snumber,`Sname`=:Sname,`Aid`=:Aid
        ,`sign`=1,`together`=:together WHERE `Sid` = :Sid";
        $paramArray = array(':Snumber' => $Snumber,
                            ':Sname' => $Sname,
                            ':Aid' => $Aid,
                            ':together' => $together,
                            ':Sid' => $Sid);
        $result = $pdo->change($grammer, $paramArray);
        
        return $result;
    }
    
    
}