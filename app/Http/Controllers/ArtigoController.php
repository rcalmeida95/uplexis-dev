<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artigo;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class ArtigoController extends Controller
{

    protected $request;
    private $repository;
    public function __construct(Request $request, Artigo $artigo)
    {
        $this->repository = $artigo;
        $this->request = $request;
       
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artigos = Artigo::paginate(20);
        return view('artigos.artigo',[
            'artigos' => $artigos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $artigo =  $this->repository->find($id);

        if(!$artigo)
            return redirect()->back();

        
        return view('artigos.details',[
            'artigo' => $artigo
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $artigo = $this->repository->find($id);

        if(!$artigo)
            return redirect()->back();

        // if($artigo->link && Storage::exists($artigo->link)){
        //     Storage::delete($artigo->link);
        // }
        $artigo->delete();

        return redirect()->route('artigos.index')->with('info', 'veículo excluído com sucesso!');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $artigos = $this->repository->search($request->filter);
        return view('artigos.artigo',[
            'artigos' => $artigos,
            'filters' =>$filters
        ]);

    }
}
