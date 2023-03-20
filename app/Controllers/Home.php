<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Home_model;
use Config\Services;


class Home extends BaseController
{
	protected $table = 'tbx_location';

	public function index()
	{
	$request = Services::request();
	$HomeModel = new Home_model($request);
	$data['Data'] = $HomeModel->getList();
	return view('home',$data);
	}
	public function get_location()
	{
		$request = Services::request();
		$HomeModel = new Home_model($request);
		$getLocation = $HomeModel->getList();
		foreach ($getLocation->getResultArray() as $row){
				$row_ = array();
				$row_[] = $row['Latitude'];
				$row_[] = $row['Longitude'];
				$row_[] = $row['NameLocation'].",".$row['Provinsi'];
				$row_[] = $row['Type'];
				$location[] = $row_;		
			}
		echo json_encode($location);
	}

	public function ajax_list()
	{
		$request = Services::request();
		$Model_Home = new Home_model($request);
		if($request->getMethod(TRUE)=="POST"){
			$list 	= $Model_Home->get_datatables();
			$data 	= [];
			$no 	= $request->getPost('start');

			foreach ($list as $dtLocation) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dtLocation->IndexLocation;
				$row[] = $dtLocation->NameLocation;
	
				$row[] = $dtLocation->Latitude;
				$row[] = $dtLocation->Longitude;
				$row[] = $dtLocation->Type;
				$row[] = $dtLocation->Provinsi;
				$row[] ='<div class="btn-group"> 	
						<a href="#" data-toggle="modal" methodType="'.$dtLocation->IndexLocation.'" style="padding:.15rem .15rem; font-size:.678rem;line-height:.5rem" data-target=".mInfoNotif" class="InfoNotif btn btn-outline-primary btn-sm"><i class="fas fa-info-circle"></i></a>  
						</div>
						<a href="#" data-toggle="modal" data-target=".mAddReceipts" style="padding:.15rem .15rem; font-size:.678rem;line-height:.5rem" class="btnEditInfo btn btn-outline-warning btn-sm"><i class="fas fa-pen"></i></a>';
				$data[] = $row;
			}
			$output = [
				"draw" => $request->getPost('draw'),
				"recordsTotal" => $Model_Home->count_all(),
				"recordsFiltered" => $Model_Home->count_filtered(),
				"data" => $data,
			];
			//output to json format
			//$output[csrf_token()]=csrf_hash();
			echo json_encode($output);
		}
	}
}
