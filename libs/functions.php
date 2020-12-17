<?php  
	function utf8convert($str) {
        if(!$str) return false;
        
        $utf8 = array(

        'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

        'd'=>'đ|Đ',

        'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

        'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',

        'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

        'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

        'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',);

        foreach($utf8 as $ascii=>$uni) $str = preg_replace("/($uni)/i", $ascii, $str);
        $str = str_replace(" ", "-", $str);
        $str = str_replace("/", "", $str);
        $str = str_replace("'", "", $str);
        $str = strtolower($str);
		return $str;
	}

    function DateToTime($date){
        $to_time = strtotime($date);
        $from_time = strtotime(date("Y-m-d H:i:s"));
        $second = abs($to_time - $from_time);

        $time = 0;

        if($second < 60){
                $time = $second;
                return $time." giây trước";
        }
        else if($second > 60 && $second < 3600){  //minute
                $time = floor($second/60);
                return $time." phút trước";
        }
        else if($second > 3600 && $second < 86400){//hour
                $time = floor($second/3600);
                return $time." giờ trước";
        }
        else if($second > 86400 && $second < 2678400){ //day
                $time = floor($second/86400);
                return $time." ngày trước";
        }
        else if($second > 2678400 && $second < 32140800){//month
                $time = floor($second/2678400);
                return $time." tháng trước";
        }
        else{//year
                $arr = explode('-', $date);
            $truoc = $arr[0];
            $curr = date("Y");
            $time = $curr - $truoc;
            return $time." năm trước";
        }
    }

    function ConvertDate($date){
        $myDate = date_create($date);
        echo date_format($myDate,"d/m/Y H:i:s");
    }

    function FormatText($str){
        $str = str_replace('"', '', $str);
        $str = str_replace('/', '', $str);
        $str = str_replace('\\', '', $str);
        $str = str_replace("'", '', $str);
        return $str;
    }

    function FormatText2($str){
        $str = str_replace('?', '', $str);
        $str = str_replace('/', '', $str);
        $str = str_replace('~', '', $str);
        $str = str_replace('*', '', $str);
        $str = str_replace('@', '', $str);
        $str = str_replace('!', '', $str);
        $str = str_replace('%', '', $str);
        $str = str_replace('^', '', $str);
        $str = str_replace('&', '', $str);
        $str = str_replace('(', '', $str);
        $str = str_replace(')', '', $str);
        $str = str_replace('=', '', $str);
        $str = str_replace('+', '', $str);
        $str = str_replace(';', '', $str);
        $str = str_replace('\\', '', $str);
        $str = str_replace('.', '', $str);
        $str = str_replace(',', '', $str);
        $str = str_replace('`', '', $str);
        $str = str_replace('#', '', $str);
        $str = str_replace('$', '', $str);
        $str = str_replace('"', '', $str);
        $str = str_replace('{', '', $str);
        $str = str_replace('}', '', $str);
        return $str;
    }

    function Preview($str){
        return str_replace('\\', '', $str);
    }

    function RandomCode(){
        $len = 6;
        return substr(md5(rand()), 0, $len);
    }
    
    function Content($str){
		return str_replace("\n", '<br>', $str);
        }
        
        function MyWorldCount($str){
		$count = 0;

		$str = explode(' ', $str);

		for ($i=0; $i < count($str) ; $i++) { 
			if($str[$i] == '<br />')
				$count++;
		}

		$count += count($str);

		return $count;
	}

?>