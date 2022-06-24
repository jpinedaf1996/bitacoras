<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Session\Session;

class Usuarios extends BaseController
{
    public function index()
    {
        $message = session("mensaje");
        return view('login', ["mensaje"=>$message]);
    }
    public function home()
    {
        return view('home');
    }
    public function login()
    {
        $user= $this->request->getPost("user");
        $password= $this->request->getPost("password");

        $userobj = new UserModel();
        $dataUSer = $userobj->getUser(["user"=>$user]); 
        if(count($dataUSer) > 0 && password_verify($password, $dataUSer[0]["password"]))
        {
            $data = [
                        "name" => $dataUSer[0]["name"],
                        "user" => $dataUSer[0]["user"],
                        "userId" => $dataUSer[0]["user_id"],
                        "type" => $dataUSer[0]["type"]
                    ];
            $session = session();
            $session->set($data);
            return redirect()->to(base_url("/home"))->with("mensaje","1");

        }else {
            return redirect()->to(base_url("/"))->with("mensaje","0");
        }
    }
    public function exit()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url("/"));
    }
    
}
