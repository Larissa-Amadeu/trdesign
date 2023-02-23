<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cadastro;
use Hash;
use Session;

class Controlador extends Controller
{
    public function inicio ()
    {
        return view('inicio');
    }

    public function cadastro ()
    {
      
        return view('cadastro');
    }
    
    public function login ()
    {
        return view('login');
    }
    
    public function formulario ()
    {
        return view('formulario');
    }

    public function cadastroUsuario (Request $request){
         $request->validate([
            'name'=> 'required',
            'email'=>'required|email',
            'password'=>'required|min:6|max:12',
            'empresa'=>'required'
         ]);

         $cadastro = new Cadastro();
         $cadastro->name=$request->name;
         $cadastro->email=$request->email;
         $cadastro->password=Hash::make($request->password);
         $cadastro->empresa=$request->empresa;
         $res= $cadastro->save();
         if($res){
                return back()->with('succes', 'Usuário registrado com sucesso' );
         }else{
                return back()->with('fail','algo deu errado');
         }
        }

        
         public function loginUsuario(Request $request){
            $request->validate([
                'email'=>'required|email',
                'password'=>'required|min:6|max:12',
             ]);


             $cadastro = Cadastro::where('email', '=', $request->email)->first();
             if($cadastro){
                if(Hash::ckeck($request->password, $cadastro->password)){
                    $request->session()->put('loginId', $cadastro->id);
                    return redirect('dashboard');
                }else{
                    return back()->with('fail', 'Senha Incorreta');
                }
             }else{
                return back()->with('fail', 'Email não registrado');
             }
         }
      public function dashboard()
      {
        return "Welcome";
      }
}
