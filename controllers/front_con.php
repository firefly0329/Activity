<?php 
class front_con extends Controller{
    
    function FactivityList(){
        $activityModel = $this->model("activity_model");
        $activity = $activityModel->getActivity();
        $this->view("FactivityList",$activity);
    }
    
    function FsignUp($Aid){
        $activityModel = $this->model("activity_model");
        $signUpModel = $this->model("signUp_model");
        
        $activity = $activityModel->getOnceActivity($Aid);
        $signUp = $signUpModel->getSignUp($Aid);
        $this->view("FsignUp",Array($activity,$signUp,$Aid));
    }
    
    //============F活動清單=============
    function linkFsignUp(){
        if(isset($_POST['linkFsignUpBTN'])){
            $this->FsignUp($_POST['Aid']);
        }
        
    }
    //===========F活動報名================
    function signUp(){
        if(isset($_POST['signUpBTN'])){
            $signUpModel = $this->model("signUp_model");
            $signUpModel->getOnceSignUp();
        }
        
    }
}

?>