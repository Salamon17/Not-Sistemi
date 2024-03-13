<?php
/**
 *Created by Salamon
 *Developed by Salamon
 *Project: Panel
 *Date: 1/8/2024
 *Time: 9:46 PM
 */
defined('BASEPATH') or exit('No direct script access allowed');

class Home_Model extends CI_Model
{
    public function Register($Name, $Surname, $Email, $password)
    {
        $Data = array(
            'Ad' => $Name,
            'Soyad' => $Surname,
            'Email' => $Email,
            'Sifre' => crypt_data($password),
        );
        return $this->db->insert('Users', $Data);
    }

    public function CheckMail($Email)
    {
        $this->db->where('Email', $Email);
        $Result = $this->db->get('Users')->row();
        if ($Result) {
            return false;
        } else {
            return true;
        }
    }

    public function Get_User($Id = Null)
    {
        if ($Id != NULL) {
            $this->db->where('Id', $Id);
            $result = $this->db->get('Users')->row();
        } else {
            $result = $this->db->get('Users')->result();
        }
        return $result;
    }

    public function Get_ogrenciler($Id = Null)
    {
        if ($Id != NULL) {
            $this->db->where('Id', $Id);
            $this->db->where('Yetki', 2);
            $result = $this->db->get('Users')->row();
        } else {
            $this->db->where('Yetki', 2);
            $result = $this->db->get('Users')->result();
        }
        return $result;
    }

    public function Get_Ogrenci_Not($Id = Null)
    {
        if ($Id != NULL) {
            $this->db->where('Id', $Id);
            $result = $this->db->get('ogrencinot')->row();
        } else {
            $result = $this->db->get('ogrencinot')->result();
        }
        return $result;
    }

    public function Update_Note($ogrencino, $dersadi, $donem, $dersnot, $Id)
    {
        $Data = array(
            'ogrencino' => $ogrencino,
            'dersadi' => $dersadi,
            'donem' => $donem,
            'dersnot' => $dersnot,
        );
        $this->db->where('Id', $Id);
        return $this->db->update('ogrencinot', $Data);
    }

    public function add_Note($ogrencino, $dersadi, $donem, $dersnot)
    {
        $Data = array(
            'ogrencino' => $ogrencino,
            'dersadi' => $dersadi,
            'donem' => $donem,
            'dersnot' => $dersnot,
        );
        return $this->db->insert('ogrencinot', $Data);
    }

    public function Login($Email, $Crypted_Password)
    {
        $result = $this->db->where('Email', $Email)->where('sifre', $Crypted_Password)->get('Users')->row();
        return $result;
    }

    public function Update_Ayar($Ad, $Soyad, $Email, $password, $Id)
    {
        $Data = array(
            'Ad' => $Ad,
            'Soyad' => $Soyad,
            'Email' => $Email,
        );
        if (!empty($password)) {
            $Data['Sifre'] = crypt_data($password);
        }
        $this->db->where('Id', $Id);
        return $this->db->update('Users', $Data);
    }

    public function Update_Ogrenci($Ad, $Soyad, $Email, $password, $ogrencino, $Id)
    {
        if($ogrencino == null OR empty($ogrencino)){
            $ogrencino = uniqid();
        }
        $Data = array(
            'Ad' => $Ad,
            'Soyad' => $Soyad,
            'Email' => $Email,
            'ogrencino' => $ogrencino,

        );
        if (!empty($password)) {
            $Data['Sifre'] = crypt_data($password);
        }
        $this->db->where('Id', $Id);
        return $this->db->update('Users', $Data);
    }

    public function addogrenci($Name, $Surname, $Email, $ogrencino, $password)
    {
        if($ogrencino == null OR empty($ogrencino)){
            $ogrencino = uniqid();
        }
        $Data = array(
            'Ad' => $Name,
            'Soyad' => $Surname,
            'Email' => $Email,
            'ogrencino' => $ogrencino,
            'Sifre' => crypt_data($password),
        );
        return $this->db->insert('Users', $Data);
    }

    public function Delete_Data($Table, $Id)
    {
        $this->db->where('Id', $Id);
        $result = $this->db->delete($Table);
        return $result;
    }


}