<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Systems\{ Request, Validator, Session };
use Exception;
use thiagoalessio\TesseractOCR\TesseractOCR;

class HomeController extends Controller{

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * This method is for the welcome page view
	 * 
	 * @return Response
	 */
	public function index()
	{
		return $this->redirect('/ocr');
	}

	/**
	 * This method is for getting the request
	 * 
	 * @param  Request $request 
	 * @return String
	 */
	public function getOCR()
	{
		echo $this->twig->render('ocr.php', [ 
			'error' => $this->getSession('error') ,
			'info' => $this->getSession('info') ,
			'pix' => $this->getSession('pix')
		]);
	}

	/**
	 * This method is for converting images to text
	 * 
	 * @param  Request $request 
	 * @return String
	 */
	public function postOCR(Request $request)
	{
		//Validate input request
		$check = Validator::check($request->all(),[
			"picture" => ["required","file"]
		]);

		if (!$check) return $this->redirect('/ocr');

		$filepath = $request->get('picture');

		$data = file_get_contents($filepath['tmp_name']);

		$type = pathinfo($filepath['tmp_name'], PATHINFO_EXTENSION);

		$info = ( new TesseractOCR($filepath['tmp_name']) )->run();

		empty($info) ? Session::put('error', 'No convertable text in image !') : Session::put('info', $info) ;

		Session::put('pix', 'data:image/'.$type.';base64,'.base64_encode($data) );

		$this->redirect('/');
	}
}