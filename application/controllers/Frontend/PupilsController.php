<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PupilsController extends CI_Controller
{
    public $SchoolkidModel;
    public $input;
    public $form_validation;
    public $pagination;
    public $config;
    public $uri;
    public function __construct()
    {
        parent::__construct();
        require_once(APPPATH . '../system/core/Model.php');
        require_once(APPPATH . 'models/SchoolkidModel.php');

        //$this->load->model('SchoolkidModel');
        $this->SchoolkidModel = new SchoolkidModel;

        $this->input = new CI_Input();

        //$this->load->library('form_validation');
        $this->form_validation = new CI_Form_validation();

        //$this->load->library('pagination');
        $this->pagination = new CI_Pagination;

        $this->uri = new CI_URI();


        
    }
    
    public function index($page)
    {
        $per_page = 3;
        $config['base_url'] = base_url('pupils');
        $config['total_rows'] = $this->SchoolkidModel->get_count();
        $config['per_page'] = $per_page;
		$config['enable_query_strings']= true;
		$config['use_page_numbers']= true;
		$config['query_string_segment'] = 'page';
		$config['reuse_query_string']= true;
        $config['first_link']= 'First';
		$config['last_link']= 'Last';
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        
        $this->pagination->initialize($config);

        $start_index=0;
		if($page != 0)
		{
			$start_index = $per_page * ($page - 1);
		}

        $data['links'] = $this->pagination->create_links();
        $data['schoolkid'] = $this->SchoolkidModel->get_schoolkids($per_page, $start_index);
        $this->load->view('frontend/pupils',$data);
    }
    public function create()
    {
        $this->load->view('frontend/create');
    }
    public function store()
    {
        $this->form_validation->set_rules('school','School','trim|required');
        $this->form_validation->set_rules('full_name','Full Name','trim|required');
        $this->form_validation->set_rules('class','Class','trim|required|numeric|greater_than_equal_to[1]|less_than_equal_to[12]');
        $this->form_validation->set_rules('average_mark_first_semester','Average Mark First Semester','trim|required|numeric|greater_than_equal_to[1]|less_than_equal_to[10]');
        $this->form_validation->set_rules('average_mark_second_semester','Average Mark Second Semester','trim|required|numeric|greater_than_equal_to[1]|less_than_equal_to[10]');
        $this->form_validation->set_rules('average_mark','Average Mark','trim|required|numeric|greater_than_equal_to[1]|less_than_equal_to[10]');

        if($this->form_validation->run())
        {
            $data=[
                'school' => $this->input->post('school'),
                'full_name'=> $this->input->post('full_name'),
                'class' => $this->input->post('class'),
                'average_mark_first_semester'=>$this->input->post('average_mark_first_semester'),
                'average_mark_second_semester'=>$this->input->post('average_mark_second_semester'),
                'average_mark'=>$this->input->post('average_mark')
            ];
            //$this->SchoolkidModel->insertSchoolkid($this->form_validation->get_validated());
            $this->SchoolkidModel->insertSchoolkid($data);
            redirect(base_url('pupils'));
        }
        else
        {
            $this->load->view('frontend/create');
        }   
    }
    public function store_marks()//($schoolkid_id,$semster)
    {
        $schoolkid_id = $this->uri->segment(3);
        $semster = $this->uri->segment(4);

        $this->form_validation->set_rules('math','Math','trim|required|numeric|greater_than_equal_to[1]|less_than_equal_to[10]');
        $this->form_validation->set_rules('phisics','Phisics','trim|required|numeric|greater_than_equal_to[1]|less_than_equal_to[10]');
        $this->form_validation->set_rules('history','History','trim|required|numeric|greater_than_equal_to[1]|less_than_equal_to[10]');

        if($this->form_validation->run())
        {
            $data=[
                'semester' => $semster,
                'schoolkid_id'=>$schoolkid_id,
                'mathemeatics_mark' => $this->input->post('math'),
                'phisics_mark'=> $this->input->post('phisics'),
                'history_mark' => $this->input->post('history')
            ];
            $this->SchoolkidModel->insertMark($data);
            redirect(base_url('pupils/view/'.$schoolkid_id));
        }
        else
        {
            $this->load->view('frontend/create_marks');
        } 
    }
    public function updateMarks()
    {
        $marks_record_id = $this->uri->segment(3);
        $data['marks'] = $this->SchoolkidModel->editMarksUpdate($marks_record_id);

        $this->form_validation->set_rules('math','Math','trim|required|numeric|greater_than_equal_to[1]|less_than_equal_to[10]');
        $this->form_validation->set_rules('phisics','Phisics','trim|required|numeric|greater_than_equal_to[1]|less_than_equal_to[10]');
        $this->form_validation->set_rules('history','History','trim|required|numeric|greater_than_equal_to[1]|less_than_equal_to[10]');

        if($this->form_validation->run())
        {
            $data=[
                //'id' => $marks_record_id,
                'mathemeatics_mark' => $this->input->post('math'),
                'phisics_mark'=> $this->input->post('phisics'),
                'history_mark' => $this->input->post('history')
            ];
            $this->SchoolkidModel->updateMarks($data,$marks_record_id);
            redirect(base_url('pupils'));
        }
        else
        {
            $this->load->view('frontend/create_marks');
        } 
    }
    public function edit($id)
    {
        $data['schoolkid'] = $this->SchoolkidModel->editSchoolkid($id);
        $this->load->view('frontend/edit',$data);
    }
    public function editMarks()
    {
        $marks_record_id = $this->uri->segment(3);
        $data['marks'] = $this->SchoolkidModel->editMarksUpdate($marks_record_id);
        $this->load->view('frontend/create_marks',$data);
    }
    public function createMarks(){
        $schoolkid_id = $this->uri->segment(3);
        $semster = $this->uri->segment(4);
        $data['marks'] = $this->SchoolkidModel->editMarks($schoolkid_id,$semster);
        $this->load->view('frontend/create_marks',$data);
    }
    public function update($id)
    {
        $this->form_validation->set_rules('school','School','trim|required');
        $this->form_validation->set_rules('full_name','Full Name','trim|required');
        $this->form_validation->set_rules('class','Class','trim|required|numeric|greater_than_equal_to[1]|less_than_equal_to[12]');
        $this->form_validation->set_rules('average_mark_first_semester','Average Mark First Semester','trim|required|numeric|greater_than_equal_to[1]|less_than_equal_to[10]');
        $this->form_validation->set_rules('average_mark_second_semester','Average Mark Second Semester','trim|required|numeric|greater_than_equal_to[1]|less_than_equal_to[10]');
        $this->form_validation->set_rules('average_mark','Average Mark','trim|required|numeric|greater_than_equal_to[1]|less_than_equal_to[10]');
        if($this->form_validation->run())
        {
            $data=[
                'school' => $this->input->post('school'),
                'full_name'=> $this->input->post('full_name'),
                'class' => $this->input->post('class'),
                'average_mark_first_semester'=>$this->input->post('average_mark_first_semester'),
                'average_mark_second_semester'=>$this->input->post('average_mark_second_semester'),
                'average_mark'=>$this->input->post('average_mark')
            ];
            $this->SchoolkidModel->updateSchoolkid($data, $id);
            redirect(base_url('pupils'));
        }
        else
        {
            $this->edit($id);
        }
    }
    public function delete($id)
    {
        $this->SchoolkidModel->deleteSchoolkid($id);
        redirect(base_url('pupils'));
    }

    public function search()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('class', 'Class', 'trim');
        $this->form_validation->set_rules('school', 'School', 'trim');

        if ($this->form_validation->run())
        {
            $name = $this->input->post('name');
            $class = $this->input->post('class');
            $school = $this->input->post('school');
            $data['results'] = $this->SchoolkidModel->search_schoolkids($name,$class,$school);
            $this->load->view('frontend/search_results', $data);
        }
        else
        {
            $data['links'] = $this->pagination->create_links();
            $data['schoolkid'] = $this->SchoolkidModel->getSchoolkid();
            $this->load->view('frontend/pupils',$data);
        }
    }

    public function view($id)
    {
        $data['schoolkid'] = $this->SchoolkidModel->getschoolkidbyid($id);
        $data['firstSemester'] = $this->SchoolkidModel->getMarks($id,1);
        $data['secondSemester'] = $this->SchoolkidModel->getMarks($id,2);
        $data['overall'] = $this->SchoolkidModel->getMarks($id,3);
        $this->load->view('frontend/schoolkid_details', $data);
    }

}
?>