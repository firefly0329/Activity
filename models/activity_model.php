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
        
        // $pdo->closeConnection();
        return $result;
    }
    //抓單筆活動(url)
    function getOnceActivityUrl($url){
        $pdo = new dbPDO;

        $grammer = "SELECT * FROM  `activity` WHERE `url` = :url";
        $paramArray = array(':url' => $url);
        $result = $pdo->selectOnce($grammer, $paramArray);
        
        // $pdo->closeConnection();
        return $result;
    }
    //新增活動
    function setActivity($Aname,$startTime,$endTime,$numberUpper,$together,$content){
        $pdo = new dbPDO;

        $grammer = "INSERT INTO `activity`(`Aname`, `startTime`, `endTime`,`number`, `numberUpper`, `Atogether`, `content`,`url`) 
        VALUES (:Aname, :startTime, :endTime, :numberUpper, :numberUpper, :together, :content, SUBSTRING( MD5( RAND() ) FROM 1 FOR 10 ) )";
        $paramArray = array(':Aname' => $Aname,
                            ':startTime' => $startTime,
                            ':endTime' => $endTime,
                            ':numberUpper' => $numberUpper,
                            ':together' => $together,
                            ':content' => $content);
        $Aid = $pdo->change($grammer, $paramArray);
        $Aid = $pdo->lastInsertId();
        $grammer = "SELECT `url` FROM  `activity` WHERE `Aid` = :Aid";
        $paramArray = array(':Aid' => $Aid);
        $result = $pdo->selectOnce($grammer, $paramArray);
        
        // $pdo->closeConnection();
        return $result;
    }
    
    //抓(單筆)參加人數
    function getOnceNumber($Aid){
        $pdo = new dbPDO;

        $grammer = "SELECT `number` FROM  `activity` WHERE `Aid` = :Aid";
        $paramArray = array(':Aid' => $Aid);
        $result = $pdo->selectOnce($grammer, $paramArray);
        
        // $pdo->closeConnection();
        return $result;
    }
    //抓(單筆)參加人數，並且updata參加人數(row lock)
    function getOnceNumberUpdate($Aid,$toghtherADD){
        $pdo = new dbPDO;
        try{
            $pdo->linkConnection()->beginTransaction();
            $grammer = "SELECT `number` FROM  `activity` WHERE `Aid` = :Aid FOR UPDATE";
            $paramArray = array(':Aid' => $Aid);
            $OrderNumber = $pdo->selectOnce($grammer, $paramArray);
            // sleep(5);
            // $pdo2 = new dbPDO;
            $newNumber = $OrderNumber['number'] - ($toghtherADD + 1);
            if($newNumber >= 0){
                $grammer = "UPDATE `activity` SET `number` = :number WHERE `Aid` = :Aid";
                $paramArray = array(':number' => $newNumber,
                                    ':Aid' => $Aid);
                $result = $pdo->change($grammer, $paramArray);
                if($result > 0){
                    $msg = "報名成功";
                }else{
                    throw new Exception("報名失敗");
                }
            }else{
                throw new Exception("剩餘名額不足");
            }
            
            $pdo->linkConnection()->commit();
            
        }catch(Exception $err){
            
            $pdo->linkConnection()->rollback();
            $msg = $err->getMessage();
            
        }
        // $pdo->closeConnection();
        return $msg;
        

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