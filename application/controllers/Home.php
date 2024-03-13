<?php
/**
 *Created by Salamon
 *Developed by Salamon
 *Project: Panel
 *Date: 1/7/2024
 *Time: 12:16 AM
 */

defined('BASEPATH') or exit('No direct script access allowed');
include APPPATH . 'core/My_Controller.php';

class Home extends My_Controller
{
    public function index()
    {
        if (!empty($this->session->userdata('User_Id'))) {
            redirect('dashboard');
        }
        if ($this->input->post()) {
            $Email = $this->input->post('Email');
            $Password = $this->input->post('Password');
            $Crypted_Password = crypt_data($Password);
            $result = $this->Home_Model->Login($Email, $Crypted_Password);
            if ($result) {
                $this->session->set_userdata('User_Id', $result->Id);
                $this->session->set_flashdata('success', "<script>toastr.success('Başarılı Şekilde Giriş Yapıldı.');</script>");
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('error', "<script>toastr.error('Hatalı Email veya Şifre');</script>");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }

        $this->load->view('login');

    }

    public function register()
    {

        if ($this->input->post()) {
            $Name = $this->input->post("Name");
            $Surname = $this->input->post("Surname");
            $Email = $this->input->post("Email");
            $password = $this->input->post("password");
            $password2 = $this->input->post("password2");
            if ($password == $password2) {
                $Email_Check = $this->Home_Model->CheckMail($Email);
                if ($Email_Check) {
                    $Result = $this->Home_Model->Register($Name, $Surname, $Email, $password);
                    if ($Result) {
                        $this->session->set_flashdata('success', "<script>toastr.success('Başarılı Şekilde Kayıt Oldunuz.');</script>");
                        redirect('index');
                    } else {
                        $this->session->set_flashdata('error', "<script>toastr.error('Kayıt sırasında hata');</script>");
                        redirect($_SERVER['HTTP_REFERER']);
                    }
                } else {
                    $this->session->set_flashdata('error', "<script>toastr.error('Bu Mail adresi Daha önce kayıtlı');</script>");
                    redirect($_SERVER['HTTP_REFERER']);
                }
            } else {
                $this->session->set_flashdata('error', "<script>toastr.error('Şifreler Uyuşmuyor');</script>");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
        Login_Check();
        $this->load->view('register');
    }

    public function dashboard()
    {
        Login_Check();
        $this->load->view('inc/header');
        $this->load->view('dashboard');
        $this->load->view('inc/footer');
    }

    public function ayarlar()
    {
        Login_Check();
        if ($this->input->post()) {

            $Id = $this->input->post("Id");
            $Ad = $this->input->post("Ad");
            $Soyad = $this->input->post("Soyad");
            $Email = $this->input->post("Email");
            $password = $this->input->post("password");
            $password2 = $this->input->post("password2");

            if ($password == $password2) {
                $Result = $this->Home_Model->Update_Ayar($Ad, $Soyad, $Email, $password, $Id);
                if ($Result) {
                    $this->session->set_flashdata('success', "<script>toastr.success('Güncelleme Başarılı');</script>");
                    redirect($_SERVER['HTTP_REFERER']);
                } else {
                    $this->session->set_flashdata('error', "<script>toastr.error('Güncelleme sırasında Hata');</script>");
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }
        }
        $Data['User'] = $this->Home_Model->Get_User($this->session->userdata('User_Id'));
        $this->load->view('inc/header', $Data);
        $this->load->view('ayarlar', $Data);
        $this->load->view('inc/footer', $Data);
    }


    public function ogrenciler()
    {
        Login_Check();

        $Data['Ogrenciler'] = $this->Home_Model->Get_User();
        $this->load->view('inc/header', $Data);
        $this->load->view('ogrenciler', $Data);
        $this->load->view('inc/footer', $Data);
    }

    public function ogrencisil()
    {
        Login_Check();
        $Id = $this->uri->segment(2);
        $result = $this->Home_Model->Delete_Data('Users', $Id);
        if ($result) {
            $this->session->set_flashdata('success', "<script>toastr.success('Başarılı Şekilde Silindi.');</script>");
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('error', "<script>toastr.error('Silme İşlemi Başarısız.');</script>");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function ogrenciguncelle()
    {
        Login_Check();

        if ($this->input->post()) {
            $Id = $this->input->post("Id");
            $Ad = $this->input->post("Ad");
            $Soyad = $this->input->post("Soyad");
            $Email = $this->input->post("Email");
            $ogrencino = $this->input->post("ogrencino");
            $password = $this->input->post("password");
            $password2 = $this->input->post("password2");

            if ($password == $password2) {
                $Result = $this->Home_Model->Update_Ogrenci($Ad, $Soyad, $Email, $password, $ogrencino, $Id);
                if ($Result) {
                    $this->session->set_flashdata('success', "<script>toastr.success('Güncelleme Başarılı');</script>");
                    redirect($_SERVER['HTTP_REFERER']);
                } else {
                    $this->session->set_flashdata('error', "<script>toastr.error('Güncelleme sırasında Hata');</script>");
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }
        }
        $Id = $this->uri->segment(2);
        $Data['Ogrenci'] = $this->Home_Model->Get_User($Id);
        $this->load->view('inc/header', $Data);
        $this->load->view('ogrenciguncelle', $Data);
        $this->load->view('inc/footer', $Data);
    }

    public function ogrenciekle()
    {
        Login_Check();

        if ($this->input->post()) {
            $Name = $this->input->post("Ad");
            $Surname = $this->input->post("Soyad");
            $Email = $this->input->post("Email");
            $ogrencino = $this->input->post("ogrencino");
            $password = $this->input->post("password");
            $password2 = $this->input->post("password2");
            if ($password == $password2) {
                $Email_Check = $this->Home_Model->CheckMail($Email);
                if ($Email_Check) {
                    $Result = $this->Home_Model->addogrenci($Name, $Surname, $Email, $ogrencino, $password);
                    if ($Result) {
                        $this->session->set_flashdata('success', "<script>toastr.success('Ekleme başarılı');</script>");
                        redirect($_SERVER['HTTP_REFERER']);
                    } else {
                        $this->session->set_flashdata('error', "<script>toastr.error('Ekleme sırasında hata');</script>");
                        redirect($_SERVER['HTTP_REFERER']);
                    }
                } else {
                    $this->session->set_flashdata('error', "<script>toastr.error('Bu Mail adresi Daha önce kayıtlı');</script>");
                    redirect($_SERVER['HTTP_REFERER']);
                }
            } else {
                $this->session->set_flashdata('error', "<script>toastr.error('Şifreler Uyuşmuyor');</script>");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
        $this->load->view('inc/header');
        $this->load->view('ogrenciekle');
        $this->load->view('inc/footer');
    }

    public function ogrencilernot()
    {
        Login_Check();

        $Data['Ogrencilernot'] = $this->Home_Model->Get_Ogrenci_Not();
        $this->load->view('inc/header', $Data);
        $this->load->view('ogrencilernot', $Data);
        $this->load->view('inc/footer', $Data);
    }

    public function ogrencinotguncelle()
    {
        Login_Check();
        if ($this->input->post()) {
            $Id = $this->input->post("Id");
            $ogrencino = $this->input->post("ogrencino");
            $dersadi = $this->input->post("dersadi");
            $donem = $this->input->post("donem");
            $dersnot = $this->input->post("dersnot");
            $Result = $this->Home_Model->Update_Note($ogrencino, $dersadi, $donem, $dersnot, $Id);
            if ($Result) {
                $this->session->set_flashdata('success', "<script>toastr.success('Güncelleme başarılı');</script>");
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->session->set_flashdata('error', "<script>toastr.error('Güncelleme sırasında hata');</script>");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
        $Id = $this->uri->segment(2);
        $Data['Ogrencinot'] = $this->Home_Model->Get_Ogrenci_Not($Id);
        $this->load->view('inc/header');
        $this->load->view('ogrencinotguncelle', $Data);
        $this->load->view('inc/footer');
    }

    public function ogrencinotsil()
    {
        Login_Check();
        $Id = $this->uri->segment(2);
        $result = $this->Home_Model->Delete_Data('ogrencinot', $Id);
        if ($result) {
            $this->session->set_flashdata('success', "<script>toastr.success('Başarılı Şekilde Silindi.');</script>");
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('error', "<script>toastr.error('Silme İşlemi Başarısız.');</script>");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function ogrencinotekle()
    {
        Login_Check();
        if ($this->input->post()) {
            $ogrencino = $this->input->post("ogrencino");
            $dersadi = $this->input->post("dersadi");
            $donem = $this->input->post("donem");
            $dersnot = $this->input->post("dersnot");
            if ($ogrencino != 0) {
                $Result = $this->Home_Model->add_Note($ogrencino, $dersadi, $donem, $dersnot);
                if ($Result) {
                    $this->session->set_flashdata('success', "<script>toastr.success('Ekleme başarılı');</script>");
                    redirect($_SERVER['HTTP_REFERER']);
                } else {
                    $this->session->set_flashdata('error', "<script>toastr.error('Ekleme sırasında hata');</script>");
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }else{
                $this->session->set_flashdata('error', "<script>toastr.error('Ögrenci No Seçiniz');</script>");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
        $Data['Ogrenciler'] = $this->Home_Model->Get_ogrenciler();
        $this->load->view('inc/header');
        $this->load->view('ogrencinotekle', $Data);
        $this->load->view('inc/footer');
    }


    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('success', "<script>toastr.success('Başarılı Şekilde Çıkış Yapıldı . ');</script>");
        redirect('');
    }

}
