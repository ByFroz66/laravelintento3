<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Estudiante1;

class PagesController extends Controller
{
    public function fnIndex () {
        return view('welcome');
    }

    public function fnEstDetalle ($id) {
        $xDetAlumnos = Estudiante1::findOrFail($id);
        return view('Estudiante.pagDetalle', compact('xDetAlumnos'));
    }

    public function fnLista (){
        $xAlumnos = Estudiante1::all();
        return view('pagLista', compact('xAlumnos'));
    }

    public function fnGaleria ($numero=0) {
        //return "Fotos de codigo numero: ".$numero;
        //return view('pagGaleria',['valor'=>$numero, 'otro'=>25]);
        $valor = $numero;
        $otro = 25;
        return view('pagGaleria', compact('valor','otro'));
    }

    public function fnRegistrar (Request $request) {
        $request -> validate([
            'codEst'=>'required',
            'nomEst'=>'required',
            'apeEst'=>'required',
            'fnaEst'=>'required',
            'turEst'=>'required',
            'semEst'=>'required',
            'estEst'=>'required'
        ]);

        $nuevoEstudiante = new Estudiante1;

        $nuevoEstudiante->codEst = $request->codEst;
        $nuevoEstudiante->nomEst = $request->nomEst;
        $nuevoEstudiante->apeEst = $request->apeEst;
        $nuevoEstudiante->fnaEst = $request->fnaEst;
        $nuevoEstudiante->turEst = $request->turEst;
        $nuevoEstudiante->semEst = $request->semEst;
        $nuevoEstudiante->estEst = $request->estEst;

        $nuevoEstudiante->save();

        return back()->with('msj', 'Se registro con éxito...');

    }

    public function fnActualizar($id){
        $xActAlumnos = Estudiante1::findOrFail($id);
        return view('Estudiante.pagActualizar', compact('xActAlumnos'));
    }

    public function fnUpdate(Request $request, $id){

        $xUpdateAlumnos = Estudiante1::findOrFail($id);

        $xUpdateAlumnos -> codEst = $request -> codEst;
        $xUpdateAlumnos -> nomEst = $request -> nomEst;
        $xUpdateAlumnos -> apeEst = $request -> apeEst;
        $xUpdateAlumnos -> fnaEst = $request -> fnaEst;
        $xUpdateAlumnos -> turEst = $request -> turEst;
        $xUpdateAlumnos -> semEst = $request -> semEst;
        $xUpdateAlumnos -> estEst = $request -> estEst;

        $xUpdateAlumnos -> save();

        return back()->with('msj','Se actualizo con éxito...');
    }

    public function fnEliminar($id){
        $deleteAlumno = Estudiante1::findOrFail($id);
        $deleteAlumno->delete();
        return back()->with('msj','Se elimino con éxito...');
    }
}
