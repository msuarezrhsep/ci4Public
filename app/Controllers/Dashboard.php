<?php

namespace App\Controllers;
use App\Models\Usuarios;

class Dashboard extends BaseController
{
    public function index(): string
    {
        session();
        return view('dashboard/index');
    }
    public function login()
    {
        $usuario = $this->request->getPost('usuario');
        $pass = $this->request->getPost('pass');

        $Usuarios = new Usuarios();

        $datosUsuario = $Usuarios->getUsuario(['usuario' => $usuario]);
        
        if(count($datosUsuario) > 0 && $pass == $datosUsuario[0]['pass']){

            $data = [
                "nombre_usuario" => $datosUsuario[0]['nombre_usuario'],
                "usuario" => $datosUsuario[0]['usuario'],
                "type" => $datosUsuario[0]['type']
            ];
            $session = session();
            $session->set($data);
            return redirect()->to(base_url('/dashboard'));

        } else {
            return redirect()->to(base_url('/'));
        }
    }
     public function salir()
     {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));
     }
}
