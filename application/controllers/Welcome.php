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


		$datas = $this->db->select('id,kata')->get('kata_dasar')->result_array();

		$vars['content'] = 'data_dasar';
		$vars['data_dasar'] = $datas;
		return $this->load->view('layout', $vars);

	}

	public function data_uji()
	{

		$total_dasar = $this->db->from('kata_dasar')->count_all_results();
		$data_uji = $this->db->select('id,kata')->get('kata_uji')->result_array();
		$hasilStem = $this->stem_view($data_uji);
		$vars['hasil_uji'] = $hasilStem;
		$vars['total_dasar'] = $total_dasar;
		$vars['total_uji'] = count($data_uji);
		$vars['total_found'] = $hasilStem['total']['found'];
		$vars['total_failed'] = $hasilStem['total']['failed'];
		$vars['content'] = 'data_uji';

		return $this->load->view('layout', $vars);

	}


	public function stem_view($data_uji)
	{
		$result = $this->db->get('kata_dasar');

		$dictionaries = array();

		foreach ($result->result_array() as $key => $res) {
			$dictionaries[$res['kata']] = $res['kata'];
		}	
		$configStem['dictionary'] = $dictionaries;

		$this->load->library('Stem', $configStem);

		$data_uji = $data_uji;

		$hasilUji = array();

		$count = 0;
		$countTrue = 0;
		$countFalse = 0;
		foreach ($data_uji as $uji) {

			$output = $this->stem->doStem($uji['kata']);
			

			$hasilUji['data'][$count]['id'] = $uji['id'];
			$hasilUji['data'][$count]['input'] = $uji['kata'];
			$hasilUji['data'][$count]['output'] = $output;
			$hasilUji['data'][$count]['result'] = $this->stem->isFound;
			$count++;

			if ($this->stem->isFound === true) {
				$countTrue++;
			} else {
				$countFalse++;
			}
		}
		$hasilUji['total']['found'] = $countTrue;
		$hasilUji['total']['failed'] = $countFalse;

		return $hasilUji;

	}


	public function get_all_data_dasar()
	{
		header('Content-Type: application/json');
		$this->datatables->select('id,kata');
		$this->datatables->from('kata_dasar');
		echo $this->datatables->generate();
	}

	
}
