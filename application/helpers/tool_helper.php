<?php
function Login_Check()
{
    if (empty($_SESSION['User_Id'])) {
        redirect('', 'refresh');
    }
}

function Get_Ogrenci_By_No($ogrencino)
{
    $ci = get_instance();
    $ci->db->where('ogrencino', $ogrencino);
    return $ci->db->get('Users')->row();

}

function Email_Send($ToMail, $Subject, $Detail)
{
    $ci = get_instance();
    $ci->load->library('Phpmailler_lib');
    $Settings = $ci->Admin_Model->Get_Settings();
    $mail = $ci->phpmailler_lib->load();
    $mail->ClearAddresses();
    $mail->ClearAttachments();
    $mail->isSMTP();
    $mail->Host = $Settings->Smtp;
    $mail->SMTPAuth = true;
    $mail->Username = $Settings->Smtp_User;
    $mail->Password = $Settings->Smtp_Pass;
    $mail->SMTPSecure = 'ssl';
    $mail->Port = $Settings->Smtp_Port;
    $mail->CharSet = 'UTF-8';

    $mail->setFrom('salamondoe@gmail.com', $Subject);
    $mail->addAddress($ToMail);

    $mail->Subject = $Subject;

    $mail->isHTML(true);
    $message = $Detail;
    $mail->Body = $message;
    $status = '';
    if (!$mail->send()) {
        return $status = 'Mailler Error: ' . $mail->ErrorInfo;
    } else {
        return $status;
    }
}

function Seo_Url($fonktmp)
{
    $returnstr = "";
    $turkcefrom = array("/Ğ/", "/Ü/", "/Ş/", "/İ/", "/Ö/", "/Ç/", "/ğ/", "/ü/", "/ş/", "/ı/", "/ö/", "/ç/");
    $turkceto = array("G", "U", "S", "I", "O", "C", "g", "u", "s", "i", "o", "c");
    $fonktmp = preg_replace("/[^0-9a-zA-ZÄzÜŞİÖÇğüşıöç]/", " ", $fonktmp);
    $fonktmp = preg_replace($turkcefrom, $turkceto, $fonktmp);
    $fonktmp = preg_replace("/ +/", " ", $fonktmp);
    $fonktmp = preg_replace("/ /", "-", $fonktmp);
    $fonktmp = preg_replace("/\s/", "", $fonktmp);
    $fonktmp = strtolower($fonktmp);
    $fonktmp = preg_replace("/^-/", "", $fonktmp);
    $fonktmp = preg_replace("/-$/", "", $fonktmp);
    return $fonktmp;
}

function Turkish_Date($format, $datetime = 'now')
{
    $z = date("$format", strtotime($datetime));
    $gun_dizi = array(
        'Monday' => 'Pazartesi',
        'Tuesday' => 'Salı',
        'Wednesday' => 'Çarşamba',
        'Thursday' => 'Perşembe',
        'Friday' => 'Cuma',
        'Saturday' => 'Cumartesi',
        'Sunday' => 'Pazar',
        'January' => 'Ocak',
        'February' => 'Şubat',
        'March' => 'Mart',
        'April' => 'Nisan',
        'May' => 'Mayıs',
        'June' => 'Haziran',
        'July' => 'Temmuz',
        'August' => 'Ağustos',
        'September' => 'Eylül',
        'October' => 'Ekim',
        'November' => 'Kasım',
        'December' => 'Aralık',
        'Mon' => 'Pts',
        'Tue' => 'Sal',
        'Wed' => 'Çar',
        'Thu' => 'Per',
        'Fri' => 'Cum',
        'Sat' => 'Cts',
        'Sun' => 'Paz',
        'Jan' => 'Oca',
        'Feb' => 'Şub',
        'Mar' => 'Mar',
        'Apr' => 'Nis',
        'Jun' => 'Haz',
        'Jul' => 'Tem',
        'Aug' => 'Ağu',
        'Sep' => 'Eyl',
        'Oct' => 'Eki',
        'Nov' => 'Kas',
        'Dec' => 'Ara',
    );
    foreach ($gun_dizi as $en => $tr) {
        $z = str_replace($en, $tr, $z);
    }
    if (strpos($z, 'Mayıs') !== false && strpos($format, 'F') === false) $z = str_replace('Mayıs', 'May', $z);
    return $z;
}

