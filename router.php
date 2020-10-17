<?php
class Router {
    public static function Init(){
        unset($_GET); $_GET = array(); $i=0;
        foreach(explode('/', substr($_SERVER['REQUEST_URI'], 1)) as $RoutePart){$_GET[$i] = $RoutePart;$i++;}

        $activepage = $_GET[0];
        if($activepage == ""){
            $activepage = "home";
        }

        if(file_exists('pages/page_' . $activepage . '.php')) {
            require 'pages/page_' . $activepage . '.php';
                Page();
        } else {
             echo "Page ".$activepage." does not exist";
        }
    }
}
?>
