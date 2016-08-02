<?php 
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
    
    
    function linkActivityBTN(){
        if(isset($_POST['linkActivityBTN'])){
            $this->Bpeople($_POST['linkActivityBTN']);
        }
        
        
    }
    
    function newPeople(){
        $mypModel = $this->model("signUp_model");
        if(isset($_POST['newPeople'])){
            $mypModel->setSignUp($_POST['Aid']);
        }
        $this->Bpeople($_POST['Aid']);
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