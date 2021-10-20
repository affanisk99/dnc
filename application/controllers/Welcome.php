<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		$this->load->model('m_data');

	}
	public function index()
	{	
		// 3 produk terbaru
		$data['produk'] = $this->db->query("SELECT * FROM produk,kategori WHERE pstatus='publish' AND pkategori=kid ORDER BY pid DESC LIMIT 3")->result();

		// data pengaturan website
		$data['setweb'] = $this->m_data->get_data('setweb')->row();

		// SEO META
		$data['meta_keyword'] = $data['setweb']->nama;
		$data['meta_description'] = $data['setweb']->deskripsi;

		$this->load->view('frontend/v_header',$data);
		$this->load->view('frontend/v_homepage',$data);
		$this->load->view('frontend/v_footer',$data);
	}
	// public function detail_produk($slug)
	// {
	// 	$data['produk'] = $this->db->query("SELECT * FROM produk,kategori WHERE pstatus='publish' AND pkategori=kid AND pslug='$slug'")->result();

	// 	// data setting website
	// 	$data['setweb'] = $this->m_data->get_data('setweb')->row();
		
	// 	// SEO META Produk
	// 	if(count($data['produk']) > 0){
	// 		$data['meta_keyword'] = $data['produk'][0]->pjudul;
	// 		$data['meta_description'] = substr($data['produk'][0]->pkonten, 0,100);
	// 	}else{
	// 		$data['meta_keyword'] = $data['setweb']->nama;
	// 		$data['meta_description'] = $data['setweb']->deskripsi;
	// 	}

	// 	$this->load->view('frontend/v_header',$data);
	// 	$this->load->view('frontend/v_detail_produk',$data);
	// 	$this->load->view('frontend/v_footer',$data);
	// }
	// public function produk()
	// {		
	// 	$data['setweb'] = $this->m_data->get_data('setweb')->row();

	// 	// SEO META
	// 	$data['meta_keyword'] = $data['setweb']->nama;
	// 	$data['meta_description'] = $data['setweb']->deskripsi;


	// 	// $this->load->database();
	// 	$jumlah_data = $this->m_data->get_data('produk')->num_rows();
	// 	$this->load->library('pagination');
	// 	$config['base_url'] = base_url().'produk/';
	// 	$config['total_rows'] = $jumlah_data;
	// 	$config['per_page'] = 2;

	// 	$config['first_link']       = 'First';
	// 	$config['last_link']        = 'Last';
	// 	$config['next_link']        = 'Next';
	// 	$config['prev_link']        = 'Prev';
	// 	$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
	// 	$config['full_tag_close']   = '</ul></nav></div>';
	// 	$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
	// 	$config['num_tag_close']    = '</span></li>';
	// 	$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
	// 	$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
	// 	$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
	// 	$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
	// 	$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
	// 	$config['prev_tagl_close']  = '</span>Next</li>';
	// 	$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
	// 	$config['first_tagl_close'] = '</span></li>';
	// 	$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
	// 	$config['last_tagl_close']  = '</span></li>';


	// 	$from = $this->uri->segment(2);
	// 	if($from==""){
	// 		$from = 0;
	// 	}
	// 	$this->pagination->initialize($config);

	// 	$data['produk'] = $this->db->query("SELECT * FROM produk,kategori WHERE pstatus='publish' AND pkategori=kid ORDER BY pid DESC LIMIT $config[per_page] OFFSET $from")->result();

	// 	$this->load->view('frontend/v_header',$data);
	// 	$this->load->view('frontend/v_produk',$data);
	// 	$this->load->view('frontend/v_footer',$data);
	// }
	// public function detail_artikel($slug)
	// {
	// 	$data['artikel'] = $this->db->query("SELECT * FROM artikel,kategori WHERE astatus='publish' AND akategori=kid AND aslug='$slug'")->result();

	// 	// data setting website
	// 	$data['setweb'] = $this->m_data->get_data('setweb')->row();
		
	// 	// SEO META Produk
	// 	if(count($data['artikel']) > 0){
	// 		$data['meta_keyword'] = $data['artikel'][0]->ajudul;
	// 		$data['meta_description'] = substr($data['artikel'][0]->akonten, 0,100);
	// 	}else{
	// 		$data['meta_keyword'] = $data['setweb']->nama;
	// 		$data['meta_description'] = $data['setweb']->deskripsi;
	// 	}

	// 	$this->load->view('frontend/v_header',$data);
	// 	$this->load->view('frontend/v_detail_artikel',$data);
	// 	$this->load->view('frontend/v_footer',$data);
	// }
	// public function artikel()
	// {		

	// 	$data['setweb'] = $this->m_data->get_data('setweb')->row();

	// 	// SEO META
	// 	$data['meta_keyword'] = $data['setweb']->nama;
	// 	$data['meta_description'] = $data['setweb']->deskripsi;


	// 	// $this->load->database();
	// 	$jumlah_data = $this->m_data->get_data('artikel')->num_rows();
	// 	$this->load->library('pagination');
	// 	$config['base_url'] = base_url().'artikel/';
	// 	$config['total_rows'] = $jumlah_data;
	// 	$config['per_page'] = 2;

	// 	$config['first_link']       = 'First';
	// 	$config['last_link']        = 'Last';
	// 	$config['next_link']        = 'Next';
	// 	$config['prev_link']        = 'Prev';
	// 	$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
	// 	$config['full_tag_close']   = '</ul></nav></div>';
	// 	$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
	// 	$config['num_tag_close']    = '</span></li>';
	// 	$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
	// 	$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
	// 	$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
	// 	$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
	// 	$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
	// 	$config['prev_tagl_close']  = '</span>Next</li>';
	// 	$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
	// 	$config['first_tagl_close'] = '</span></li>';
	// 	$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
	// 	$config['last_tagl_close']  = '</span></li>';


	// 	$from = $this->uri->segment(2);
	// 	if($from==""){
	// 		$from = 0;
	// 	}
	// 	$this->pagination->initialize($config);

	// 	$data['artikel'] = $this->db->query("SELECT * FROM artikel,kategori WHERE astatus='publish' AND akategori=kid ORDER BY aid ASC LIMIT $config[per_page] OFFSET $from")->result();

	// 	$this->load->view('frontend/v_header',$data);
	// 	$this->load->view('frontend/v_artikel',$data);
	// 	$this->load->view('frontend/v_footer',$data);
	// }
	// public function kategori($slug)
	// {		

	// 	// data pengaturan website
	// 	$data['setweb'] = $this->m_data->get_data('setweb')->row();

	// 	$jumlah_produk = $this->db->query("SELECT * FROM produk,kategori WHERE pstatus='publish' AND pkategori=kid AND kslug='$slug'")->num_rows();
		
	// 	$this->load->library('pagination');
	// 	$config['base_url'] = base_url().'kategori/'.$slug;
	// 	$config['total_rows'] = $jumlah_produk;
	// 	$config['per_page'] = 2;

	// 	$config['first_link']       = 'First';
	// 	$config['last_link']        = 'Last';
	// 	$config['next_link']        = 'Next';
	// 	$config['prev_link']        = 'Prev';
	// 	$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
	// 	$config['full_tag_close']   = '</ul></nav></div>';
	// 	$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
	// 	$config['num_tag_close']    = '</span></li>';
	// 	$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
	// 	$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
	// 	$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
	// 	$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
	// 	$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
	// 	$config['prev_tagl_close']  = '</span>Next</li>';
	// 	$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
	// 	$config['first_tagl_close'] = '</span></li>';
	// 	$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
	// 	$config['last_tagl_close']  = '</span></li>';


	// 	$from = $this->uri->segment(3);
	// 	if($from==""){
	// 		$from = 0;
	// 	}
	// 	$this->pagination->initialize($config);

	// 	$data['produk'] = $this->db->query("SELECT * FROM produk,kategori WHERE pstatus='publish'AND pkategori=kid AND kslug='$slug' ORDER BY pid DESC LIMIT $config[per_page] OFFSET $from")->result();

	// 	// SEO META
	// 	$data['meta_keyword'] = $data['setweb']->nama;
	// 	$data['meta_description'] = $data['setweb']->deskripsi;

	// 	$this->load->view('frontend/v_header',$data);
	// 	$this->load->view('frontend/v_kategori',$data);
	// 	$this->load->view('frontend/v_footer',$data);
	// }

	// public function search()
	// {	
	// 	 //mengambil nilai keyword dari form pencarian
	// 	$cari = htmlentities((trim($this->input->post('cari',true)))? trim($this->input->post('cari',true)) : '');

 //     		//jika uri segmen 2 ada, maka nilai variabel $search akan diganti dengan nilai uri segmen 2
	// 	$cari = ($this->uri->segment(2)) ? $this->uri->segment(2) : $cari;

	// 	// data pengaturan website
	// 	$data['setweb'] = $this->m_data->get_data('setweb')->row();

	// 	// SEO META
	// 	$data['meta_keyword'] = $data['setweb']->nama;
	// 	$data['meta_description'] = $data['setweb']->deskripsi;

	// 	$jumlah_produk = $this->db->query("SELECT * FROM produk,kategori WHERE pstatus='publish'AND pkategori=kid AND (pjudul LIKE '%$cari%' OR pkonten LIKE '%$cari%')")->num_rows();
		
	// 	$this->load->library('pagination');
	// 	$config['base_url'] = base_url().'search/'.$cari;
	// 	$config['total_rows'] = $jumlah_produk;
	// 	$config['per_page'] = 2;

	// 	$config['first_link']       = 'First';
	// 	$config['last_link']        = 'Last';
	// 	$config['next_link']        = 'Next';
	// 	$config['prev_link']        = 'Prev';
	// 	$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
	// 	$config['full_tag_close']   = '</ul></nav></div>';
	// 	$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
	// 	$config['num_tag_close']    = '</span></li>';
	// 	$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
	// 	$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
	// 	$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
	// 	$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
	// 	$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
	// 	$config['prev_tagl_close']  = '</span>Next</li>';
	// 	$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
	// 	$config['first_tagl_close'] = '</span></li>';
	// 	$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
	// 	$config['last_tagl_close']  = '</span></li>';


	// 	$from = $this->uri->segment(3);
	// 	if($from==""){
	// 		$from = 0;
	// 	}
	// 	$this->pagination->initialize($config);

	// 	$data['produk'] = $this->db->query("SELECT * FROM produk,kategori WHERE pstatus='publish'AND pkategori=kid AND (pjudul LIKE '%$cari%' OR pkonten LIKE '%$cari%') ORDER BY pid DESC LIMIT $config[per_page] OFFSET $from")->result();
	// 	$data['cari'] = $cari;
	// 	$this->load->view('frontend/v_header',$data);
	// 	$this->load->view('frontend/v_search',$data);
	// 	$this->load->view('frontend/v_footer',$data);
	// }

	// public function notfound()
	// {
	// 	// data pengaturan website
	// 	$data['setweb'] = $this->m_data->get_data('setweb')->row();

	// 	// SEO META
	// 	$data['meta_keyword'] = $data['setweb']->nama;
	// 	$data['meta_description'] = $data['setweb']->deskripsi;

	// 	$this->load->view('frontend/v_header',$data);
	// 	$this->load->view('frontend/v_notfound',$data);
	// 	$this->load->view('frontend/v_footer',$data);
	// }
}