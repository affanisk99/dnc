<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
function __construct()
	{
		parent::__construct();

		date_default_timezone_set('Asia/Jakarta');

		$this->load->model('m_data');

		// cek session yang login, 
		// jika session status tidak sama dengan session telah_login, berarti pengguna belum login
		// maka halaman akan di alihkan kembali ke halaman login.
		if($this->session->userdata('status')!="telah_login"){
			redirect(base_url().'login?alert=belum_login');
		}
	}
	public function index()
	{
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_index');
			$this->load->view('dashboard/v_footer');
	}
	public function keluar()
	{
			$this->session->sess_destroy();
			redirect('login?alert=logout');
	}
	public function kategori()
	{
		$data['kategori'] = $this->m_data->get_data('kategori')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_kategori',$data);
		$this->load->view('dashboard/v_footer');
	}
	public function kategori_tambah()
	{
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_kategori_tambah');
		$this->load->view('dashboard/v_footer');
	}
	public function kategori_aksi()
	{
		$this->form_validation->set_rules('kategori','Kategori','required');

		if($this->form_validation->run() != false){

			$kategori = $this->input->post('kategori');

			$data = array(
				'knama' => $kategori,
				'kslug' => strtolower(url_title($kategori))
			);

			$this->m_data->insert_data($data,'kategori');

			redirect(base_url().'dashboard/kategori');
			
		}else{
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_kategori_tambah');
			$this->load->view('dashboard/v_footer');
		}
	}
	public function kategori_edit($id)
	{
		$where = array(
			'kid' => $id
		);
		$data['kategori'] = $this->m_data->edit_data($where,'kategori')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_kategori_edit',$data);
		$this->load->view('dashboard/v_footer');
	}
	public function kategori_update()
	{
		$this->form_validation->set_rules('kategori','Kategori','required');

		if($this->form_validation->run() != false){

			$id = $this->input->post('id');
			$kategori = $this->input->post('kategori');

			$where = array(
				'kid' => $id
			);

			$data = array(
				'knama' => $kategori,
				'kslug' => strtolower(url_title($kategori))
			);

			$this->m_data->update_data($where, $data,'kategori');

			redirect(base_url().'dashboard/kategori');
			
		}else{

			$id = $this->input->post('id');
			$where = array(
				'kid' => $id
			);
			$data['kategori'] = $this->m_data->edit_data($where,'kategori')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_kategori_edit',$data);
			$this->load->view('dashboard/v_footer');
		}
	}
	public function kategori_hapus($id)
	{
		$where = array(
			'kid' => $id
		);

		$this->m_data->delete_data($where,'kategori');

		redirect(base_url().'dashboard/kategori');
	}
	public function artikel()
	{
		$data['artikel'] = $this->db->query("SELECT * FROM artikel,kategori WHERE akategori=kid order by aid desc")->result();	
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_artikel',$data);
		$this->load->view('dashboard/v_footer');
	}
	public function artikel_tambah()
	{
		$data['kategori'] = $this->m_data->get_data('kategori')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_artikel_tambah',$data);
		$this->load->view('dashboard/v_footer');
	}
	public function artikel_aksi()
	{
		// Wajib isi judul,konten dan kategori
		$this->form_validation->set_rules('judul','Judul','required|is_unique[artikel.ajudul]');
		$this->form_validation->set_rules('konten','Konten','required');
		$this->form_validation->set_rules('kategori','Kategori','required');

		// Membuat gambar wajib di isi
		if (empty($_FILES['sampul']['name'])){
			$this->form_validation->set_rules('sampul', 'Gambar Sampul', 'required');
		}

		if($this->form_validation->run() != false){

			$config['upload_path']   = './gambar/artikel/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('sampul')) {

				// mengambil data tentang gambar
				$gambar = $this->upload->data();

				$tanggal = date('Y-m-d H:i:s');
				$judul = $this->input->post('judul');
				$slug = strtolower(url_title($judul));
				$konten = $this->input->post('konten');
				$sampul = $gambar['file_name'];
				$kategori = $this->input->post('kategori');
				$status = $this->input->post('status');

				$data = array(
					'adate' => $tanggal,
					'ajudul' => $judul,
					'aslug' => $slug,
					'akonten' => $konten,
					'asampul' => $sampul,
					'akategori' => $kategori,
					'astatus' => $status
				);

				$this->m_data->insert_data($data,'artikel');

				redirect(base_url().'dashboard/artikel');	
				
			} else {

				$this->form_validation->set_message('sampul', $data['gambar_error'] = $this->upload->display_errors());

				$data['kategori'] = $this->m_data->get_data('kategori')->result();
				$this->load->view('dashboard/v_header');
				$this->load->view('dashboard/v_artikel_tambah',$data);
				$this->load->view('dashboard/v_footer');
			}

		}else{
			$data['kategori'] = $this->m_data->get_data('kategori')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_artikel_tambah',$data);
			$this->load->view('dashboard/v_footer');
		}
	}
	public function artikel_edit($id)
	{
		$where = array(
			'aid' => $id
		);
		$data['artikel'] = $this->m_data->edit_data($where,'artikel')->result();
		$data['kategori'] = $this->m_data->get_data('kategori')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_artikel_edit',$data);
		$this->load->view('dashboard/v_footer');
	}
	public function artikel_update()
	{
		// Wajib isi judul,konten dan kategori
		$this->form_validation->set_rules('judul','Judul','required');
		$this->form_validation->set_rules('konten','Konten','required');
		$this->form_validation->set_rules('kategori','Kategori','required');
		
		if($this->form_validation->run() != false){

			$id = $this->input->post('id');

			$judul = $this->input->post('judul');
			$slug = strtolower(url_title($judul));
			$konten = $this->input->post('konten');
			$kategori = $this->input->post('kategori');
			$status = $this->input->post('status');

			$where = array(
				'aid' => $id
			);

			$data = array(
				'ajudul' => $judul,
				'aslug' => $slug,
				'akonten' => $konten,
				'akategori' => $kategori,
				'astatus' => $status,
			);

			$this->m_data->update_data($where,$data,'artikel');


			if (!empty($_FILES['sampul']['name'])){
				$config['upload_path']   = './gambar/artikel/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('sampul')) {

					// mengambil data tentang gambar
					$gambar = $this->upload->data();

					$data = array(
						'asampul' => $gambar['file_name'],
					);

					$this->m_data->update_data($where,$data,'artikel');

					redirect(base_url().'dashboard/artikel');	

				} else {
					$this->form_validation->set_message('sampul', $data['gambar_error'] = $this->upload->display_errors());
					
					$where = array(
						'aid' => $id
					);
					$data['artikel'] = $this->m_data->edit_data($where,'artikel')->result();
					$data['kategori'] = $this->m_data->get_data('kategori')->result();
					$this->load->view('dashboard/v_header');
					$this->load->view('dashboard/v_artikel_edit',$data);
					$this->load->view('dashboard/v_footer');
				}
			}else{
				redirect(base_url().'dashboard/artikel');	
			}

		}else{
			$id = $this->input->post('id');
			$where = array(
				'aid' => $id
			);
			$data['artikel'] = $this->m_data->edit_data($where,'artikel')->result();
			$data['kategori'] = $this->m_data->get_data('kategori')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_artikel_edit',$data);
			$this->load->view('dashboard/v_footer');
		}
	}
	public function artikel_hapus($id)
	{
		$where = array(
			'aid' => $id
		);

		$this->m_data->delete_data($where,'artikel');

		redirect(base_url().'dashboard/artikel');
	}
	public function produk()
	{
		$data['produk'] = $this->db->query("SELECT * FROM produk,kategori WHERE pkategori=kid order by pid desc")->result();	
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_produk',$data);
		$this->load->view('dashboard/v_footer');
	}
	public function produk_tambah()
	{
		$data['kategori'] = $this->m_data->get_data('kategori')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_produk_tambah',$data);
		$this->load->view('dashboard/v_footer');
	}
	public function produk_aksi()
	{
		// Wajib isi judul,konten dan kategori
		$this->form_validation->set_rules('judul','Judul','required|is_unique[produk.pjudul]');
		$this->form_validation->set_rules('konten','Konten','required');
		$this->form_validation->set_rules('kategori','Kategori','required');

		// Membuat gambar wajib di isi
		if (empty($_FILES['sampul']['name'])){
			$this->form_validation->set_rules('sampul', 'Gambar Sampul', 'required');
		}

		if($this->form_validation->run() != false){

			$config['upload_path']   = './gambar/produk/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('sampul')) {

				// mengambil data tentang gambar
				$gambar = $this->upload->data();

				$tanggal = date('Y-m-d H:i:s');
				$judul = $this->input->post('judul');
				$slug = strtolower(url_title($judul));
				$konten = $this->input->post('konten');
				$sampul = $gambar['file_name'];
				$kategori = $this->input->post('kategori');
				$status = $this->input->post('status');

				$data = array(
					'pdate' => $tanggal,
					'pjudul' => $judul,
					'pslug' => $slug,
					'pkonten' => $konten,
					'psampul' => $sampul,
					'pkategori' => $kategori,
					'pstatus' => $status
				);

				$this->m_data->insert_data($data,'produk');

				redirect(base_url().'dashboard/produk');	
				
			} else {

				$this->form_validation->set_message('sampul', $data['gambar_error'] = $this->upload->display_errors());

				$data['kategori'] = $this->m_data->get_data('kategori')->result();
				$this->load->view('dashboard/v_header');
				$this->load->view('dashboard/v_produk_tambah',$data);
				$this->load->view('dashboard/v_footer');
			}

		}else{
			$data['kategori'] = $this->m_data->get_data('kategori')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_produk_tambah',$data);
			$this->load->view('dashboard/v_footer');
		}
	}
	public function produk_edit($id)
	{
		$where = array(
			'pid' => $id
		);
		$data['produk'] = $this->m_data->edit_data($where,'produk')->result();
		$data['kategori'] = $this->m_data->get_data('kategori')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_produk_edit',$data);
		$this->load->view('dashboard/v_footer');
	}
	public function produk_update()
	{
		// Wajib isi judul,konten dan kategori
		$this->form_validation->set_rules('judul','Judul','required');
		$this->form_validation->set_rules('konten','Konten','required');
		$this->form_validation->set_rules('kategori','Kategori','required');
		
		if($this->form_validation->run() != false){

			$id = $this->input->post('id');

			$judul = $this->input->post('judul');
			$slug = strtolower(url_title($judul));
			$konten = $this->input->post('konten');
			$kategori = $this->input->post('kategori');
			$status = $this->input->post('status');

			$where = array(
				'pid' => $id
			);

			$data = array(
				'pjudul' => $judul,
				'pslug' => $slug,
				'pkonten' => $konten,
				'pkategori' => $kategori,
				'pstatus' => $status
			);

			$this->m_data->update_data($where,$data,'produk');


			if (!empty($_FILES['sampul']['name'])){
				$config['upload_path']   = './gambar/produk/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('sampul')) {

					// mengambil data tentang gambar
					$gambar = $this->upload->data();

					$data = array(
						'psampul' => $gambar['file_name'],
					);

					$this->m_data->update_data($where,$data,'produk');

					redirect(base_url().'dashboard/produk');	

				} else {
					$this->form_validation->set_message('sampul', $data['gambar_error'] = $this->upload->display_errors());
					
					$where = array(
						'pid' => $id
					);
					$data['produk'] = $this->m_data->edit_data($where,'produk')->result();
					$data['kategori'] = $this->m_data->get_data('kategori')->result();
					$this->load->view('dashboard/v_header');
					$this->load->view('dashboard/v_produk_edit',$data);
					$this->load->view('dashboard/v_footer');
				}
			}else{
				redirect(base_url().'dashboard/produk');	
			}

		}else{
			$id = $this->input->post('id');
			$where = array(
				'pid' => $id
			);
			$data['produk'] = $this->m_data->edit_data($where,'produk')->result();
			$data['kategori'] = $this->m_data->get_data('kategori')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_produk_edit',$data);
			$this->load->view('dashboard/v_footer');
		}
	}
	public function produk_hapus($id)
	{
		$where = array(
			'pid' => $id
		);

		$this->m_data->delete_data($where,'produk');

		redirect(base_url().'dashboard/produk');
	}
	public function setweb()
	{
		$data['setweb'] = $this->m_data->get_data('setweb')->result();

		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_setweb',$data);
		$this->load->view('dashboard/v_footer');
	}
	public function setweb_update()
	{
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('deskripsi','deskripsi','required');
		$this->form_validation->set_rules('alamat','alamat','required');
		$this->form_validation->set_rules('nowa','nowa','required');
		
		if($this->form_validation->run() != false){

			$nama = $this->input->post('nama');
			$deskripsi = $this->input->post('deskripsi');
			$alamat = $this->input->post('alamat');
			$nowa = $this->input->post('nowa');
			$linkfb = $this->input->post('linkfb');
			$linktwitter = $this->input->post('linktwitter');
			$linkig = $this->input->post('linkig');
			$email = $this->input->post('email');

			$where = array(

			);

			$data = array(
				'nama' => $nama,
				'deskripsi' => $deskripsi,
				'alamat' => $alamat,
				'nowa' => $nowa,
				'linkfb' => $linkfb,
				'linktwitter' => $linktwitter,
				'linkig' => $linkig,
				'email' => $email
			);

			// update setweb
			$this->m_data->update_data($where,$data,'setweb');
			redirect(base_url().'dashboard/setweb/?alert=sukses');

		}else{
			$data['setweb'] = $this->m_data->get_data('setweb')->result();

			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_setweb',$data);
			$this->load->view('dashboard/v_footer');
		}
	}
}		