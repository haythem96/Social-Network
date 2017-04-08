<?php
    //Check if function not_empty exist
    if(!function_exists('not_empty')){
        /*
         * Define not_empty function with an array as a parameter: not_empty function check if a given field is not empty
         */
        function not_empty($fields=[]){
            if(count($fields) != 0){
                foreach($fields as $field){
                    if((empty($_POST[$field])) || (trim($_POST[$field]) == "")){
                        return false;
                    }
                }
            }
            return true;
        }
    }

    function verifyId($id, $sessionId){
        if($id != $sessionId){
            return false;
        }
        else{
            return true;
        }
    }

    function UploadImage($img){
        $filename = $img['tmp_name'];
        $client_id="62e1def0e61806f";
        $handle = fopen($filename, "r");
        $data = fread($handle, filesize($filename));
        $pvars   = array('image' => base64_encode($data));
        $timeout = 30;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
        curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
        $out = curl_exec($curl);
        curl_close ($curl);
        $pms = json_decode($out,true);
        $url=$pms['data']['link'];
        if($url!=""){
            return $url;
        }
        else{
            echo "<h2>There's a Problem</h2>";
            echo $pms['data']['error'];
        }
    }

    //replace link on post
    function replace_links($text){
        $regex_url = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\:[0-9]+)?(\/\S*)?/";
        return preg_replace($regex_url, "<a href=\"$0\" target=\"_blank\">$0</a>",$text);
    }
?>