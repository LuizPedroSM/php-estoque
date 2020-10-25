<?php
class homeController extends Controller 
{
    public function __construct()
    {
        parent::__construct();

        $this->user = new Users();
        if (! $this->user->checkLogin()) {
            header("Location: ".BASE_URL."login");
            exit();
        }
    }

    public function index() 
    {
        $data = array(
            'menu' => array(
                BASE_URL.'home/add' => 'Adicionar Produto',
                BASE_URL.'report' => 'Relatório',
                BASE_URL.'login/logout' => 'Sair',
            )
        );
        $products = new Products();
        $search = '';
        
        if (!empty($_GET['search'])) {
            $search = $_GET['search'];
        }

        $data['list'] = $products->getProducts($search);
        
        $this->loadTemplate('home', $data);
    }

    public function add() 
    {
        $data = array(
            'menu' => array(
                BASE_URL => 'Voltar'
            )
        );
        $products = new Products();
        $filters = new FiltersHelper();


        if (!empty($_POST['cod'])) {
            $cod = filter_input(INPUT_POST, 'cod', FILTER_VALIDATE_INT);
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $price = $filters->filter_post_money('price');
            $quantity = $filters->filter_post_money('quantity');
            $min_quantity = $filters->filter_post_money('min_quantity');

            if ($cod && $name && $price && $quantity && $min_quantity) {
                $products->addProduct($cod, $name, $price, $quantity, $min_quantity);
                header("Location: ".BASE_URL);
                exit;
            } else {
               $data['warning'] = "Digite os campos corretamente";
            }          
        }
        $this->loadTemplate('add', $data);
    }

    public function edit($id) 
    {
        $data = array(
            'menu' => array(
                BASE_URL => 'Voltar'
            )
        );
        $products = new Products();
        $filters = new FiltersHelper();
        if (!empty($_POST['cod'])) {
            $cod = filter_input(INPUT_POST, 'cod', FILTER_VALIDATE_INT);
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $price = $filters->filter_post_money('price');
            $quantity = $filters->filter_post_money('quantity');
            $min_quantity = $filters->filter_post_money('min_quantity');

            if ($cod && $name && $price && $quantity && $min_quantity) {
                $products->editProduct($cod, $name, $price, $quantity, $min_quantity, $id);
                header("Location: ".BASE_URL);
                exit;
            } else {
                $data['warning'] = "Digite os campos corretamente";
            }   
        }
        $data['info'] = $products->getProduct($id);
        $this->loadTemplate('edit', $data);
    }

    public function logout()
    {
        unset($_SESSION['token']);
        header("Location: ".BASE_URL."login");
        exit;
    }
}