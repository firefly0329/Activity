<?php 
class F_activityList_con extends Controller{
    
    function mainProgarm(){
        $user = $this->model("F_activityList_model");
        $this->view("F_activityList_view");
        
    }
    
    
}

?>