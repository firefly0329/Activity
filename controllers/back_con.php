<?php 
header("Content-Type:text/html; charset=utf-8");
class back_con extends Controller{
    
    function BactivityList(){
        $mypModel = $this->model("activity_model");
        $activity = $mypModel->getActivity();
        $this->view("BactivityList",$activity);
    }
    function BsetupActivity(){
        $activityModel = $this->model("activity_model");
        $activity = $activityModel->getActivity();
        $this->view("BsetupActivity");
    }
    function Bpeople($Aid){
        $activityModel = $this->model("activity_model");
        $signUpModel = $this->model("signUp_model");
        
        $activity = $activityModel->getActivity($Aid);
        $signUp = $signUpModel->getSignUp($Aid);
        $this->view("Bpeople",Array($activity,$signUp,$Aid));
    }
    
    //===============活動清單==============
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
    
    //===============新增人員==================
    function newPeople(){
        $mypModel = $this->model("signUp_model");
        if(isset($_POST['newPeople'])){
            $mypModel->setSignUp($_POST['Snumber'],$_POST['Sname'],$_POST['Aid']);
            $this->Bpeople($_POST['Aid']);
        }
        
    }
    //===============新增活動===================
    function newActivity(){
        $mypModel = $this->model("activity_model");
        if(isset($_POST['newActivityBTN'])){
            // echo $_POST['together'];
            $mypModel->setActivity($_POST['Aname'],$_POST['startTime'],$_POST['endTime']
            ,$_POST['numberUpper'],$_POST['together'],$_POST['content']);
        }
        
        
    }
    
    
    
    
    
    
    
    // function addEmp(){
    //     $mypdo = $this->model("B_people_model");
    //     $Aid = $_POST['Aid'];
    //     if(isset($_POST['submit'])){
    //         $mypdo->decision($Aid);
    //     }
    //     $this->mainProgarm($Aid);
    // }
    
    
}

?>