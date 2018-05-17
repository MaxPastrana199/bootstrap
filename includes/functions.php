<?php
    function datetime(){
        date_default_timezone_set("Europe/Berlin");
        $currentTime=time();
        $timeFormat=strftime("%B-%d-%Y %H-%M-%S",$currentTime);
        return $timeFormat;
    }
    
    function error_message(){
        $output="<div class=\"alert alert-danger\">";
        $output.=htmlentities($_SESSION["CategoryMessage"]);
        $output.="</div>";
        $_SESSION["CategoryMessage"]=null;
        return $output;
    }
    function success_message(){
        $output="<div class=\"alert alert-success\">";
        $output.=htmlentities($_SESSION["SuccessMessage"]);
        $output.="</div>";
        $_SESSION["SuccessMessage"]=null;
        return $output;
    }
?>