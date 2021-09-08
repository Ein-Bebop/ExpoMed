<?php 
        if(isset($_COOKIE['1be067584467e484c5bfc571bb26ef73'])){ 
                
                unset($_COOKIE['1be067584467e484c5bfc571bb26ef73']);
                setcookie('1be067584467e484c5bfc571bb26ef73', null, -1, '/'); 
                unset($_COOKIE['f8032d5cae3de20fcec887f395ec9a6a']);
                setcookie('f8032d5cae3de20fcec887f395ec9a6a', null, -1, '/'); 
            
                header("location: ../");
        }else{
                header("location: ../");
        }
        
?>