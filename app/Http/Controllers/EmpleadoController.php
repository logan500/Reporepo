<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EmpleadoCreateRequest;
use App\Http\Requests\EmpleadoUpdateRequest;

use App\Turno;
use App\Departamento;
use App\Empleado;
use Redirect;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __constuct()
    // {
    //     $this->middlawere('auth');
    // }
    //

    public function index()
    {

        $empleados = DB::table('empleados as a')
        ->join('cat_turnos as b', 'a.id_turno', '=', 'b.id')
        ->join('cat_departamentos as c', 'a.id_departamento', '=', 'c.id')   
        ->select('a.*','b.*','c.*') 
        ->get();

        return view('empleado.index',compact('empleados'));
        //return $empleados;
        // $users = DB::table('users')
        //     ->join('contacts', 'users.id', '=', 'contacts.user_id')
        //     ->join('orders', 'users.id', '=', 'orders.user_id')
        //     ->select('users.*', 'contacts.phone', 'orders.price')
        //     ->get();
        //$empleados = Empleado::all();
        //directo a vista;
        //@foreach ($empleado as $empleados)
        //{!! $empleado->id!!}
        //{!! $empleado->paterno!!}
        //@endeach
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleado = new Empleado;
        // $sexos = array( 'HOMBRE'=>'HOMBRE',
        //                 'MUJER' => 'MUJER'
        //                 );
        // $departamento= Departamento::all()->pluck('id','descripcion');
        // $turnos = Turno::all()->pluck('nombre','id');
        // return view('empleado.create',[ 'empleado'=>'$empleado',
        //                                 'sexos'=>'$sexos',
        //                                 'turnos'=>'$turnos',
        //                                 'departamento'=>'$departamento'
        //                                 ]);
        //Form::select('sexo','$sexos','',['class'=>'form-control'])
         return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpleadoCreateRequest $request)
    {
        $turno = new Turno;
        $turno->nombreTurno = $request->turno;
        $turno->save();
        $turnoId = $turno->id;

        $departamento = new Departamento;
        $departamento->codigo = $request->codigo;
        $departamento->descripcion = $request->descripcion;
        $departamento->save();
        $departamentoId = $departamento->id;

        $empleado = new Empleado;
        $empleado->matricula = $request->matricula;
        $empleado->paterno = $request->paterno;
        $empleado->materno = $request->materno;
        $empleado->nombre = $request->nombre;
        $empleado->fecha_nacimiento = $request->fecha_nacimiento;
        $empleado->sexo = $request->sexo;
        $empleado->id_departamento = $departamentoId;
        $empleado->id_turno = $turnoId;
        $empleado->save();  
        
        // $empleado = new Empleado($->all());
        // $empleado->save();
        // si se usa un form select jala automaticamente los demas modelos
        return Redirect::to('empleado');
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
        $empleado = Empleado::find($id);
        $turno = Turno::find($empleado->id_turno);
        $departamento = Departamento::find($empleado->id_departamento);
        //$categories = category::all()->lists('name');
        // $empleados = DB::table('empleados as a')
        // ->join('cat_turnos as b', 'a.id_turno', '=', 'b.id')
        // ->join('cat_departamentos as c', 'a.id_departamento', '=', 'c.id')  
        // ->where('a.id','=',$id) 
        // ->select('a.*','b.*','c.*') 
        // ->get();
        //  return view('empleado.edit',['empleados'=>$empleados]);
        //return view ('empleado.edit',compact('empleados','turno','departamento') );
        return view('empleado.edit')->with('empleado', $empleado)->with('turno', $turno)->with('departamento', $departamento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpleadoUpdateRequest $request, $id)
    {
        $empleado = Empleado::find($id);
        $departamento = Departamento::find($empleado->id_departamento);
        $turno = Turno::find($empleado->id_turno);

        $empleado->matricula = $request->matricula;
        $empleado->paterno = $request->paterno;
        $empleado->materno = $request->materno;
        $empleado->nombre = $request->nombre;
        $empleado->fecha_nacimiento = $request->fecha_nacimiento;
        $empleado->sexo = $request->sexo;

        $departamento->codigo = $request->codigo;
        $departamento->descripcion = $request->descripcion;

        $turno->nombreTurno = $request->turno;

        // $empleado->id_tuno =$request->input(id_turno);
        // $empleado->id_departamento =$request->input(id_departamento);

        $empleado->save();
        $departamento->save();
        $turno->save();
        return Redirect::to('empleado');
        //return $empleado->id_departamento;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Empleado::destroy($id);
        return Redirect::to('empleado');
    }
}
