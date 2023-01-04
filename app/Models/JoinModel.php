<?php

namespace App\Models;

use CodeIgniter\Model;

class JoinModel extends Model
{

    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }
    
    public function showAddressDeliveryman($cd_entregador = null)
    {
        $builder = $this->db->table('entregador');
        $builder->select('entregador.cd_entregador, entregador.nm_entregador as nome, entregador.dt_nascimento as nascimento, entregador.ds_email as email, endereco.cep as cep, endereco.bairro as bairro, endereco.cidade as cidade, endereco.uf as uf, endereco.cidade as cidade');
        $builder->join('endereco', 'endereco.cd_endereco = endereco.cd_endereco');

        if(!empty($cd_entregador)){        

            $builder->where('entregador.cd_entregador', $cd_entregador);

        }
        
        $query = $builder->get();  

        return $query->getResult();

    }

    public function deleteAddressDeliveryman($cd_entregador = null)
    {

        $builder = $this->db->table('entregador');
        $builder->select('entregador.cd_entregador, entregador.nm_entregador as nome, entregador.dt_nascimento as nascimento, entregador.ds_email as email, endereco.cep as cep, endereco.bairro as bairro, endereco.cidade as cidade, endereco.uf as uf');
        $builder->join('endereco', 'endereco.cd_endereco = endereco.cd_endereco');
        $query = $builder->get();  

        if(!empty($cd_entregador)){        

            $builder->where('entregador.cd_entregador', $cd_entregador);
            $builder->delete();

        }

        return $query->getResult();

    }

    public function insertAddressDeliveryman($dados)
    {

        //table entregador
        
        $builder = $this->db->table('entregador');           
            
        $builder->insert($dados['entregador']);

        $query = $this->db->insertID();

        //table endereco

        $builder = $this->db->table('endereco');

        $dados['endereco']['cd_entregador'] = $query;
        $builder->insert($dados['endereco']);

        $query = $builder;

        $query = $this->db->insertID();

        return $query;
    }

    public function editAddressDeliveryman($data, $cd_entregador = null, $cd_endereco = null)
    {
        
        //table entregador
        $builder = $this->db->table('entregador');   
        $builder->update($data['entregador'], ['cd_entregador' => $data['entregador']['cd_entregador']]);
            
        //table endereco
        $builder = $this->db->table('endereco');   
        $builder->update($data['endereco'], ['cd_entregador' => $data['entregador']['cd_entregador']]);

        $query = $builder;
        

        return $query;
    }
};