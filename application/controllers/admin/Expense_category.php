<?php

		    class Expense_category extends MY_Controller{



		    	public function __construct()

	    {

	        parent::__construct();

	        $this->load->model('Expense_category_model');

	        $this->module = 'expense_category';

	        $this->user_type = $this->session->userdata('user_type');

	        $this->id = $this->session->userdata('user_id');

	        $this->permission = $this->get_permission($this->module,$this->user_type);

	    }public function index()

		{

			if ( $this->permission['view'] == '0' && $this->permission['view_all'] == '0' ) 

			{

				redirect('admin/home');

			}

			$this->data['title'] = 'Expense_category';

			if ( $this->permission['view_all'] == '1'){$this->data['expense_category'] = $this->Expense_category_model->all_rows('expense_category');}

			elseif ($this->permission['view'] == '1') {$this->data['expense_category'] = $this->Expense_category_modelget_rows('expense_category',array('user_id'=>$this->id));}

			$this->data['permission'] = $this->permission;

			$this->load->template('admin/expense_category/index',$this->data);

		}public function create()

		{

			if ( $this->permission['created'] == '0') 

			{

				redirect('admin/home');

			}

			$this->data['title'] = 'Create Expense_category';$this->load->template('admin/expense_category/create',$this->data);

		}

		public function insert()

		{

			if ( $this->permission['created'] == '0') 

			{

				redirect('admin/home');

			}

			$data = $this->input->post();

			$data['user_id'] = $this->session->userdata('user_id');$id = $this->Expense_category_model->insert('expense_category',$data);

			if ($id) {

				redirect('admin/expense_category');

			}

		}public function edit($id)

		{

			if ($this->permission['edit'] == '0') 

			{

				redirect('admin/home');

			}

			$this->data['title'] = 'Edit Expense_category';

			$this->data['expense_category'] = $this->Expense_category_model->get_row_single('expense_category',array('id'=>$id));$this->load->template('admin/expense_category/edit',$this->data);

		}



		public function update()

		{

			if ( $this->permission['edit'] == '0') 

			{

				redirect('admin/home');

			}

			$data = $this->input->post();

			$id = $data['id'];

			unset($data['id']);$id = $this->Expense_category_model->update('expense_category',$data,array('id'=>$id));

			if ($id) {

				redirect('admin/expense_category');

			}

		}public function delete($id)

		{

			if ( $this->permission['deleted'] == '0') 

			{

				redirect('admin/home');

			}

			$this->Expense_category_model->delete('expense_category',array('id'=>$id));

			redirect('admin/expense_category');

		}
		public function delete_expense_cat()
		{
			$id = $this->input->post('id');
			$this->Expense_category_model->delete('expense_category',array('id'=>$id));

			redirect('admin/expense_category');
		}
	}