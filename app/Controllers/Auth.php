<?php

namespace App\Controllers;
use App\Libraries\Hash;


class Auth extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    public function index()
    {
        return view('auth/login');
    }

    public function register(){
        return view('auth/register');

    }

    public function save(){
        $email = $this->request->getPost('email');
        session()->set('email', $email);
        $username = $this->request->getPost('username');
        session()->set('username', $username);
       //$validation = $this->validate([
         //  'name' => 'required',
           //'email' => 'required|valid_email|is_unique[users.email]',
           //'password' => 'required|min_length[5]|max_length[12]',
           //'cpassword' => 'required|min_length[5]|max_length[12]|matches[password]'
     //  ]);
            $validation = $this->validate([
                'username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Your full name is required'
                        ]
                    ],
                    'email'=> [
                        'rules' => 'required|valid_email|is_unique[users.email]',
                        'errors' => [
                            'required' => 'Email is required',
                            'valid_email' => 'You must enter a valid email',
                            'is_unique' => 'Email already exist'

                        ]
                    ],

                    'password'=> [
                        'rules' => 'required|min_length[5]|max_length[12]',
                        'errors' => [
                            'required' => 'Password is required',
                            'min_length' => 'Password is too short',
                            'max_length' => 'Password is too long'
                        ]
                    ],

                    'cpassword'=> [
                        'rules' => 'required|min_length[5]|max_length[12]|matches[password]',
                        'errors' => [
                            'required' => 'Confirm password is required',
                            'min_length' => 'Confirm password is too short',
                            'max_length' => 'Confirm password is too long',
                            'matches' => 'Password does not match'
                        ]
                        ],
                    
                
            ]);


       if(!$validation){
              return view('register', [
                'validation' => $this->validator
              ]);
         }else{
               $username = $this->request->getPost('username');
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');
                $values = [
                    'username' => $username,
                    'email' => $email,
                    'password' => Hash::make($password)
                ];
                $userModel = new \App\Models\UsersModel();
                $query = $userModel->insert($values);
                if(!$query){
                    return redirect()->back()->with('fail', 'An error occured');
                    //return redirect()->to('/register')->with('fail', 'An error occured');
                }else{
                    return redirect()->to('/register')->with('success', 'You are now registered');
                }


                    
    }
}
function check(){
    //echo "I am here";
    $email = $this->request->getPost('email');
    session()->set('email', $email);
    $validation = $this->validate([
        'email' => [
            'rules' => 'required|valid_email|is_not_unique[users.email]',
            'errors' => [
                'required' => 'Email is required',
                'valid_email' => 'You must enter a valid email',
                'is_not_unique' => 'This email does not exist in our database'
            ]
        ],

        'password'=> [
            'rules' => 'required|min_length[5]|max_length[12]',
            'errors' => [
                'required' => 'Password is required',
                'min_length' => 'Password is too short',
                'max_length' => 'Password is too long'
            ]
        ]
    ]);
    if(!$validation){
        return view('auth/login', [
            'validation' => $this->validator
        ]);
    }else{
       // echo "I am here";

       $email = $this->request->getPost('email');
         $password = $this->request->getPost('password');
            $userModel = new \App\Models\UsersModel();
            $user_info = $userModel->where('email', $email)->first();
            $check_password = Hash::check($password, $user_info['password']);

            if(!$check_password){
                session()->setFlashdata('fail', 'Incorrect password');
                return redirect()->to('/login')->withInput();
            }
            else{
                $user_id = $user_info['id'];
                session()->set('loggeduser', $user_id);
                return redirect()->to('/dashboard');
            }

         

}


}
}