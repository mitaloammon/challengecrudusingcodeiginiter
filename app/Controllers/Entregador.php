<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\JoinModel;

class Entregador extends BaseController
{

    private $JoinModel;

    public function __construct()
    {
        $this->JoinModel = new JoinModel();
    }

    
    public function index($cd_entregador = null)
    {

         return view('entregador', [
             'entregador' => $this->JoinModel->showAddressDeliveryman($cd_entregador)
         ]);
    }

    public function delete($cd_entregador = null)
    {

        if(!empty($this->JoinModel->deleteAddressDeliveryman($cd_entregador)))
        {

            echo view ('message', [
                'message' => 'Successfully Deleted!'
            ]);

        }
                  
    }

    public function insert()
    {
        return view('form');
    }
    
    
    public function create()
    {
        
        $data = [
            'entregador' => [
                'nm_entregador' => $_POST['nome'],
                'dt_nascimento' => $_POST['nascimento'],
                'ds_email' => $_POST['email'],
            ],
            'endereco' => [
                'cep' => $_POST['cep'],
                'bairro' => $_POST['bairro'],
                'cidade' => $_POST['cidade'],
                'uf' => $_POST['uf'],
                'endereco' => $_POST['endereco']              
                ]
            ];
            
        if($this->JoinModel->insertAddressDeliveryman($data)){
            
            return view("message", [
                'message' => 'Successfully Registered!'
            ]);

        }
    }

    
    public function showUpdate($cd_entregador = null)
    {
               
        return view("form", [
            'entregador' => $this->JoinModel->showAddressDeliveryman($_GET['cd_entregador'])
        ]);
    } 

    public function edit()
    {
              
        $data = [
            'entregador' => [
                'cd_entregador' => $_POST['cd_entregador'],
                'nm_entregador' => $_POST['nome'],
                'dt_nascimento' => $_POST['nascimento'],
                'ds_email' => $_POST['email'],
            ],
            'endereco' => [
                'cep' => $_POST['cep'],
                'bairro' => $_POST['bairro'],
                'cidade' => $_POST['cidade'],
                'uf' => $_POST['uf'],
                'endereco' => $_POST['endereco']              
                ]
            ];
        
            
            if($this->JoinModel->editAddressDeliveryman($data)){
                
                return view("message", [
                    'message' => 'Successfully Registered!'
                ]);
                
            }
    }
 
}
