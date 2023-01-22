<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MskamarModel;

class Mskamar extends BaseController {
	
    protected $mskamarModel;
    protected $validation;
	protected $helpers = ['url', 'form'];
	
	public function __construct()
	{
	    $this->mskamarModel = new MskamarModel();
       	$this->validation =  \Config\Services::validation();
		
	}
	
	public function index()
	{

	    $data = [
                'controller'    	=> 'mskamar',
                'title'     		=> 'ms_kamar'				
			];
		
		return view('mskamar', $data);
			
	}

	public function getAll()
	{
 		$response = $data['data'] = array();	

		$result = $this->mskamarModel->select()->findAll();
		
		foreach ($result as $key => $value) {
							
			$ops = '<div class="btn-group">';
			$ops .= '<button type="button" class=" btn btn-sm dropdown-toggle btn-info" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
			$ops .= '<i class="fa-solid fa-pen-square"></i>  </button>';
			$ops .= '<div class="dropdown-menu">';
			$ops .= '<a class="dropdown-item text-info" onClick="save('. $value->id .')"><i class="fa-solid fa-pen-to-square"></i>   ' .  lang("App.edit")  . '</a>';
			$ops .= '<a class="dropdown-item text-orange" ><i class="fa-solid fa-copy"></i>   ' .  lang("App.copy")  . '</a>';
			$ops .= '<div class="dropdown-divider"></div>';
			$ops .= '<a class="dropdown-item text-danger" onClick="remove('. $value->id .')"><i class="fa-solid fa-trash"></i>   ' .  lang("App.delete")  . '</a>';
			$ops .= '</div></div>';

			$data['data'][$key] = array(
				$value->id,
				$value->kode_pemilik,
				$value->harga,
				$value->harga_semesteran,
				$value->deskripsi,
				$value->foto,
				$value->status_isi,

				$ops				
			);
		} 

		return $this->response->setJSON($data);		
	}
	
	public function getOne()
	{
 		$response = array();
		
		$id = $this->request->getPost('id');
		
		if ($this->validation->check($id, 'required|numeric')) {
			
			$data = $this->mskamarModel->where('id' ,$id)->first();
			
			return $this->response->setJSON($data);	
				
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}	
		
	}	

	public function add()
	{
        $response = array();

		$fields['id'] = $this->request->getPost('id');
		$fields['kode_pemilik'] = $this->request->getPost('kode_pemilik');
		$fields['harga'] = $this->request->getPost('harga');
		$fields['harga_semesteran'] = $this->request->getPost('harga_semesteran');
		$fields['deskripsi'] = $this->request->getPost('deskripsi');
		$fields['foto'] = $this->request->getPost('foto');
		$fields['status_isi'] = $this->request->getPost('status_isi');


        $this->validation->setRules([
			'kode_pemilik' => ['label' => 'Kode pemilik', 'rules' => 'required|min_length[0]|max_length[255]'],
            'harga' => ['label' => 'Harga', 'rules' => 'required|min_length[0]|max_length[255]'],
            'harga_semesteran' => ['label' => 'Harga semesteran', 'rules' => 'permit_empty|min_length[0]|max_length[255]'],
            'deskripsi' => ['label' => 'Deskripsi', 'rules' => 'required|min_length[0]|max_length[255]'],
            'foto' => ['label' => 'Foto', 'rules' => 'required|min_length[0]|max_length[255]'],
            'status_isi' => ['label' => 'Status isi', 'rules' => 'required|min_length[0]|max_length[255]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form
			
        } else {

            if ($this->mskamarModel->insert($fields)) {
												
                $response['success'] = true;
                $response['messages'] = lang("App.insert-success") ;	
				
            } else {
				
                $response['success'] = false;
                $response['messages'] = lang("App.insert-error") ;
				
            }
        }
		
        return $this->response->setJSON($response);
	}

	public function edit()
	{
        $response = array();
		
		$fields['id'] = $this->request->getPost('id');
		$fields['kode_pemilik'] = $this->request->getPost('kode_pemilik');
		$fields['harga'] = $this->request->getPost('harga');
		$fields['harga_semesteran'] = $this->request->getPost('harga_semesteran');
		$fields['deskripsi'] = $this->request->getPost('deskripsi');
		$fields['foto'] = $this->request->getPost('foto');
		$fields['status_isi'] = $this->request->getPost('status_isi');


        $this->validation->setRules([
			'kode_pemilik' => ['label' => 'Kode pemilik', 'rules' => 'required|min_length[0]|max_length[255]'],
            'harga' => ['label' => 'Harga', 'rules' => 'required|min_length[0]|max_length[255]'],
            'harga_semesteran' => ['label' => 'Harga semesteran', 'rules' => 'permit_empty|min_length[0]|max_length[255]'],
            'deskripsi' => ['label' => 'Deskripsi', 'rules' => 'required|min_length[0]|max_length[255]'],
            'foto' => ['label' => 'Foto', 'rules' => 'required|min_length[0]|max_length[255]'],
            'status_isi' => ['label' => 'Status isi', 'rules' => 'required|min_length[0]|max_length[255]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form

        } else {

            if ($this->mskamarModel->update($fields['id'], $fields)) {
				
                $response['success'] = true;
                $response['messages'] = lang("App.update-success");	
				
            } else {
				
                $response['success'] = false;
                $response['messages'] = lang("App.update-error");
				
            }
        }
		
        return $this->response->setJSON($response);	
	}
	
	public function remove()
	{
		$response = array();
		
		$id = $this->request->getPost('id');
		
		if (!$this->validation->check($id, 'required|numeric')) {

			throw new \CodeIgniter\Exceptions\PageNotFoundException();
			
		} else {	
		
			if ($this->mskamarModel->where('id', $id)->delete()) {
								
				$response['success'] = true;
				$response['messages'] = lang("App.delete-success");	
				
			} else {
				
				$response['success'] = false;
				$response['messages'] = lang("App.delete-error");
				
			}
		}	
	
        return $this->response->setJSON($response);		
	}	
		
}	
