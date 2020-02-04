<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Model {

    function __construct(){
        parent::__construct();
        $temp =  $this->session->userdata("notification");
        if(empty($temp)){
        	$this->reset();
        }
    }
    function reset(){
    	$this->session->set_userdata("notification", array("error" => array(), "warning" => array(), "success" => array()));
    }
    function add($type, $msg){
		$temp = $this->session->userdata("notification");
    	$temp[$type][] = $msg;
    	$this->session->set_userdata("notification", $temp);
    }
    function success($msg){ $this->add("success", $msg); }
    function warning($msg){ $this->add("warning", $msg); }
    function error($msg){ $this->add("error", $msg); }

    function display(){
    	$temp = $this->session->userdata("notification");
    	$html = '';
    	foreach ($temp as $type => $value) {
    		foreach ($value as $msg) {
                if($type=='success'){
                    $html .= '<div id="sweet_success"><div class="swal2-container swal2-fade swal2-shown" style="overflow-y: auto;"><div role="dialog" aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-modal swal2-show" tabindex="-1" style="width: 500px; padding: 20px; background: rgb(255, 255, 255); display: block; min-height: 319px;"><ul class="swal2-progresssteps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"><span class="swal2-x-mark"><span class="swal2-x-mark-line-left"></span><span class="swal2-x-mark-line-right"></span></span></div><div class="swal2-icon swal2-question" style="display: none;">?</div><div class="swal2-icon swal2-warning" style="display: none;">!</div><div class="swal2-icon swal2-info" style="display: none;">i</div><div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: block;"><div class="swal2-success-circular-line-left" style="background: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip swal2-animate-success-line-tip"></span> <span class="swal2-success-line-long swal2-animate-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title">Good job!</h2><div id="swal2-content" class="swal2-content" style="display: block;">'.$msg.'</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><output></output><input type="range"></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validationerror" style="display: none;"></div><div class="swal2-buttonswrapper" style="display: block;"><button type="button" onclick="hidden_sweet()" id="event_sweet" class="swal2-confirm swal2-styled" style="background-color: rgb(48, 133, 214); border-left-color: rgb(48, 133, 214); border-right-color: rgb(48, 133, 214);">OK</button><button type="button" class="swal2-cancel swal2-styled" style="display: none; background-color: rgb(170, 170, 170);">Cancel</button></div><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div></div></div>';
                }else{
                    $html .= '<div id="sweet_success"><div class="swal2-container swal2-fade swal2-shown" style="overflow-y: auto;"><div role="dialog" aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-modal swal2-show" tabindex="-1" style="width: 500px; padding: 20px; background: rgb(255, 255, 255); display: block; min-height: 319px;"><ul class="swal2-progresssteps" style="display: none;"></ul><div class="swal2-icon swal2-error swal2-animate-error-icon" style="display: block;"><span class="swal2-x-mark swal2-animate-x-mark"><span class="swal2-x-mark-line-left"></span><span class="swal2-x-mark-line-right"></span></span></div><h2 class="swal2-title" id="swal2-title">Oops...</h2><div id="swal2-content" class="swal2-content" style="display: block;">'.$msg.'</div><div class="swal2-buttonswrapper" style="display: block;"><button type="button" id="event_sweet" onclick="hidden_sweet()" class="swal2-confirm swal2-styled" style="background-color: rgb(48, 133, 214); border-left-color: rgb(48, 133, 214); border-right-color: rgb(48, 133, 214);">OK</button></div></div></div></div>';
                }
    		}
    	}
    	$this->reset();
    	return $html;
    }
    function counterror(){
        $temp = $this->session->userdata("notification");
        return count($temp["error"]);
    }
}
?>