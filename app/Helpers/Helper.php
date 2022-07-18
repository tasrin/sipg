<?php

if (! function_exists('on_php_id')) {
    function on_php_id()
    {
       return 'My Helper Ready';
    }
}

function waktu()
{
   date_default_timezone_set('Asia/Makassar');
   return date("Y-m-d H:i:s");
}

function tgl_indo($tgl)
{
    return substr($tgl, 8, 2).' '.getbln(substr($tgl, 5,2)).' '.substr($tgl, 0, 4);
}

function tgl_indojam($tgl,$pemisah)
{
    return substr($tgl, 8, 2).' '.getbln(substr($tgl, 5,2)).' '.substr($tgl, 0, 4).' '.$pemisah.' '.  substr($tgl, 11,5);
}

function getbln($bln)
{
    switch ($bln) 
    {
        case 1:
            return "Januari";
        break;
    
        case 2:
            return "Februari";
        break;
    
        case 3:
            return "Maret";
        break;
    
        case 4:
            return "April";
        break;
    
        case 5:
            return "Mei";
        break;
    
        case 6:
            return "Juni";
        break;
    
        case 7:
            return "Juli";
        break;
    
        case 8:
            return "Agustus";
        break;
    
        case 9:
            return "September";
        break;
    
         case 10:
            return "Oktober";
        break;
    
        case 11:
            return "November";
        break;
    
        case 12:
            return "Desember";
        break;
    }
}

function dayList($tgl)
{
    // $tanggal = '2018-11-01';
    // $date = date('D', strtotime($tanggal));
    $date = date('D', strtotime($tgl));
    $day = array(
        'Sun' => 'Minggu',
        'Mon' => 'Senin',
        'Tue' => 'Selasa',
        'Wed' => 'Rabu',
        'Thu' => 'Kamis',
        'Fri' => 'Jumat',
        'Sat' => 'Sabtu'
    );
    echo $day[$date];
    // return $date[$day];
}

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}