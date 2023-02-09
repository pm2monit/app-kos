<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\MsUsersModel;

class MsUsers extends BaseController {
	
    protected $msUsersModel;
    protected $validation;
	
	public function __construct()
	{
	    $this->msUsersModel = new MsUsersModel();
       	$this->validation =  \Config\Services::validation();
		
	}
	
	public function index() {
	    $data = [
                'controller'    	=> 'msUsers',
                'title'     		=> 'List Users'				
			];
		return view('msUsers', $data);
	}

	public function getAll() {
 		$response = $data['data'] = array();	
		$totalRecord = $this->msUsersModel->select()->countAllResults();
    
		$postData = $this->request->getPost('data');
		$draw = $postData['draw'];
		$start = $postData['start'];
		$rowperpage = $postData['length'];
		$columnIndex = $postData['order'][0]['column']; 
    $columnName = $postData['columns'][$columnIndex]['data']; 
    $columnSortOrder = $postData['order'][0]['dir'];
    $searchValue = $postData['search']['value'];

		$result = $this->msUsersModel->select()->findAll($rowperpage, $start);
		
		
		$data = array();
		foreach ($result as $value) {
			
			$ops = '<div class="btn-group">
						<button type="button" class="btn btn-primary" onClick="view('. $value->id .')"><i class="far fa-eye"></i></button>
						<button type="button" class="btn btn-success" onClick="save('. $value->id .')"><i class="fas fa-edit"></i></button>
						<button type="button" class="btn btn-danger" onClick="remove('. $value->id .')"><i class="far fa-trash-alt"></i></button>
					</div>';


			$data[]= array(
				$value->id,
				$value->email,
				$value->username,
				$ops		
			);
		} 

		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecord,
			"iTotalDisplayRecords" => $totalRecord,
			"aaData" => $data,
			"token" => csrf_hash() 
		);

		return $this->response->setJSON($response);		
	}
	
	public function getOne()
	{
 		$response = array();
		$id = $this->request->getPost('id');
		if ($this->validation->check($id, 'required|numeric')) {
			$data = $this->msUsersModel->where('id' ,$id)->first();
			$response = array(
				'data' => $data,
				'token' => csrf_hash() 
			);
			return $this->response->setJSON($response);	
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}	
	}	

	public function add()
	{
        $response = array();

		$fields['id'] = $this->request->getPost('id');
		$fields['email'] = $this->request->getPost('email');
		$fields['username'] = $this->request->getPost('username');
		
        $this->validation->setRules([
			'email' => ['label' => 'Email', 'rules' => 'required|valid_email|min_length[0]|max_length[255]|is_unique[users.email,id,{id}]'],
            'username' => ['label' => 'Username', 'rules' => 'permit_empty|min_length[0]|max_length[30]|is_unique[users.username,id,{id}]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {
            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form
        } else {
            if ($this->msUsersModel->insert($fields)) {								
                $response['success'] = true;
                $response['messages'] = lang("App.insert-success") ;	

            } else {
                $response['success'] = false;
                $response['messages'] = lang("App.insert-error") ;
            }
        }
		$response['token'] = csrf_hash();
        return $this->response->setJSON($response);
	}

	public function edit()
	{
        $response = array();
		$fields['id'] = $this->request->getPost('id');
		$fields['email'] = $this->request->getPost('email');
		$fields['username'] = $this->request->getPost('username');

        $this->validation->setRules([
			'email' => ['label' => 'Email', 'rules' => 'required|valid_email|min_length[0]|max_length[255]|is_unique[users.email,id,{id}]'],
            'username' => ['label' => 'Username', 'rules' => 'permit_empty|min_length[0]|max_length[30]|is_unique[users.username,id,{id}]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form

        } else {

            if ($this->msUsersModel->update($fields['id'], $fields)) {
				
                $response['success'] = true;
                $response['messages'] = lang("App.update-success");	
				
            } else {
				
                $response['success'] = false;
                $response['messages'] = lang("App.update-error");
				
            }
        }
		$response['token'] = csrf_hash();
        return $this->response->setJSON($response);	
	}
	
	public function remove()
	{
		$response = array();
		$id = $this->request->getPost('id');
		
		if (!$this->validation->check($id, 'required|numeric')) {

			throw new \CodeIgniter\Exceptions\PageNotFoundException();
			
		} else {	
		
			if ($this->msUsersModel->where('id', $id)->delete()) {
								
				$response['success'] = true;
				$response['messages'] = lang("App.delete-success");	
				
			} else {
				
				$response['success'] = false;
				$response['messages'] = lang("App.delete-error");
				
			}
		}	
		$response['token'] = csrf_hash();
        return $this->response->setJSON($response);		
	}	
		
}	
