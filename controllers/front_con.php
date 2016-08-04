<?php 
class front_con extends Controller{
    
    function FactivityList(){
        $activityModel = $this->model("activity_model");
        $activity = $activityModel->getActivity();
        $this->view("FactivityList",$activity);
    }
    
    function FsignUp($Aid,$message){
        $activityModel = $this->model("activity_model");
        $signUpModel = $this->model("signUp_model");
        
        $activity = $activityModel->getOnceActivity($Aid);
        $signUp = $signUpModel->getSignUp($Aid);
        $this->view("FsignUp",Array($activity,$signUp,$Aid,$message));
    }
    
    //============F活動清單=============
    function linkFsignUp(){
        if(isset($_POST['linkFsignUpBTN'])){
            $this->FsignUp($_POST['Aid'],"");
        }
        
    }
    //===========F活動報名================
    function signUp(){
        if(isset($_POST['signUpBTN'])){
            $signUpModel = $this->model("signUp_model");
            $activityModel = $this->model("activity_model");
            //輸入活動ID.員工編號.員工名稱 取出指定的某筆資料的Sid
            $sid_sign = $signUpModel->getOnceSignUp($_POST['Aid'],$_POST['Snumber'],$_POST['Sname']);
            //讀取(單筆)參加人數
            $OrderNumber = $activityModel->getOnceNumber($_POST['Aid']);
            if($sid_sign['sign'] == 1){
                $this->FsignUp($_POST['Aid'],"請勿重複報名!!!!");
            }else if($sid_sign['Sid'] == NULL){
                $this->FsignUp($_POST['Aid'],"您輸入的資訊錯誤");
            }else if($OrderNumber['number'] < ($_POST['together'] + 1)){
                $this->FsignUp($_POST['Aid'],"超出報名人數上限");
            }
            else{
                //修改某活動某個員工的報名狀況.攜伴人數
                $signUp = $signUpModel->updateSignUp($_POST['Snumber'],$_POST['Sname'],$_POST['Aid'],$_POST['together'],$sid_sign['Sid']);
                //修改參加人數
                $activity = $activityModel->updateAtoghther($_POST['Aid'],$_POST['together'],$OrderNumber['number']);
            }   
        }   
    }
}

?>