<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Feriado;

class FeriadoController extends Controller
{
  private function validar(Request $req) {
    $req->validate([
      'nome' => 'required|max:150',
      'data' => 'required',
      'informacao' => 'required|max:50'
    ]);
  }
  
  public function index()
  {
    $feriados = Feriado::all();
    return view('feriado.index')->with('feriados', $feriados);
  }

  public function cadastrar(Request $req)
  {
    $this->validar($req);
    $params = $req->all();
    $feriados = new Feriado($params);
    $feriados->save();

    return redirect()->action('FeriadoController@index')->withInput();
  }

  public function exibir($id)
  {
    $f = Feriado::find($id);
    $feriados = Feriado::all();

    return view('feriado.index')->with(array('f' => $f, 'feriados' => $feriados));
  }

  public function editar($id, Request $req)
  {
    $this->validar($req);
    $feriado = Feriado::findOrFail($id);
    $params = $req->all();
    $feriado->fill($params)->save();

    return redirect()->action('FeriadoController@index')->withInput();
  }

  public function excluir($id)
  {
    $feriados = new Feriado();
    $feriados = Feriado::destroy($id);
    return redirect()->action('FeriadoController@index')->withInput();
  }
}
