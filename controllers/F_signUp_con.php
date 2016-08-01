<?php 
class F_signUp_con extends Controller{
    
    function mainProgarm(){
        $user = $this->model("F_signUp_model");
        $this->view("F_signUp_view");
        
    }
    
    
}

?>