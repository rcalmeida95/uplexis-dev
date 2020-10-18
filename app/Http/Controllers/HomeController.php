<?php

namespace App\Http\Controllers;

use App\Models\Artigo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $repository;
    protected $request;

    public function __construct(Request $request, Artigo $artigo)
    {
        $this->repository = $artigo;
        $this->request = $request;
       
    }
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function capturar(Request $request)
    {
        if(!isset($request->termo) || $request->termo == '')
        {
            return redirect('/home')->with('info','Insira um termo!');
        }
        else
        {
            $stringConsulta =$this->repository->carregarUrl($request->termo);
            $artigos = $this->repository->aplicarRegexDevolveArtigos($stringConsulta);
            if(count($artigos) >= 1 ){
                foreach($artigos as $artigo){
                    $id = Artigo::create([
                        'id_usuario' => $artigo->id_usuario,
                        'nome_veiculo' => $artigo->nome_veiculo,
                        'link' => $artigo->link,
                        'img_url' => $artigo->img_url,
                        'ano' => $artigo->ano,
                        'combustivel' => $artigo->combustivel,
                        'quilometragem' => $artigo->quilometragem,
                        'portas' => $artigo->portas,
                        'cambio' => $artigo->cambio,
                        'cor' => $artigo->cor,
                        
                    ]);
                   
                }
                $msg = 'Itens inseridos';
                return redirect('/home')->with('info',$msg);
            }
            else
            {
                $msg = 'Não foi possivel recuperar artigos, talvez não exista nenhum na página.';
                return redirect('/home')->with('info',$msg);
            }
                
        }
    }
}
