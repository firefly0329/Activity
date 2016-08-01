<?php 
class B_setupActivity_con extends Controller{
    
    function mainProgarm(){
        $user = $this->model("B_setupActivity_model");
        $this->view("B_setupActivity_view");
        
    }
    
    
}

?>