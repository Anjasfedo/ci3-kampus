<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
	public function index()
	{
		$data['mahasiswa'] = $this->ModelMahasiswa->tampilData()->result();

		$this->load->view('data-mahasiswa', $data);
	}

	public function tambah()
	{
		$this->load->view('input-mahasiswa');
	}

	public function tambah_aksi()
	{
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$telepon = $this->input->post('telepon');

		$data = array(
			'nim' => $nim,
			'nama' => $nama,
			'alamat' => $alamat,
			'telepon' => $telepon
		);


		$this->ModelMahasiswa->tambahData($data);

		redirect('mahasiswa/index');
	}

	public function edit($id)
	{
		$where = array('nim' => $id);

		$data['mahasiswa'] = $this->ModelMahasiswa->editData($where, 'mahasiswa')->result();

		$this->load->view('edit-mahasiswa', $data);
	}

	public function update()
	{
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$telepon = $this->input->post('telepon');

		$data = array(
			'nim' => $nim,
			'nama' => $nama,
			'alamat' => $alamat,
			'telepon' => $telepon
		);

		$where = array('nim'=> $nim);

		$this->ModelMahasiswa->updateMahasiswa($where, $data);

		redirect('mahasiswa/index');	
	}

	public function hapus($id)
	{
		$where = array('nim'=> $id);

		$this->ModelMahasiswa->hapusMahasiswa($where, 'mahasiswa');

		redirect('mahasiswa/index');
		
	}
}
