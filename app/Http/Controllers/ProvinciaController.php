<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\Provincia;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProvinciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $provincias = Provincia::all();  //traigo todos los registros de la BD
        //$provincias = Provincia::select('nombre')-> get(); //traigo solo los nombres de las provincias
        return response() ->json($provincias); //puedo ponerlo asi, o de la siguiente manera
        /**
        *return response() ->json([
        *    'mensaje'=>'Listado de Provincias',
        *  'data'=> $provincias
        ]);
        */

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
        $provincia = Provincia::create([    //Crea una provincia c/el atributo nombre con ese valor que tiene nombre
            'nombre' => $request['nombre'], //el nombre de la derecha es el mismo campo que la BD
            'indec_id' => $request['indec']
        ]);

        return response([
            'mensaje' => 'La provincia se agregó correctamente',
            'data'=> $provincia
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function show(Provincia $provincia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function edit(Provincia $provincia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provincia $provincia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provincia $provincia)
    {
        //
    }
    public function getProvinciaSinParametro()
    {
        $client = new Client();
        $res = $client->request('GET', 'https://apis.datos.gob.ar/georef/api/municipios?provincia=20&campos=id,nombre&max=100');

        $provincias = json_decode($res->getBody(), true);

        return response($provincias['municipios']);
    }

    public function getProvinciaConParametro(int $id)
    {
        $client = new Client();
        $res = $client->request('GET', "https://apis.datos.gob.ar/georef/api/municipios?provincia={$id}&campos=id,nombre&max=100");

        $provincias = json_decode($res->getBody(), true);

        return response()->json($provincias['municipios']);
    }

    public function getProvinciaAlternativa(int $id)
    {
        $client = new Client();
        $res = $client->request('GET', "https://apis.datos.gob.ar/georef/api/municipios?provincia={$id}&campos=id,nombre&max=100");

        $provincias = json_decode($res->getBody(), true);

        return response()->json($provincias['municipios']);
    }
}
