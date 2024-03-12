<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacionFlete;
use App\Models\Gondola;
use App\Models\Flete;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request;

class FleteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fletes = Flete::with('usuario:id,nombre', 'gondola')->orderBy('fecha_salida')->get();
        return view('flete.index', compact('fletes'));
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        //
       // $gondolas = Gondola::whereNotNull('status')->pluck('placas_truck', 'id');
        $gondolas = Gondola::where('status','Disponible')->pluck('placas_truck','id');
        return view('flete.crear', compact('gondolas')  );
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionFlete $request)
    {
      
        $gondola = Gondola::findOrFail($request->gondola_id);
        Gondola::where('id',$request->gondola_id)
            ->update(['status'=> 'En Ruta']);
        $gondola->creado()->create([
             'origen' => $request->origen,
             'destino' => $request->destino,
             'mina' => $request->mina,
             'km' => $request->km,
             'fecha_salida' => $request->fecha_salida,
             'hora_salida' => $request->hora_salida,
             'fecha_pago' => $request->fecha_pago,
             'creado_por' => $request->creado_por,
             'usuario_id' => auth()->user()->id,
             'cliente' => $request->cliente,
             'material' => $request->material,
             'notas' => $request->notas
         ]);
        return redirect()->route('flete')->with('mensaje', 'El flete se registró correctamente');
    }

    public function datos_gondola($placas_truck)
    {
        //
        $gondola = Gondola::where('status','Disponible')->findOrFail($request->gondola_id);
        $gondola->creado()->create([
            'creado_por' => $request->creado_por,
            'fecha_salida' => $request->fecha_salida,
            'usuario_id' => auth()->user()->id
        ]);
        return redirect()->route('flete')->with('mensaje', 'El flete se registró correctamente');
    }


    public function finalizar(Request $request, $gondola_id)
    {
        if ($request->ajax()) {
            Flete::where('gondola_id', $gondola_id)
            ->whereNull('fecha_llegada')
            ->update(['fecha_llegada' => date('Y-m-d'),'status'=>'Finalizado','hora_llegada'=>date('H:i:s')]);
            Gondola::where('id',$gondola_id)
            ->update(['status'=> 'Disponible']);
            return response()->json(['fecha_llegada' => date('Y-m-d')]);
        } else {
            abort(404);
        }

    }

    public function mostrar($id,$gondola_id)
    {
        //
        $flete = Flete::findOrFail($id);
        $gondola = Gondola::find($gondola_id);
       // dd($flete,$gondola);
        return view('flete.mostrar', compact('flete','gondola'));
    }


    public function ver(Request $request, Gondola $gondola)
    {
        //
        if ($request->ajax()) {
            return view('gondola.ver', compact('gondola'));
        } else {
            abort(404);
        }
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
    }
}
