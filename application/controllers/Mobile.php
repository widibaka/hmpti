<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mobile extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    if (!$this->session->userdata('email')) {
      redirect('auth');
    }
    $this->load->library('f_pdf');
    $this->load->library('encryptor');
    $this->load->model('Regist_model');
  }

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   * 		http://example.com/index.php/welcome
   *	- or -
   * 		http://example.com/index.php/welcome/index
   *	- or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see https://codeigniter.com/user_guide/general/urls.html
   */
  public function index()
  {
    $data['title'] = 'Dashboard';
    $data['sidebarmenu'] = 'Dashboard';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['eventku'] = $this->db->where('id_user =', $user['id_user']);
    $data['eventku'] = $this->db->order_by('id_event', 'DESC');
    $data['eventku'] = $this->db->get('event_participant')->result_array();

    $this->load->view('template/mobile_header', $data);
    $this->load->view('template/mobile_sidebar', $data);
    $this->load->view('template/mobile_topbar', $data);
    $this->load->view('mobile/index', $data);
    $this->load->view('template/mobile_footer', $data);
  }

  public function detailevent($id_event)
  {
    $data['title'] = 'Detail Event';
    $data['sidebarmenu'] = 'Dashboard';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['event'] = $this->db->where('id_event =', $id_event);
    $data['event'] = $this->db->get('event')->row_array();

    $this->load->view('template/mobile_header', $data);
    $this->load->view('template/mobile_sidebar', $data);
    $this->load->view('template/mobile_topbar', $data);
    $this->load->view('mobile/detailevent', $data);
    $this->load->view('template/mobile_footer', $data);
  }

  public function daftarevent()
  {
    $data['title'] = 'Daftar Event';
    $data['sidebarmenu'] = 'Daftar Event';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['eventku'] = $this->db->where('is_active =', 1);
    $data['eventku'] = $this->db->order_by('id_event', 'DESC');
    $data['eventku'] = $this->db->get('event')->result_array();

    $this->load->view('template/mobile_header', $data);
    $this->load->view('template/mobile_sidebar', $data);
    $this->load->view('template/mobile_topbar', $data);
    $this->load->view('mobile/daftarevent', $data);
    $this->load->view('template/mobile_footer', $data);
  }

  public function detaildaftarevent($id_event)
  {
    $data['title'] = 'Detail Event';
    $data['sidebarmenu'] = 'Daftar Event';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['event'] = $this->db->where('id_event =', $id_event);
    $data['event'] = $this->db->get('event')->row_array();


    // start:: cek apakah dia sudah daftar atau belum
    $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $id_user = $user['id_user'];
    $cek_peserta_di_event = $this->Regist_model->cek_peserta_di_event($id_event, $id_user);
    // var_dump($cek_peserta_di_event);
    // die();
    if ( $cek_peserta_di_event == false ) { // kalau data user gak ada di tabel eventnya
      $data['status_registrasi'] = 'belum_terdaftar';
    } else if ( is_array( $cek_peserta_di_event ) ){
      $data['status_registrasi'] = 'sudah_terdaftar';
    } else if ( $cek_peserta_di_event == 'kuota_habis' ) { // kalau data user gak ada di tabel eventnya
      $data['status_registrasi'] = 'kuota_habis';
    }

    // var_dump($cek_peserta_di_event,$data['status_registrasi']);
    // die();

    // end::

    $this->load->view('template/mobile_header', $data);
    $this->load->view('template/mobile_sidebar', $data);
    $this->load->view('template/mobile_topbar', $data);
    $this->load->view('mobile/detaildaftarevent', $data);
    $this->load->view('template/mobile_footer', $data);
  }

  public function gabungevent($id_event)
  {
    $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    // cek apakah dia sudah daftar
    $id_user = $user['id_user'];
    $cek_peserta_di_event = $this->Regist_model->cek_peserta_di_event($id_event, $id_user);

    if ( $cek_peserta_di_event == false ) { // kalau data user gak ada di tabel eventnya
      $this->Regist_model->gabung_ke_event($id_event, $id_user); // maka gabungkan ke event
      $this->Regist_model->set_alert('success','Selamat anda kini sudah terdaftar dalam event!');
      redirect('mobile');
    } else {
      $this->Regist_model->set_alert('success','Maaf, anda sudah terdaftar dalam event ini!');
      redirect('mobile');
    }
  }

  public function userprofile()
  {
    $data['title'] = 'User Profile';
    $data['sidebarmenu'] = 'User Profile';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->view('template/mobile_header', $data);
    $this->load->view('template/mobile_sidebar', $data);
    $this->load->view('template/mobile_topbar', $data);
    $this->load->view('mobile/userprofile', $data);
    $this->load->view('template/mobile_footer', $data);
  }

  public function ubahpassword()
  {
    $data['title_header'] = "Profile";
    $data['title'] = 'Ubah Password';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->form_validation->set_rules('currentpassword', 'Current Password', 'required|trim');
    $this->form_validation->set_rules('newpassword1', 'New Password', 'required|trim|min_length[3]|matches[newpassword2]');
    $this->form_validation->set_rules('newpassword2', ' Confirm New Password', 'required|trim|min_length[3]|matches[newpassword1]');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'User Profile';
      $data['sidebarmenu'] = 'User Profile';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->load->view('template/mobile_header', $data);
      $this->load->view('template/mobile_sidebar', $data);
      $this->load->view('template/mobile_topbar', $data);
      $this->load->view('mobile/userprofile', $data);
      $this->load->view('template/mobile_footer', $data);
    } else {
      $curent_password = $this->input->post('currentpassword');
      $new_password = $this->input->post('newpassword1');
      if (!password_verify($curent_password, $data['user']['password'])) {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Current Password!</div>');
        redirect('mobile/userprofile');
      } else {
        if ($curent_password == $new_password) {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New Password cannot be the same as current password!</div>');
          redirect('mobile/userprofile');
        } else {
          // pasword oke
          $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

          $this->db->set('password', $password_hash);
          $this->db->where('email', $this->session->userdata('email'));
          $this->db->update('user');
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pasword Change!</div>');
          redirect('mobile/userprofile');
        }
      }
    }
  }

  public function editfoto()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $email = $this->session->userdata('email');
    // cek jika ada gambar
    $upload_image = $_FILES['image']['name'];

    if ($upload_image) {
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size']      = '2048';
      $config['upload_path']   = './assets/image/user_profile/';

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('image')) {
        $old_image = $data['user']['image'];
        if ($old_image != 'default.png') {
          unlink(FCPATH . 'assets/img/user_profile/' . $old_image);
        }

        $new_image = $this->upload->data('file_name');
        $this->db->set('image', $new_image);
      } else {
        echo $this->upload->display_errors();
      }
    }

    $this->db->where('email', $email);
    $this->db->update('user');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has ben updated!</div>');
    redirect('profile');
  }

  public function ubahprofile()
  {
    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('kota', 'Kota', 'required');
    $this->form_validation->set_rules('telp', 'Telp', 'required');
    if ($this->form_validation->run() == false) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tolong jangan kosongi form yang ada!</div>');
      redirect('profile');
    } else {
      $input = $this->input->post(NULL, TRUE);
      $email = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $data = [
        'username' => $input['username'],
        'alamat' => $input['alamat'],
        'kota' => $input['kota'],
        'telp' => $input['telp']
      ];

      $this->db->where('email =', $email['email']);
      $this->db->update('user', $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dirubah!</div>');
      redirect('mobile/userprofile');
    }
  }

  public function absensi()
  {
    $data['title'] = 'Absensi';
    $data['sidebarmenu'] = 'Absensi Kehadiran';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->db->where('id_user =', $user['id_user']);
    $this->db->order_by('id_event', 'DESC');
    $data['eventku'] = $this->db->get('event_participant')->result_array();

    $this->load->view('template/mobile_header', $data);
    $this->load->view('template/mobile_sidebar', $data);
    $this->load->view('template/mobile_topbar', $data);
    $this->load->view('mobile/absensi', $data);
    $this->load->view('template/mobile_footer', $data);
  }

  public function detailabsensi($id_event)
  {
    $data['title'] = 'Absensi';
    $data['sidebarmenu'] = 'Absensi Kehadiran';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['event'] = $this->db->where('id_event =', $id_event);
    $data['event'] = $this->db->get('event')->row_array();

    $data['absensi'] = $this->db->where('id_user =', $user['id_user']);
    $data['absensi'] = $this->db->where('id_event =', $id_event);
    $data['absensi'] = $this->db->get('absensi')->row_array();

    $absensi = $this->db->where('id_user =', $user['id_user']);
    $absensi = $this->db->where('id_event =', $id_event);
    $absensi = $this->db->get('absensi');

    if ($absensi->num_rows() == 0) {
      redirect('mobile/inputabsen/' . $id_event);
    } else {
      $this->load->view('template/mobile_header', $data);
      $this->load->view('template/mobile_sidebar', $data);
      $this->load->view('template/mobile_topbar', $data);
      $this->load->view('mobile/detailabsensi', $data);
      $this->load->view('template/mobile_footer', $data);
    }
  }

  public function inputabsen($id_event)
  {
    $data['title'] = 'Absensi';
    $data['sidebarmenu'] = 'Absensi Kehadiran';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['event'] = $this->db->where('id_event =', $id_event);
    $data['event'] = $this->db->get('event')->row_array();

    $data['cek'] = $this->db->where('id_event =', $id_event);
    $data['cek'] = $this->db->where('id_user =', $user['id_user']);
    $data['cek'] = $this->db->get('absensi');

    $this->load->view('template/mobile_header', $data);
    $this->load->view('template/mobile_sidebar', $data);
    $this->load->view('template/mobile_topbar', $data);
    $this->load->view('mobile/inputabsensi', $data);
    $this->load->view('template/mobile_footer', $data);
  }

  public function kirimabsensi($id_event)
  {
    $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    // cek jika ada gambar
    $upload_image = $_FILES['image'];

    if ( !empty( $upload_image['name'] ) ) {
      $config['allowed_types'] = 'jpg|png|jpeg';
      $config['upload_path']   = './assets/image/absensi/';

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('image')) {

        $id_user = $user['id_user'];
        $data_participant = $this->db->get_where('event_participant', ['id_user' => $id_user])->row_array();
        // var_dump($data_participant);
        //     die();

        $id_event_participant = $data_participant['id_event_participant'];

        // rename
        $upload_data = $this->upload->data();
        // rename file yang diupload
        // $nama_random = $this->Regist_model->generate_random_password();
        $nama_random = ''; // nama random dimatiin dulu
        $path = $upload_data['file_path'];
        $old_name = $upload_data['raw_name'] . $upload_data['file_ext'];
        $new_name = $nama_random . $id_event . '_' . $id_user . '_' . $id_event_participant . $upload_data['file_ext'];

        /* 
        * NAMA FILE SEKARANG TERDIRI DARI IDEVENT_IDUSER_IDPARTICIPANT.jpg 
        */

        rename($path . $old_name, $path . $new_name); // ganti nama image dengan nama & id_event
        // end rename
        $this->db->set('image', $new_name);

        // memasukkan ke db
        $data = array(
          'id_user' => $user['id_user'],
          'id_event' => $id_event,
        );

        $this->db->insert('absensi', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kami akan segera memproses sertifikat kamu, mohon ditunggu yaa!</div>');
        redirect('mobile/absensi');

      } else {
        $this->Regist_model->set_alert('danger',$this->upload->display_errors());
        redirect( base_url('mobile/inputabsen/'.$id_event) ) ; // refresh halaman
      }
    }
    else {
      $this->Regist_model->set_alert('danger','Mohon upload gambar!');
      redirect( base_url('mobile/inputabsen/'.$id_event) ) ; // refresh halaman
    }

    
  }

  // Cetak Sertifikat
  public function cetak_sertifikat($id_event, $apakah_test = 0)
  {

    $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['user'] = $user;

    $id_event_f = $this->encryptor->enkrip('dekrip', $id_event);
    $data['id_event_f'] = $id_event_f;

    $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['event'] = $this->db->where('id_event =', $id_event);
    $data['event'] = $this->db->where('id_user =', $user['id_user']);
    $data['event'] = $this->db->get('event_participant')->row_array();
    // $data['id_event'] = $id_event;
    // $data['event'] = $this->db->get_where('event_participant', ['id_user' => $user['id_user']])->row_array();

    $this->load->view('eventku/view_sertifikat', $data);
    // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sertifikat anda sudah berhasil di download!!!</div>');
  }

  public function Sertifikat()
  {
    $data['title'] = 'Sertifikat';
    $data['sidebarmenu'] = 'Sertifikat';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['eventku'] = $this->db->where('id_user =', $user['id_user']);
    $data['eventku'] = $this->db->order_by('id_event', 'DESC');
    $data['eventku'] = $this->db->get('event_participant')->result_array();

    $this->load->view('template/mobile_header', $data);
    $this->load->view('template/mobile_sidebar', $data);
    $this->load->view('template/mobile_topbar', $data);
    $this->load->view('mobile/sertifikat', $data);
    $this->load->view('template/mobile_footer', $data);
  }

  public function detailsertifikat($id_event)
  {
    $data['title'] = 'Detail Sertifikat';
    $data['sidebarmenu'] = 'Sertifikat';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['event'] = $this->db->where('id_event =', $id_event);
    $data['event'] = $this->db->get('event')->row_array();

    $this->load->view('template/mobile_header', $data);
    $this->load->view('template/mobile_sidebar', $data);
    $this->load->view('template/mobile_topbar', $data);
    $this->load->view('mobile/detailsertifikat', $data);
    $this->load->view('template/mobile_footer', $data);
  }
}
