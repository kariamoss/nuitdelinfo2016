<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Jehan
 * Date: 02/08/2016
 * Time: 11:34
 */

class User_c extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form','text','string', 'email'));
        $this->load->library(array('form_validation','email'));
        $this->load->model('User_m');
    }

    public function index(){
        $this->twig->display('layout/base_layout');
    }
    /*
    public function check_rights()
    {
        if ($this->session->userdata('id_right') == 1) {
            redirect('Admin_c');
        }
        if ($this->session->userdata('id_right') == 2) {
            redirect('Interpret_c');
        }
    }


    public function index()
    {
        $this->check_rights();
        if(isset($error)){
            $this->twig->display('connection/form_connection',array('error' => "mot de passe ou login incorrect"));
        }
        if($this->session->userdata('id_right') != 3){
            $this->twig->display('connection/form_connection');
        }
        else{
            $this->twig->display('layout/homepage', array('first_name' => $this->session->userdata("first_name"),
                'id_right' => $this->session->userdata("id_right")));
        }
    }

    public function error_connection()
    {
        $this->check_rights();
        $this->twig->display('connection/form_connection',array('error' => "Email ou mot de passe incorrect"));
    }

    public function form_valid_connexion()
    {
        $this->check_rights();

        $this->form_validation->set_rules('mail','mail','trim|required');
        $this->form_validation->set_rules('password','Mot de passe','trim|required');

        $data= array(
            'mail'=>$this->input->post('mail'),
            'password'=>$this->input->post('password')
        );

        if($this->form_validation->run() == False){
            $this->twig->display('connection/form_connection');
        }
        else {
            $data['password'] = md5($data['password']);
            if(($sessionData=$this->User_m->verif_connexion($data)) != False)
            {
                $this->session->set_userdata($sessionData);
                redirect("User_c");
            }
            else{
                //Message d'erreur
                redirect("User_c/error_connection");
                //$this->twig->display('connection/form_connection',array('error' => "mot de passe ou login incorrect"));
            }
        }
    }

    public function register()
    {
        $this->check_rights();
        $this->twig->display('connection/form_register');
    }

    public function valid_register(){
        $data = $this->form_valid_register();


        if(is_null($data)){
            redirect("User_c/confirmation_register");
        }
        else{
            $this->twig->display('connection/form_register', $data);
        }
    }

    public function confirmation_register()
    {
        $this->twig->display("connection/register_done");
    }

    public function form_valid_register()
    {
        $this->form_validation->set_rules('last_name','nom','trim|required');
        $this->form_validation->set_rules('first_name','prénom','trim|required');
        $this->form_validation->set_rules('origin','origine','trim|required');
        $this->form_validation->set_rules('age','age','trim|required|less_than[99]|greater_than[13]');
        $this->form_validation->set_rules('first_name','prénom','trim|required');
        $this->form_validation->set_rules('adress','adresse','trim|required');
        $this->form_validation->set_rules('postal_code','code postal','trim|required');
        $this->form_validation->set_rules('town','ville','trim|required');
        $this->form_validation->set_rules('private_phone','téléphone privé','trim|required');
        $this->form_validation->set_rules('professional_phone','téléphone professionel','trim|required');
        $this->form_validation->set_rules('portable','téléphone portable','trim|required');
        $this->form_validation->set_rules('email','email','trim|required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password','mot de passe','trim|required|matches[password2]');
        $this->form_validation->set_rules('password2','vérification de mot de passe','trim|required');

        //Array for potential multiple languages
        $validations = array(
            array(
                'field' => 'language[]',
                'label' => 'Language',
                'rules' => 'trim|required',
            )
        );

        $this->form_validation->set_rules($validations);

        $data= array(
            'last_name'=>$this->input->post('last_name'),
            'first_name'=>$this->input->post('first_name'),
            'gender'=>$this->input->post('gender'),
            'origin'=>$this->input->post('origin'),
            'age'=>$this->input->post('age'),
            'qualification'=>$this->input->post('qualification'),
            'adress'=>$this->input->post('adress'),
            'postal_code'=>$this->input->post('postal_code'),
            'town'=>$this->input->post('town'),
            'private_phone'=>$this->input->post('private_phone'),
            'professional_phone'=>$this->input->post('professional_phone'),
            'portable'=>$this->input->post('portable'),
            'language'=>$this->input->post('language'),
            'id_lang_certificate'=>$this->input->post('id_lang_certificate'),
            'id_lang_type'=>$this->input->post('id_lang_type'),
            'email'=>$this->input->post('email'),
            'password'=>$this->input->post('password')
        );
        if($this->form_validation->run() == False){
            return $data;
        }
        else{
            $data['password'] = md5($data['password']);
            $data['id_right']=2;
            $data['confirmation']=2;
            $this->User_m->add_interpret($data);
            return NULL;
        }
    }

    public function disconnect()
    {
        $this->session->sess_destroy();
        redirect('User_c');
    }
    */
}

















