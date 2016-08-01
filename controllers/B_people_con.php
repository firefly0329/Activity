<?php 
class B_people_con extends Controller{
    
    function mainProgarm(){
        $user = $this->model("B_people_model");
        $this->view("B_people_view");
        
    }
    
    
}

?>