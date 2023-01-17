<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autores;
//2use Illuminate\Support\Facades\DB;

class AutoresController extends Controller
{
    public function registrarForm(Request $request){
        return view('registrarForm');
    }

    public function registrar(Request $request){
        if(isset($request->nombre) && isset($request->apellidos)){
          $single=new Autores();
          $single->nombre=$request->nombre;
          $single->apellidos=$request->apellidos;
          $single->save();
          //DB::Table('autores')->insert(['nombre'=> $nombre, 'apellidos'=>$apellidos]);
          return redirect('/autor/listar');
        }
        return redirect('/autor/registrar');
    }


    public function listar(Request $request){

        $todosAutores=Autores::All();
        return view('listar')->with('todosAutores',$todosAutores);
    }

    public function modificarForm(Request $request){
        $id=$request->id;
        $autor=Autores::findOrFail($id);
        return view('modificarForm')->with('autor',$autor);
    }

    public function modificar(Request $request){
        if(isset($request->id) && isset($request->nombre) && isset($request->apellidos)){
          $id=$request->id;
          $autor=Autores::findOrFail($id);
          $autor->nombre=$request->nombre;
          $autor->apellidos=$request->apellidos;
          $autor->save();
          return redirect('/autor/listar');
        }
        return redirect('/autor/registrar');
    }


    public function borrar($id,Request $request){

        $id2=intval($id);
        $autor=Autores::findOrFail($id2);
        $autor->delete();
        return redirect('/autor/listar');
    }
}
