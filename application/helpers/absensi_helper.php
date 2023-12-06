<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    if (!function_exists('tanggal_indo')) {
    	function tanggal_indo($date) {
    		$jam = substr($date, 11, 5);
    
    		$date = date('Y-m-d',strtotime($date));
    	    if($date == '0000-00-00')
    	        return 'Tanggal Kosong';
    	 	
    	    $tgl = substr($date, 8, 2);
    	    $bln = substr($date, 5, 2);
    	    $thn = substr($date, 0, 4);
    	 
    	    switch ($bln) {
    	        case 1 : {
    	                $bln = '01';
    	            }break;
    	        case 2 : {
    	                $bln = '02';
    	            }break;
    	        case 3 : {
    	                $bln = '03';
    	            }break;
    	        case 4 : {
    	                $bln = '04';
    	            }break;
    	        case 5 : {
    	                $bln = '05';
    	            }break;
    	        case 6 : {
    	                $bln = "06";
    	            }break;
    	        case 7 : {
    	                $bln = '07';
    	            }break;
    	        case 8 : {
    	                $bln = '08';
    	            }break;
    	        case 9 : {
    	                $bln = '09';
    	            }break;
    	        case 10 : {
    	                $bln = '10';
    	            }break;
    	        case 11 : {
    	                $bln = '11';
    	            }break;
    	        case 12 : {
    	                $bln = '12';
    	            }break;
    	        default: {
    	                $bln = 'UnKnown';
    	            }break;
    	    }
    	 
    	    $hari = date('N', strtotime($date));
    	    switch ($hari) {
    	        case 7 : {
    	                $hari = 'Minggu';
    	            }break;
    	        case 1 : {
    	                $hari = 'Senin';
    	            }break;
    	        case 2 : {
    	                $hari = 'Selasa';
    	            }break;
    	        case 3 : {
    	                $hari = 'Rabu';
    	            }break;
    	        case 4 : {
    	                $hari = 'Kamis';
    	            }break;
    	        case 5 : {
    	                $hari = "Jum'at";
    	            }break;
    	        case 6 : {
    	                $hari = 'Sabtu';
    	            }break;
    	        default: {
    	                $hari = 'UnKnown';
    	            }break;
    	    }
    	 
    	    $tanggalIndonesia = $hari.", ".$tgl . "/" . $bln . "/" . $thn . " " . $jam;
    	    return $tanggalIndonesia;
    	}   
    }
    
    if (!function_exists('bulan_indo')) {
    	function bulan_indo($bulan) {
    	 
    	    switch ($bulan) {
    	        case 1 : {
    	                $bulan = 'Januari';
    	            }break;
    	        case 2 : {
    	                $bulan = 'Februari';
    	            }break;
    	        case 3 : {
    	                $bulan = 'Maret';
    	            }break;
    	        case 4 : {
    	                $bulan = 'April';
    	            }break;
    	        case 5 : {
    	                $bulan = 'Mei';
    	            }break;
    	        case 6 : {
    	                $bulan = "Juni";
    	            }break;
    	        case 7 : {
    	                $bulan = 'Juli';
    	            }break;
    	        case 8 : {
    	                $bulan = 'Agustus';
    	            }break;
    	        case 9 : {
    	                $bulan = 'Septer';
    	            }break;
    	        case 10 : {
    	                $bulan = 'Oktober';
    	            }break;
    	        case 11 : {
    	                $bulan = 'November';
    	            }break;
    	        case 12 : {
    	                $bulan = 'Desember';
    	            }break;
    	        default: {
    	                $bulan = 'UnKnown';
    	            }break;
    	    }
    	 	 
       	    return $bulan;
    	}   
    }
 
    if (!function_exists('getUserInfo')) {
    	function getUserInfo($authID){
    		$CI =& get_instance();
            $CI->load->model('model_master');
            $dataUser = $CI->model_master->getDataUser($authID);
            return $dataUser;
    	}
    }
    
    if (!function_exists('getWorkingDays')) {
    	function getWorkingDays($startDate,$endDate,$holidays) {
   	        $endDate = strtotime($endDate);
            $startDate = strtotime($startDate);
        
            $days = ($endDate - $startDate) / 86400 + 1;
        
            $no_full_weeks = floor($days / 7);
            $no_remaining_days = fmod($days, 7);
        
            $the_first_day_of_week = date("N", $startDate);
            $the_last_day_of_week = date("N", $endDate);
        
    
            if ($the_first_day_of_week <= $the_last_day_of_week) {
                if ($the_first_day_of_week <= 6 && 6 <= $the_last_day_of_week) $no_remaining_days--;
                if ($the_first_day_of_week <= 7 && 7 <= $the_last_day_of_week) $no_remaining_days--;
            } else {
                if ($the_first_day_of_week == 7) {
                    $no_remaining_days--;
        
                    if ($the_last_day_of_week == 6) {
                        $no_remaining_days--;
                    }
                } else {
                    $no_remaining_days -= 2;
                }
            }
        
            $workingDays = $no_full_weeks * 5;
            if ($no_remaining_days > 0 ){
              $workingDays += $no_remaining_days;
            }
        
            foreach($holidays as $holiday){
                $time_stamp=strtotime($holiday);
                //If the holiday doesn't fall in weekend
                if ($startDate <= $time_stamp && $time_stamp <= $endDate && date("N",$time_stamp) != 6 && date("N",$time_stamp) != 7)
                    $workingDays--;
            }
            
            return $workingDays;
    	}   
    }
    
    if ( ! function_exists('html_escape'))
    {
    
        function html_escape($var, $double_encode = TRUE)
        {
            if (empty($var))
            {
                return $var;
            }
    
            if (is_array($var))
            {
                foreach (array_keys($var) as $key)
                {
                    $var[$key] = html_escape($var[$key], $double_encode);
                }
    
                return $var;
            }
    
            return htmlspecialchars($var, ENT_QUOTES, config_item('charset'), $double_encode);
        }
    }