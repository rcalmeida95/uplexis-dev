<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class Artigo extends Model
{
    use HasFactory;
    public $timestamps = false;
    

    protected $fillable = ['id_usuario','nome_veiculo', 'link','img_url','ano', 'combustivel', 'quilometragem', 'portas', 'cambio', 'cor'];


    public function search($filter = null )
    {
        $results = $this->where(function($query) use($filter){
            if($filter){
                $query->where('nome_veiculo', 'LIKE', "%{$filter}%");
            }
        })
        ->paginate(5);
        
        return $results;
    }

    public function carregarUrl($termo){
        $msg = '';
        $url = "https://www.questmultimarcas.com.br/estoque";
        // URL para onde será enviada a requisição GET
       
        $dataArray = array("termo"=>$termo);
                $ch = curl_init();
        $data = http_build_query($dataArray);
        $getUrl = $url."?".$data;
        
        
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        //curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: text/xml"]); 
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_URL, $getUrl);
        curl_setopt($ch, CURLOPT_TIMEOUT, 80);
        $response = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
        $response = curl_exec($ch);
        $erro = curl_error($ch);
        curl_close($ch);
        if($erro){
            $msg .=  "Request Error:" . $erro;
            return $erro;
        }
        else
        {
            return $response;
        }
    }

    public function aplicarRegexDevolveArtigos($stringConsulta){
        $pattern1 = '/<div id="pixad-listing" class="list">(.*) <ul class="pagination">/s';
        preg_match_all($pattern1,$stringConsulta,$resultado);
        $artigos = array();

        foreach($resultado[1] as $divArticle){
            $pattern = '/<article class="card clearfix" id="(.*?)">.*?<\/article>/s';
            preg_match_all($pattern,$divArticle,$articles);
           
            for ($i=0; $i <count($articles[0]) ; $i++) { 
                $artigo = new \stdClass; 
                $artigo->id_usuario = Auth::user()->id;
                $patternLink = '/<a.*href="(.*)"/i';
                preg_match($patternLink,$articles[0][$i],$link);
                $artigo->link = $link[1];
                $patternImg = '/<img.*src="(.*?)"/i';
                preg_match($patternImg,$articles[0][$i],$img);
                $artigo->img_url = $img[1];
                preg_match('/<a href="(.*)">(.*?)<\/a>/',$articles[0][$i],$nome_veiculo);
                
                $removerTags =  preg_replace('/<.*?>/s', '', $articles[0][$i]);
                $palavras_serem_removidas = array(
                            'Ano:',
                            'Quilometragem:', 
                            'Combustível:',
                            'Câmbio:', 
                            'Portas:', 
                            'Cor:'
                    );
                $removerTags =  preg_replace('/\s+/', ' ', $removerTags);
                $title = str_ireplace($palavras_serem_removidas, 'SEP', $removerTags);
                $artigoTexto = explode("SEP",$title);
                $artigo->nome_veiculo = $artigoTexto[0];
                $artigo->ano = $artigoTexto[1];
                $artigo->quilometragem = $artigoTexto[2];
                $artigo->combustivel = $artigoTexto[3];
                $artigo->cambio = $artigoTexto[4];
                $artigo->portas = $artigoTexto[5];
                $artigo->cor = explode("PREÇO",$artigoTexto[6])[0];
                
                array_push($artigos, $artigo);
            }
        }
        return $artigos;
    }
}
