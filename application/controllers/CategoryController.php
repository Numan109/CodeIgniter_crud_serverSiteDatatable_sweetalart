<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CategoryController extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('CategoryModel', 'category'); //category madel rename as category
    }


    public function index()
    {
        $this->load->view('category');
    }


    public function ajax_list()
    {
        $list = $this->category->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $category) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $category->category_name;
            $row[] = $category->created_at;
            $row[] = '<a href="edit/' . $category->id . '" class="btn btn-info btn-sm">Edit</a> 
                      <a href="delete/' . $category->id . '" class="btn btn-danger btn-sm">Delete</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->category->count_all(),
            "recordsFiltered" => $this->category->count_filtered(),
            "data" => $data,
        );

        // echo "<pre>";
        // print_r($output);
        // exit();
        //output to json format
        echo json_encode($output);
    }



    // ==================Insert data===============
    public function saveCategory()
    {
        $data = [];
        $data['category_name'] = $this->input->post('category_name');

        $this->db->insert('categories', $data);

        if ($this->db->insert_id() > 0) {
            $this->session->set_flashdata('success', 'Category Added successfully');
        } else {
            $this->session->set_flashdata('error', 'Something is wrong.');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }


    // =============================EDIT================

    public function edit()
    {
        $category_id = $this->uri->segment(3);
        $data['category'] = $this->db->where('id', $category_id)->get('categories')->result();
        $this->load->view('category_edit', $data);
    }


    // =============================Update================
    public function updateCategory()
    {
        $id = $this->input->post('category_id');

        $data = [];
        $data['category_name'] = $this->input->post('category_name');

        $this->db->where('id', $id);
        $this->db->update('categories', $data);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Category Updated successfully');
        } else {
            $this->session->set_flashdata('error', 'Something is wrong.');
        }

        redirect('CategoryController');
    }
}