function timeConvert($zaman)
{
    $zaman = strtotime($zaman);
    $zaman_farki = time() - $zaman;
    $saniye = $zaman_farki;
    $dakika = round($zaman_farki / 60);
    $saat = round($zaman_farki / 3600);
    $gun = round($zaman_farki / 86400);
    $hafta = round($zaman_farki / 604800);
    $ay = round($zaman_farki / 2419200);
    $yil = round($zaman_farki / 29030400);
    if ($saniye < 60) {
        if ($saniye == 0) {
            return "az önce";
        } else {
            return $saniye . ' saniye önce';
        }
    } else if ($dakika < 60) {
        return $dakika . ' dakika önce';
    } else if ($saat < 24) {
        return $saat . ' saat önce';
    } else if ($gun < 7) {
        return $gun . ' gün önce';
    } else if ($hafta < 4) {
        return $hafta . ' hafta önce';
    } else if ($ay < 12) {
        return $ay . ' ay önce';
    } else {
        return $yil . ' yıl önce';
    }
}

function convertSecToStr($secs)
{
    $output = '';
    if ($secs >= 86400) {
        $days = floor($secs / 86400);
        $secs = $secs % 86400;
        $output = $days . ' Gün';
        if ($days != 1) $output .= '';
        if ($secs > 0) $output .= ', ';
    }
    if ($secs >= 3600) {
        $hours = floor($secs / 3600);
        $secs = $secs % 3600;
        $output .= $hours . ' Saat';
        if ($hours != 1) $output .= '';
        if ($secs > 0) $output .= ', ';
    }
    if ($secs >= 60) {
        $minutes = floor($secs / 60);
        $secs = $secs % 60;
        $output .= $minutes . ' Dakika';
        if ($minutes != 1) $output .= '';
        if ($secs > 0) $output .= ', ';
    }
    $output .= $secs . ' Saniye';
    if ($secs != 1) $output .= '';
    return $output;
}

function crypt_data($data)
{
    $crypt = sha1(md5(crc32(sha1(md5($data)))));
    return $crypt;
}

function Random_Password()
{
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $password = array();
    $alpha_length = strlen($alphabet) - 1;
    for ($i = 0; $i < 12; $i++) {
        $n = rand(0, $alpha_length);
        $password[] = $alphabet[$n];
    }
    return implode($password);
}

function Text_To_Ucfirst($text)
{
    $text = strtolower($text);
    $text = ucfirst($text);
    return $text;
}

function Count_Data($Table, $Where_Colm = NULL, $Where_Data = NULL)
{
    $ci = get_instance();
    if ($Where_Colm != NULL) {
        $ci->db->where($Where_Colm, $Where_Data);
    }
    $ci->db->from($Table);
    return $ci->db->count_all_results();
}

