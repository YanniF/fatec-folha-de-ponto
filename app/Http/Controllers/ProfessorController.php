<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professor;

class ProfessorController extends Controller
{
  private function validar(Request $req) {
    $req->validate([
      'nome' => 'required',
      'categoria' => 'required',
      'projeto' => 'required',
      'funcao' => 'required',
      'curso' => 'required',
      'carga' => 'required',
      'dia' => 'required',
      'entrada' => 'required',
      'saida' => 'required',
    ]);
  }

  public function index()
  {
    $profs = Professor::all();
    return view('prof.index')->with('profs', $profs);
  }

  public function cadastrar(Request $req)
  {
    $this->validar($req);
    $params = $req->all();
    
    $params['dia'] = implode(";", $params['dia']);
    $params['entrada'] = implode(";", $params['entrada']);
    $params['saida'] = implode(";", $params['saida']);

    $profs = new Professor($params);
    $profs->save();

    return redirect()->action('ProfessorController@index')->withInput();
  }

  public function exibir($id)
  {
    $prof = Professor::find($id);
    $profs = Professor::all();

    $prof['dia'] = explode(";", $prof['dia']);
    $prof['entrada'] = explode(";", $prof['entrada']);
    $prof['saida'] = explode(";", $prof['saida']);

    return view('prof.index')->with(array('prof' => $prof, 'profs' => $profs));
  }

  public function editar(Request $req, $id)
  {
    $this->validar($req);

    $prof = Professor::findOrFail($id);
    $params = $req->all();

    $params['dia'] = implode(";", $params['dia']);
    $params['entrada'] = implode(";", $params['entrada']);
    $params['saida'] = implode(";", $params['saida']);
    
    $prof->fill($params)->save();

    return redirect()->action('ProfessorController@index')->withInput();
  }

  public function excluir($id)
  {
    $profs = new Professor();
    $profs = Professor::destroy($id);
    return redirect()->action('ProfessorController@index')->withInput();
  }

  public function print() {
    $profs = Professor::all();
    return view('prof.impressao')->with('profs', $profs);
  }
}
