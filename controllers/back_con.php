<?php 
header("Content-Type:text/html; charset=utf-8");
class back_con extends Controller{
    
    function BactivityList($message=""){
        $activityModel = $this->model("activity_model");
        $activity = $activityModel->getActivity();
        $this->view("BactivityList",array($activity,$message));
    }
    function BsetupActivity(){
        $activityModel = $this->model("activity_model");
        $activity = $activityModel->getActivity();
        $this->view("BsetupActivity");
    }
    function Bpeople($Aid){
        $activityModel = $this->model("activity_model");
        $signUpModel = $this->model("signUp_model");
        
        $activity = $activityModel->getOnceActivity($Aid);
        $signUp = $signUpModel->getSignUp($Aid);
        $this->view("Bpeople",Array($activity,$signUp,$Aid));
    }
    
    //===============B活動清單==============
    //詳細資料
    function linkBpeople(){
        if(isset($_POST['linkBpeopleBTN'])){
            $this->Bpeople($_POST['Aid']);
        } 
    }
    //新增活動
    function linkSetupActivit(){
        if(isset($_POST['linkSetupActivitBTN'])){
            // $this->BsetupActivity();
            header("location: /Activity/back_con/BsetupActivity");
        } 
    }
    
    //===============B新增員工==================
    function newPeople(){
        $mypModel = $this->model("signUp_model");
        if(isset($_POST['newPeople'])){
            $mypModel->setSignUp($_POST['Snumber'],$_POST['Sname'],$_POST['Aid']);
            $this->Bpeople($_POST['Aid']);
        }
        
    }
    //===============B新增活動===================
    function newActivity(){
        $mypModel = $this->model("activity_model");
        if(isset($_POST['newActivityBTN'])){
            // echo $_POST['together'];
            $url = $mypModel->setActivity($_POST['Aname'],$_POST['startTime'],$_POST['endTime']
            ,$_POST['numberUpper'],$_POST['together'],$_POST['content']);
            
            $meaasge = "https://leb-firefly0329.c9users.io/Activity/front_con/FsignUpUrl/" . $url['url'];
            $this->BactivityList($meaasge);
        }     
    }
    //==============AJAX即時更新人數(單筆活動報名人數)=================
    function ajaxGetNumber($Aid){
        $mypModel = $this->model("activity_model");
        $result = $mypModel->getOnceNumber($Aid);
        // echo $result['number'];
        $this->view("ajaxEcho",$result['number']);
    }
    //==============AJAX即時更新人數(多筆活動報名人數)=================
    // function ajaxGetNumber($Aid){
    //     $mypModel = $this->model("activity_model");
    //     $result = $mypModel->getActivity($Aid);
    //     // echo $result['number'];
    //     $this->view("ajaxEcho",$result[]['number']);
    // }
    
    
    
    

    
    
}

?>