<?php

namespace App\Class;

class Client{

    private string $url;

    function __construct($url)
    {
        $this->url=$url;
    }

    public function reg($login,$password)
    {
        $data = json_encode(['login' => $login, 'password' => $password], JSON_UNESCAPED_UNICODE);
        if (($data["login"] == "") || ($data["password"] == "")) {
            return "{\"status\"': \"400\",\"message\": \"Enter login or password\"}";
        }

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->url.'/user');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $output = curl_exec($ch);

        curl_close($ch);

        if ($output === FALSE) {
            return "{\"status\"': \"400\",\"message\": \"cURL Error: \". curl_error($ch)}";
        } else {
            return "{\"status\"': \"200\",\"message\": \"OK\"}";
        }

    }

    public function authentication($login,$password)
    {
        $data = json_encode(['login' => $login, 'password' => $password], JSON_UNESCAPED_UNICODE);
        $urls=$this->url.'/user/auth';
        $auth_login=$data["login"];
        $auth_password=$data["password"];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $urls);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERPWD, "$auth_login:$auth_password");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_UNRESTRICTED_AUTH, 1);

        $output = curl_exec($ch);

        curl_close($ch);

        if ($output === FALSE) {
            return "{\"status\"': \"400\",\"message\": \"cURL Error: \". curl_error($ch)}";
        } else {
            return "{\"status\"': \"200\",\"message\": \"OK\"}";
        }

    }


    public function add_todo($login,$text)
    {
        $data = json_encode(['login' => $login, 'text' => $text], JSON_UNESCAPED_UNICODE);


        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->url.'/todo/add');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $output = curl_exec($ch);

        curl_close($ch);

        if ($output === FALSE) {
            return "{\"status\"': \"400\",\"message\": \"cURL Error: \". curl_error($ch)}";
        } else {
            return "{\"status\"': \"200\",\"message\": \"OK\"}";
        }

    }

    public function get_todo($id)
    {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->url.'/todo/'.$id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($ch);

        curl_close($ch);

        if ($output === FALSE) {
            return "{\"status\"': \"400\",\"message\": \"cURL Error: \". curl_error($ch)}";
        } else {
            return "{\"status\"': \"200\",\"message\": $output";
        }

    }

    public function del_todo($id,$login,$text)
    {
        $data = json_encode(['id'=>$id,'login' => $login, 'text' => $text], JSON_UNESCAPED_UNICODE);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url.'todo/del'.$id);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $output = curl_exec($ch);

        curl_close($ch);

        if ($output === FALSE) {
            return "{\"status\"': \"400\",\"message\": \"cURL Error: \". curl_error($ch)}";
        } else {
            return "{\"status\"': \"200\",\"message\": \"OK\"";
        }

    }

    public function edit_todo($id,$login,$text)
    {
        $data = json_encode(['login' => $login, 'text' => $text], JSON_UNESCAPED_UNICODE);



        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url.'todo/edit'.$id);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $output = curl_exec($ch);

        curl_close($ch);

        if ($output === FALSE) {
            return "{\"status\"': \"400\",\"message\": \"cURL Error: \". curl_error($ch)}";
        } else {
            return "{\"status\"': \"200\",\"message\": \"OK\"";
        }

    }

}
