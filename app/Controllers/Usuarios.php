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
        $validation = service("validation");
        $validation->setRules([
            'user' => ['label' => 'user', 'rules' => 'required'],
            'password' => ['label' => 'password', 'rules' => 'required'] 
        ]);

        if(!$validation->withRequest($this->request)->run()){

            return redirect()->to(base_url("/"))->with("mensaje","0");
            echo json_encode(['errors'=>$validation->getErrors()]);

        }else{
            $username= $this->request->getPost("user");
            $paswd= $this->request->getPost("password");
            $adServer = "ldap://elotitos.local";
            $ldap = ldap_connect($adServer);
            $ldapRdn = "ELOTITOS\\".$username;

            ldap_set_option($ldap,LDAP_OPT_PROTOCOL_VERSION, 3);
            ldap_set_option($ldap,LDAP_OPT_REFERRALS, 0);
            $bind = @ldap_bind($ldap,$ldapRdn,$paswd);
            
            if ($bind) {
                $filter="(sAMAccountName=$username)";
                $result = ldap_search($ldap,"dc=elotitos,dc=local",$filter);
                ldap_sort($ldap,$result,"sn");
                $info = ldap_get_entries($ldap,$result);

                //print_r($info);
                $userAd = (string)$info[0]['samaccountname'][0];
                $emailAd =  (string)$info[0]['userprincipalname'][0];
                $type =  'admin';
                @ldap_close($ldap);

                $userobj = new UserModel();
                $dataUser = $userobj->getUser($userAd);
                
                if(count($dataUser)>0){
                    // Si exite el usuario
                    $data = [
                        "user" => $dataUser[0]["user"],
                        "email" => $dataUser[0]["email"],
                        "userId" => $dataUser[0]["user_id"],
                        "type" => $dataUser[0]["type"]
                    ];
                    $session = session();
                    $session->set($data);
                    return redirect()->to(base_url("/home"))->with("mensaje","1");

                }else{
                    // No exite el usuario
                    $userobj = new UserModel();
                    $id = $userobj->saveData(['user'=>$userAd,'email'=>$emailAd,'type' =>$type]);

                    if($dataUser >0){
                        $data = [
                            "user" => $userAd,
                            "email" => $emailAd,
                            "userId" => $id,
                            "type" => $type
                        ];
                        $session = session();
                        $session->set($data);
                        return redirect()->to(base_url("/home"))->with("mensaje","1");
                    }
                    
                }      
              }else{
                $msg = "Invalid email address / password";
                echo $msg;
              }


            /*$data = [
                'user' => $user,
                'password' => $password
            ];
            
            $userobj = new UserModel();
            $dataUSer = $userobj->getUser($data['user']); 
            
            if(count($dataUSer) > 0)
            {
                
                return redirect()->to(base_url("/home"))->with("mensaje","1");

            }else {

                return redirect()->to(base_url("/"))->with("mensaje","0");

            }*/
            
        }
        

        
    }
    public function exit()
    {
    
        $session = session();
        $session->destroy();
        return redirect()->to(base_url("/"));
    }
    
}
