<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function text_to_speech(){
	    $text = "Bonjour, comment allez vous ?";
	    $lang = 'fr';
	    $text = htmlentities($text);
	    $text = rawurlencode($text);
	    $mp3 = file_get_contents(
	        'https://translate.google.com.vn/translate_tts?ie=UTF-8&q='.$text.'&tl='.$lang.'&client=gtx');
	   	$player ="<audio controls='controls' autoplay>
	   			<source src = 'data:audio/mpeg;base64,".base64_encode($mp3)."'>
	   			</audio>";
	    $this->load->view('welcome_message', [
	    	'file'=>$player,
	    ]);
	}

	public function text_to_speech2(){
		$this->load->helper('url');
		$this->load->view('welcome_message',[
			'text'=>'Hello world! Hello Dunia, Hello Dunia, Makan siang dulu!',
		]);
	}
}