function Initialize_Pagination($Total_Rows, $Per_Page, $Uri_Segment, $Uri)
{
    $CI =& get_instance();
    $CI->load->library('pagination');
    $config['base_url'] = base_url($Uri);
    $config['total_rows'] = $Total_Rows;
    $config['per_page'] = $Per_Page;
    $config['uri_segment'] = $Uri_Segment;
    $config['use_page_numbers'] = TRUE;
    $config['num_links'] = 2;
    $config['full_tag_open'] = '<ul class="styled-pagination text-center clearfix">';
    $config['full_tag_close'] = '</ul>';
    $config['first_tag_open'] = '<li class="">';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li class="">';
    $config['last_tag_close'] = '</li>';
    $config['next_tag_open'] = '<li class="next">';
    $config['next_tag_close'] = '</li>';
    $config['prev_tag_open'] = '<li class="prev">';
    $config['prev_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li><a href="#" class="active">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['anchor_class'] = 'page-link';

    $CI->pagination->initialize($config);
}

function Img_Uploader($Path = NULL, $Input_Name = NULL)
{
    $ci = get_instance();
    if ($Path != NULL) {
        if (!file_exists('uploads/' . $Path)) {
            mkdir('uploads/' . $Path, 0777, true);
        }
        $Full_Path = 'uploads/' . $Path . '/';
    } else {
        if (!file_exists('uploads/')) {
            mkdir('uploads/', 0777, true);
        }
        $Full_Path = 'uploads/';
    }
    if ($Input_Name == NULL) {
        $Input_Name = 'file';
    }
    $config['upload_path'] = $Full_Path;
    $config['encrypt_name'] = TRUE;
    $config['allowed_types'] = '*';
    $ci->load->library('upload', $config);
    if (!$ci->upload->do_upload($Input_Name)) {
        $error = array('error' => $ci->upload->display_errors());
        return $error;
    } else {
        $filename = $ci->upload->data();
        $ext = pathinfo($_FILES[$Input_Name]['name'], PATHINFO_EXTENSION);
        if ($ext == 'jpg' || $ext == 'png' || $ext == 'gif' || $ext == 'jpeg') {
            $image_data = $ci->upload->data();
            $ci->load->library('image_lib');
            $config['image_library'] = 'gd';
            $config['source_image'] = $Full_Path . $image_data['file_name'];
            $config['new_image'] = $Full_Path . $image_data['file_name'];
            $ci->image_lib->initialize($config);

            if (!$ci->image_lib->resize()) {
                return $ci->image_lib->display_errors();
            } else {
                return $image_data['file_name'];
            }
        } else {
            return 0;
        }
    }
}

function Id_To_Data($Table, $Id)
{
    $ci = get_instance();
    if ($Id == 0) {
        return ' ';
    } else {
        $Data = $ci->db->where('Id', $Id)->get($Table)->row();
        return $Data;
    }
}

function Break_Long_Text($Text, $Text_Count = 50)
{
    $Text = wordwrap($Text, $Text_Count, "<br>", true);
    return $Text;
}

function Is_Active($Menu_Link, $Class = 'Active')
{
    $CI =& get_instance();
    $current_link = $CI->uri->uri_string();
    if ($Menu_Link === 'home' && $current_link === '') {
        return $Class;
    } elseif ($current_link === $Menu_Link) {
        return $Class;
    }
    return $current_link;
}

function Multiple_Image_Uploader($Path = NULL, $Input_Name = NULL)
{
    $CI =& get_instance();

    if ($Path != NULL) {
        if (!file_exists('uploads/' . $Path)) {
            mkdir('uploads/' . $Path, 0777, true);
        }
        $Full_Path = 'uploads/' . $Path . '/';
    } else {
        if (!file_exists('uploads/')) {
            mkdir('uploads/', 0777, true);
        }
        $Full_Path = 'uploads/';
    }

    if ($Input_Name == NULL) {
        $Input_Name = 'file';
    }

    $config['upload_path'] = $Full_Path;
    $config['encrypt_name'] = TRUE;
    $config['allowed_types'] = '*';
    $CI->load->library('upload', $config);

    $uploadedFiles = array();

    if (!isset($_FILES[$Input_Name]['name'][0])) {
        $error = array('error' => 'No files were selected.');
        return $error;
    }

    $fileCount = count($_FILES[$Input_Name]['name']);
    for ($i = 0; $i < $fileCount; $i++) {
        $_FILES['file']['name'] = $_FILES[$Input_Name]['name'][$i];
        $_FILES['file']['type'] = $_FILES[$Input_Name]['type'][$i];
        $_FILES['file']['tmp_name'] = $_FILES[$Input_Name]['tmp_name'][$i];
        $_FILES['file']['error'] = $_FILES[$Input_Name]['error'][$i];
        $_FILES['file']['size'] = $_FILES[$Input_Name]['size'][$i];

        if ($CI->upload->do_upload('file')) {
            $uploadedFiles[] = $CI->upload->data('file_name');
        } else {
            $error = array('error' => $CI->upload->display_errors());
            $uploadedFiles[] = $error;
        }
    }

    return json_encode($uploadedFiles);
}

?>