<?php 
class B_activityList_con extends Controller{
    
    function mainProgarm(){
        $user = $this->model("B_activityList_model");
        $this->view("B_activityList_view");
        
    }
    
    
}

?>