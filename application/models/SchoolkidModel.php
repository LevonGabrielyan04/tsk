<?php
    class SchoolkidModel extends CI_Model
    {
        private $db;

        public function __construct()
        {
            parent::__construct();
            //$this->load->database();
            $this->db = $this->load->database('default',true);
        }
        
        public function insertSchoolkid($data)
        {
		    return $this->db->insert('schoolkid',$data);
        }

        public function insertMark($data)
        {
		    return $this->db->insert('marks',$data);
        }

        public function getSchoolkid()
        {
            $query = $this->db->get('schoolkid');
            return $query->result();
        }
        public function getschoolkidbyid($id)
        {
            $this->db->where('id', $id);
            $query = $this->db->get('schoolkid');
            return $query->row();
        }
        public function get_schoolkids($limit, $start) {
            $query = $this->db->get('schoolkid' ,$limit,$start);
            return $query->result();
        }
        public function editSchoolkid($id)
        {
            $query = $this->db->get_where('schoolkid',['id' => $id]);
            return $query->row();
        }
        public function editMarks($schoolkid_id,$semester){
            $query = $this->db->get_where('marks',['schoolkid_id' => $schoolkid_id,'semester'=>$semester]);
            return $query->row();
        }
        public function editMarksUpdate($marks_record_id){
            $query = $this->db->get_where('marks',['id' => $marks_record_id]);
            return $query->row();
        }
        public function updateSchoolkid($data, $id)
        {
            return $this->db->update('schoolkid', $data, ['id' => $id]);
        }
        public function updateMarks($data, $id)
        {
            return $this->db->update('marks', $data, ['id' => $id]);
        }
        public function deleteSchoolkid($id)
        {
            return $this->db->delete('schoolkid', ['id' => $id]); 
        }
        public function search_schoolkids($name,$class,$school)
        {
            if(!empty($class)){
                $this->db->where('class',$class);
            }
            if(!empty($school)){
                $this->db->where('school',$school);
            }
            $this->db->like('full_name', $name);
            $query = $this->db->get('schoolkid');
            return $query->result();
        }
        public function getMarks($id,$semster)
        {
            $query = $this->db->get_where('marks', ['schoolkid_id' => $id, 'semester' => $semster]);
            return $query->row();
        }

        public function get_count() {
            return $this->db->count_all('schoolkid');
        }
    }
?>