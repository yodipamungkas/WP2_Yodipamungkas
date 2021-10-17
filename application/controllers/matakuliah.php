<?php
class Matakuliah extends CI_Controller
{
	public function index()
	{
		$this->load->view('view-form-matakuliah');
	}

	public function cetak()
	{
		$this->form_validation->set_rules('kode', 'Kode Matakuliah', 
            'required|min_length[3]', [
			'required' => 'Kode Matakuliah Harus diisi',
			'min_length' => 'Kode terlalu pendek'
		]);

		$this->form_validation->set_rules('nama', 'Nama Matakuliah', 
            'required|min_length[3]', [
			'required' => 'Nama Matakuliah Harus diisi',
			'min_length' => 'Nama terlalu pendek'
		]);

        $this->form_validation->set_rules('kelas', 'Kelas mahasiswa', 
            'required|min_length[8]', [ 
            'required' => 'Kelas harus di isi', 
            'min_length' => 'Kelas terlalu pendek' 
        ]); 

		if ($this->form_validation->run() != true) {
			$this->load->view('view-form-matakuliah');
		} else {
			$data = [
				'kode' => $this->input->post('kode'),
				'nama' => $this->input->post('nama'),
				'sks' => $this->input->post('sks'),
                'kelas' => $this->input->post('kelas') 
			];

			$this->load->view('view-data-matakuliah', $data);
		}
	}
}  