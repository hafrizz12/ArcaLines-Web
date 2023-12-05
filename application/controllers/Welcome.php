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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		require __DIR__ . '/vendor/autoload.php';
	  
		$options = array(
		  'cluster' => 'ap1',
		  'useTLS' => true
		);
		$pusher = new Pusher\Pusher(
		  '2945f9a3ee52c63acff7',
		  '90e5dc99c73e72236057',
		  '1697462',
		  $options
		);
	  
		$data['message'] = 'hello world';
		$pusher->trigger('HKrestaurant', 'admin', $data);

		$this->load->view('welcome_message');
	}
}
