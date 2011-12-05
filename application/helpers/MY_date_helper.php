<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function time_diff($s){ 
    $m=0;$hr=0;$d=0;$td="now"; 
    if($s>59) { 
        $m = (int)($s/60); 
        $s = $s-($m*60); // sec left over 
        $td = "$m min"; 
    } 
    if($m>59){ 
        $hr = (int)($m/60); 
        $m = $m-($hr*60); // min left over 
        $td = "$hr hr"; if($hr>1) $td .= "s"; 
    } 
    if($hr>23 && $hr<168){ 
        $d = (int)($hr/24); 
        $hr = $hr-($d*24); // hr left over 
        $td = "$d day"; if($d>1) $td .= "s"; 
    }
    if($hr>167) {
    	$td = "more than a week ago";
    }
    return $td; 
} 

?>