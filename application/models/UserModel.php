<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class UserModel extends CI_Model 
{     
    private $table = 'spareparts'; 

    public $id;     
    public $name;     
    public $merk;
    public $amount;
    public $create_at;
    
    public $rule = [  
        [             
            'field' => 'name',             
            'label' => 'name',             
            'rules' => 'required'         
        ],     
    ];     
    
    public function Rules() { return $this->rule; }     

    public function getAll() { return          
        $this->db->get('data_mahasiswa')->result();     
    }
    
    public function store($request) {          
        $this->id = $request->id; 
        $this->name = $request->name;          
        $this->merk = $request->merk;
        $this->amount = $request->amount;
        $this->create_at = $request->create_at
        ;
    }     
 
    public function update($request,$id) {          
        $updateData = ['merk' => $request->merk, 'name' =>$request->name];        
        if($this->db->where('id',$id)->update($this->table, $updateData)){             
            return ['msg'=>'Berhasil','error'=>false];         
        }        
        return ['msg'=>'Gagal','error'=>true];     
    }

    public function destroy($id){         
        if (empty($this->db->select('*')->where(array('id' => $id))->get($this->table)->row())) 
            return ['msg'=>'Id tidak ditemukan','error'=>true];                  
        if($this->db->delete($this->table, array('id' => $id))){             
            return ['msg'=>'Berhasil','error'=>false];         
        }         
    return ['msg'=>'Gagal','error'=>true];     
    } 
} 
?> 