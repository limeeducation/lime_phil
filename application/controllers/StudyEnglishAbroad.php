<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//어학연수 컨트롤러
class StudyEnglishAbroad extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper(array('url', 'cookie', 'script', 'login'));
		$this->load->model(array('admin_model','admin_student_model','school_model'));
	}
	public function index()
	{
		$this->usAcademyList();
	}

	//미국 어학연수 학교찾기
	public function usAcademyList($city = null){
		$school_list = $this->school_model->getSchool('US');
		foreach($school_list as $school){

			$program_list = $this->school_model->getPrograms($school->en_aca_city_idx);
			$school->program = $program_list;

		}
		$data = array();
		$data['city'] = "";
		if(!empty($city)){
			$data['city'] = $city;
		}
		$data['school_list'] = $school_list;
		$this->load->view('stdEngAbrd/usAcademyList', $data);
	}

	//커리큘럼 상세 호출 api
	public function apiGetProgramDetail(){
		$idx = $this->input->post('idx');
		$details = $this->school_model->getProgramDetail($idx);
		echo json_encode($details);
	}

	//숙소 정보+학교소개 상세 호출 api
	public function apiGetDormitoryDetail(){
		$idx = $this->input->post('idx');
		$aca_idx = $this->input->post('aca_idx');
		$details = $this->school_model->getDormitoryDetail($idx);
		$details['intro'] = $this->school_model->getSchoolIntro($aca_idx)[0];
		echo json_encode($details);
	}

	//왜 미국 영어 페이지 호출
	public function whyStudyEngUs(){
		$this->load->view('stdEngAbrd/whyStudyEngUs');
	}

	//캐나다 어학연수 학교찾기
	public function caAcademyList($city = null){
		$school_list = $this->school_model->getSchool('CA');
		foreach($school_list as $school){

			$program_list = $this->school_model->getPrograms($school->en_aca_city_idx);
			$school->program = $program_list;

		}
		$data = array();
		$data['city'] = "";
		if(!empty($city)){
			$data['city'] = $city;
		}
		$data['school_list'] = $school_list;
		$this->load->view('stdEngAbrd/caAcademyList', $data);
	}

	//왜 캐나다 영어 페이지 호출
	public function whyStudyEngCa(){
		$this->load->view('stdEngAbrd/whyStudyEngCa');
	}

	//필리핀 어학연수 리스트 페이지 호출
	public function philAcademyList($dist = null){
		if($dist == 'etc') $dist = null;
		$school_list = $this->school_model->getPhilSchools($dist);
		$data = array();
		$data['school_list'] = $school_list;
		$data['dist'] = $dist;
		$this->load->view('stdEngAbrd/philAcademyList', $data);
	}

	//필리핀 어학원 상세 호출 api
	public function apiGetPhAcaDetail(){
		$idx = $this->input->post('idx');
		$details['info'] = $this->school_model->getPhBaseInfo($idx);
		$details['sns'] = $this->school_model->getPhSns($idx);
		$details['curri'] = $this->school_model->getPhCurri($idx);
		$details['dorm'] = $this->school_model->getPhDrom($idx);
		$details['long_term'] = $this->school_model->getLongTerm($idx);
		$details['photo'] = $this->school_model->getPhoto($idx);
		echo json_encode($details);
	}

	public function apiGetPhCurriDetail(){
		$idx = $this->input->post('idx');
		$details['curri'] = $this->school_model->getCurriDetail($idx);
		echo json_encode($details);
	}
}

