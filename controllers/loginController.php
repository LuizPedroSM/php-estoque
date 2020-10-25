<?php 
class loginController extends Controller
{
    public function index()
    {
        $data = array(
            'msg' => ''
        );
        
        if (!empty($_POST['number'])) {
            $number = $_POST['number'];
            $password = $_POST['password'];

            $users = new Users();

            if ($users->verifyUser($number, $password)) {
                $token = $users->createToken($number);
                $_SESSION['token'] = $token;
                header("Location: ".BASE_URL);
            } else {
                $data['msg'] = "Número e/ou senha errados!";
            }            
        }
        $this->loadView('login', $data);
    }
}