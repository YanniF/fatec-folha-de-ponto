<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrativo;
use App\Models\Feriado;
use Carbon\Carbon;

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
    $adms = Administrativo::all()->sortBy("nome");
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
    $adms = Administrativo::all()->sortBy("nome");

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
    $feriados = Administrativo::destroy($id);
    return redirect()->action('AdministrativoController@index')->withInput();
  }

  public function impressao() {
    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

    $adms = Administrativo::all()->sortBy("nome");
    return view('adm.impressao')->with('adms', $adms);
  }

  public function imprimir($mes, $ano, $id) {

    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    // $data = strftime('%A, %d de %B de %Y', strtotime('today'));
    // return view('adm.impressao')->with('adms', $adms);
  
    $adm = Administrativo::find($id);
    $feriados = Feriado::select('data', 'informacao')->where('data', 'like', '%-' . $mes . '-%')->get(); // selecionando todos os feriados daquele mês
    
    return view('adm.imprimir')->with(array('adm' => $adm, 'feriados' => $feriados, 'mes' => $mes, 'ano' => $ano));
  }

  public function imprimirTudo($mes, $ano) {

    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
  
    $adms = Administrativo::all()->sortBy("nome");
    $feriados = Feriado::select('data', 'informacao')->where('data', 'like', '%-' . $mes . '-%')->get(); // selecionando todos os feriados daquele mês
        
    return view('adm.imprimirtudo')->with(array('adms' => $adms, 'feriados' => $feriados, 'mes' => $mes, 'ano' => $ano));
  }
}
