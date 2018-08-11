<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrativo;

class AdministrativoController extends Controller
{
  private function validar(Request $req) {
    $req->validate([
      'nome' => 'required',
      'rg' => 'required',
      'cargo' => 'required',
      'jornada' => 'required',
      'horario' => 'required',
      'intervalo' => 'required'
    ]);
  }

  public function index()
  {
    $adms = Administrativo::all();
    return view('adm.index')->with('adms', $adms);
  }

  public function cadastrar(Request $req)
  {
    $this->validar($req);
    $params = $req->all();
    
    $req->has('plantao') ? $params['plantao'] = true : $params['plantao'] = false;
    $req->has('estudante') ? $params['estudante'] = true : $params['estudante'] = false;

    $adms = new Administrativo($params);
    $adms->save();

    return redirect()->action('AdministrativoController@index')->withInput();
  }

  public function exibir($id)
  {
    $adm = Administrativo::find($id);
    $adms = Administrativo::all();

    return view('adm.index')->with(array('adm' => $adm, 'adms' => $adms));
  }

  public function editar($id, Request $req)
  {
    $this->validar($req);
    $adm = Administrativo::findOrFail($id);
    $params = $req->all();

    $req->has('plantao') ? $params['plantao'] = true : $params['plantao'] = false;
    $req->has('estudante') ? $params['estudante'] = true : $params['estudante'] = false;

    $adm->fill($params)->save();

    return redirect()->action('AdministrativoController@index')->withInput();
  }
  
  public function excluir($id)
  {
    $feriados = new Administrativo();
    $feriados = Administrativo::destroy($id);
    return redirect()->action('AdministrativoController@index')->withInput();
  }

  public function print() {
    $adms = Administrativo::all();
    return view('adm.impressao')->with('adms', $adms);
  }
}
