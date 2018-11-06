public static function getStandardMobileNumber($mobile, $includingCountryCode = true, $elevenToTenConvert = true){
        $mobile = preg_replace("/[^0-9]/", "", $mobile );

        if($includingCountryCode){
            if(substr($mobile, 0, 2) != '84'){
                $mobile = '84' . $mobile;
            }
        }

        if($elevenToTenConvert){
            $arrConvert = [
                //vinaphone
                '84123' => '8483',
                '84124' => '8484',
                '84125' => '8485',
                '84127' => '8481',
                '84129' => '8482',

                //viettel
                "84162" => "8432",
                "84163" => "8433",
                "84164" => "8434",
                "84165" => "8435",
                "84166" => "8436",
                "84167" => "8437",
                "84168" => "8438",
                "84169" => "8439",

                //mobifone
                "84120" => "8470",
                "84121" => "8479",
                "84122" => "8477",
                "84126" => "8476",
                "84128" => "8478",

                //vietnammobile
                "84188" => "8456",
                "84186" => "8458",

                //gtel
                "84199" => "8459",
            ];
            foreach ($arrConvert as $search => $replace){
                if(substr($mobile, 0, 5) == $search){
                    $mobile = $replace . substr($mobile, 5);
                }
            }
        }

        return $mobile;
    }
