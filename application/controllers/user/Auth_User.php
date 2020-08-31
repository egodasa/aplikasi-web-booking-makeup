<?php
class Auth_User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Frontend/Auth_User_Model', 'authuserModel');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $cek = $this->authuserModel->cek_login($username, $password);
        $this->session->set_userdata('id_pengguna', $cek->id_pengguna);

        if ($cek == FALSE) {
            $this->session->set_flashdata('error', 'Username / Password Salah');
            redirect('user/index');
        } else {
            $this->session->set_userdata('username', $cek->username);
            $this->session->set_userdata('email', $cek->email);
            // var_dump($t);
            // var_dump($e);
            // exit;
            $this->session->set_flashdata('pesan', 'Anda Berhasil Masuk');
            redirect('user/index');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata(array('id_pengguna', 'username', 'email'));
        $this->session->set_flashdata('pesan', 'Anda Telah Logout.');
        redirect('user/index');
    }
}
