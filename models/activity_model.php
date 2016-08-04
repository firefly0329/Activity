<?php 
class activity_model{
    //抓全部活動
    function getActivity(){
        $pdo = new dbPDO;

        $grammer = "SELECT * FROM  `activity`";
        $paramArray = array();
        $result = $pdo->selectAll($grammer,$paramArray);
        
        return $result;
    }
    //抓單筆活動
    function getOnceActivity($Aid){
        $pdo = new dbPDO;

        $grammer = "SELECT * FROM  `activity` WHERE `Aid` = :Aid";
        $paramArray = array(':Aid' => $Aid);
        $result = $pdo->selectOnce($grammer, $paramArray);
        
        return $result;
    }
    //新增活動
    function setActivity($Aname,$startTime,$endTime,$numberUpper,$together,$content){
        $pdo = new dbPDO;

        $grammer = "INSERT INTO `activity`(`Aname`, `startTime`, `endTime`, `numberUpper`, `Atogether`, `content`) 
        VALUES (:Aname, :startTime, :endTime, :numberUpper, :together, :content)";
        $paramArray = array(':Aname' => $Aname,
                            ':startTime' => $startTime,
                            ':endTime' => $endTime,
                            ':numberUpper' => $numberUpper,
                            ':together' => $together,
                            ':content' => $content);
        $result = $pdo->change($grammer, $paramArray);
        
        return $result;
    }
    
    //抓(單筆)參加人數
    function getOnceNumber($Aid){
        $pdo = new dbPDO;

        $grammer = "SELECT `number` FROM  `activity` WHERE `Aid` = :Aid";
        $paramArray = array(':Aid' => $Aid);
        $result = $pdo->selectOnce($grammer, $paramArray);
        
        return $result;
    }
    
    //修改參加人數
    function updateAtoghther($Aid,$toghtherADD,$OrderNumber){
        $pdo = new dbPDO;
        
        $newNumber = $OrderNumber - ($toghtherADD + 1);
        $grammer = "UPDATE `activity` SET `number` = :number WHERE `Aid` = :Aid";
        $paramArray = array(':number' => $newNumber,
                            ':Aid' => $Aid);
        $result = $pdo->change($grammer, $paramArray);
        
        return $result;
    }
}



?>