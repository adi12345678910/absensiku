<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//untuk bulan indonesia
if ( ! function_exists('month_in'))
{
    function month_in($bln)
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
}

//format tanggal yyyy-mm-dd
if ( ! function_exists('tgl_in'))
{
    function tgl_in($tgl = '')
    {
        if (! is_null($tgl)) {
            # code...
        
            $ubah = gmdate($tgl, time()+60*60*8);
            $pecah = explode("-",$ubah);  //memecah variabel berdasarkan -
            $tanggal = $pecah[2];
            $bulan = month_in($pecah[1]);
            $tahun = $pecah[0];
        }
        return $tanggal.' '.$bulan.' '.$tahun; //hasil akhir
    }
}

//format tanggal yyyy-mm-dd H:i:s
if ( ! function_exists('datetime_in'))
{
    function datetime_in($datetime)
    {
        $ubah = gmdate($datetime);

        $array1 = explode("-", $ubah); // pecah tanggal

        $tanggal = $array1[2];
        $bulan = month_in($array1[1]);
        $tahun = $array1[0];

        $array2 = explode(" ", $tanggal);
        $tanggal = $array2[0];
        $spasi = $array2[1];

        $array3 = explode(":", $spasi);
        $jam = $array3[0];
        $menit = $array3[1];
        $detik = $array3[2];

        // $jamap = ap($jam, $menit);

        return $tanggal.' '.$bulan.' '.$tahun.', Jam '.$jam.':'.$menit.':'.$detik; //hasil akhir
    }
}

//untuk YYYY-MM-dd english
if ( ! function_exists('month_number'))
{
    function month_number($month)
    {
        switch ($month)
        {
            case "January":
                return '01';
                break;
            case "February":
                return '02';
                break;
            case "March":
                return '03';
                break;
            case "April":
                return '04';
                break;
            case "May":
                return '05';
                break;
            case "June":
                return '06';
                break;
            case "July":
                return '07';
                break;
            case "August":
                return '08';
                break;
            case "September":
                return '09';
                break;
            case "October":
                return '10';
                break;
            case "November":
                return '11';
                break;
            case "December":
                return '12';
                break;
        }
    }
}

//untuk mengetahui bulan bulan english
if ( ! function_exists('bulan_en'))
{
    function bulan_en($bln)
    {
        switch ($bln)
        {
            case 1:
                return "January";
                break;
            case 2:
                return "February";
                break;
            case 3:
                return "March";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "May";
                break;
            case 6:
                return "June";
                break;
            case 7:
                return "July";
                break;
            case 8:
                return "August";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "October";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "December";
                break;
        }
    }
}

//format tanggal yyyy-mm-dd
if ( ! function_exists('tgl_en'))
{
    function tgl_en($tgl = '')
    {
        if (! is_null($tgl)) {
            # code...
        
            $ubah = gmdate($tgl, time()+60*60*8);
            $pecah = explode("-",$ubah);  //memecah variabel berdasarkan -
            $tanggal = $pecah[2];
            $bulan_en = bulan_en($pecah[1]);
            $tahun = $pecah[0];
        }
        return $tanggal.' '.$bulan_en.' '.$tahun; //hasil akhir
    }
}

//format menghitung hari libur
if ( ! function_exists('sum_work_day'))
{
    function sum_work_day($year, $month, $ignore) 
    {
        $count = 0;
        $counter = mktime(0, 0, 0, $month, 1, $year);
        while (date("n", $counter) == $month) 
        {
            if (in_array(date("N", $counter), $ignore) == false)
            {
                $count++;
            }

            $counter = strtotime("+1 day", $counter);
        }

        return $count;
    }
}







































 




//untuk mengetahui waktu pm dan am
if ( ! function_exists('ap'))
{
    function ap($jam, $menit)
    {
       if ($jam > 12) 
       {
            if ($jam == 13) 
            {
               return '1:'.$menit.' pm';
            }

            if ($jam == 14) 
            {
               return '2:'.$menit.' pm';
            }

            if ($jam == 15) 
            {
               return '3:'.$menit.' pm';
            }

            if ($jam == 16) 
            {
               return '4:'.$menit.' pm';
            }

            if ($jam == 17) 
            {
               return '5:'.$menit.' pm';
            }

            if ($jam == 18) 
            {
               return '6:'.$menit.' pm';
            }

            if ($jam == 19) 
            {
               return '7:'.$menit.' pm';
            }

            if ($jam == 20) 
            {
               return '8:'.$menit.' pm';
            }

            if ($jam == 21) 
            {
               return '9:'.$menit.' pm';
            }

            if ($jam == 22) 
            {
               return '10:'.$menit.' pm';
            }

            if ($jam == 23) 
            {
               return '11:'.$menit.' pm';
            }
            
            if ($jam == 00) 
            {
               return '12:'.$menit.' pm';
            }
       }
       else
       {
            return $jam.':'.$menit.' am';
       } 
    }
}
 






//format tanggal yyyy-mm-dd
if ( ! function_exists('tgl_normal'))
{
    function tgl_normal($tgl = '')
    {
        if (! is_null($tgl)) {
            # code...
        
            $ubah = gmdate($tgl, time()+60*60*8);
            $pecah = explode("-",$ubah);  //memecah variabel berdasarkan -
            $tanggal = $pecah[2];
            $bulan = $pecah[1];
            $tahun = $pecah[0];
        }
        return $tanggal.'/'.$bulan.'/'.$tahun; //hasil akhir
    }
}


