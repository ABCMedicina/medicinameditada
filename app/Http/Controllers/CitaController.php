<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Agenda;
use App\Models\Procedimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnvioMail;
use App\Mail\CancelarMail;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $procedimientos = Procedimiento::where('activo', 1)->get();
        if($request->fecha || $request->procedimiento || $request->tipo)
        {
            //Filtrar por fecha
            if($request->fecha)
            {
                 $citas=Cita::where('paciente_id', Auth()->user()->id)
                            ->whereHas('agenda', function($query) use ($request){
                                $query->where('fecha', $request->fecha);
                            })->paginate(10)->withQueryString();
                return view('citas.index', compact('citas','procedimientos'));
            }
            //Filtrar por procedimiento
            if($request->procedimiento)
            {

                $citas=Cita::where('paciente_id', Auth()->user()->id)
                            ->whereHas('agenda', function($query) use ($request){
                                $query->where('procedimiento_id', $request->procedimiento);
                            })->paginate(10)->withQueryString();
                return view('citas.index', compact('citas','procedimientos'));
            }
            //Filtrar por tipo
            if($request->tipo)
            {

                $citas=Cita::where('paciente_id', Auth()->user()->id)
                            ->whereHas('agenda', function($query) use ($request){
                                $query->where('tipo', $request->tipo);
                            })->paginate(10)->withQueryString();
                return view('citas.index', compact('citas','procedimientos'));
            }
        }
        else{
            //Mostrar todas las citas del paciente
            $citas = Cita::where('paciente_id', Auth()->user()->id)->paginate(10);
            return view('citas.index', compact('citas','procedimientos'));
        }
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
        $paciente_id= Auth()->user()->id;
        Cita::create([
            'paciente_id' => $paciente_id,
            'agenda_id' => $request->agenda_id,
            'estado' => 1,
        ]);
        //Actualizamos el estado de la agenda
        $agenda = Agenda::find($request->agenda_id);
        $agenda->estado = 2;
        $agenda->save();

        //Se envía el email de confirmación al paciente
        $mailData=[
            "nombre"=>Auth()->user()->name,
            "fecha"=>$agenda->fecha,
            "hora"=>$agenda->hora,
            "procedimiento"=>$agenda->procedimiento->nombre,
            "medico"=>$agenda->medico->name
        ];
        Mail::to(Auth()->user()->email)->send(new EnvioMail($mailData));

        return redirect()->route('citas.index')->with('info', 'La cita se creó con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function show(Cita $cita)
    {
        return view('citas.show',compact ('cita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function edit(Cita $cita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cita $cita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cita $cita)
    {
        //
    }

  
    //Mostrar formulario para buscar citas
    public function buscar()
    {
        $procedimientos = Procedimiento::all();
        $procedimientos= Procedimiento::where('activo', 1)->get();
        $fecha_min=\Carbon\Carbon::tomorrow()->format('Y-m-d');
        return view('citas.buscar', compact('procedimientos','fecha_min'));
       
    }

   
    //Ver las citas disponibles
    public function disponibles(Request $request)
    {
        //validar datos
        $request->validate([
            'fecha' => 'required|date|after:today',
            'procedimiento' => 'required',
        ]);
        
        //buscar citas disponibles por fecha y procedimiento
        $citas = Agenda::where('fecha', $request->fecha)
            ->where('procedimiento_id', $request->procedimiento)
            ->where('estado', 1)
            ->where('tipo', 1)
            ->get();

        return view('citas.disponibles', compact('citas'));
    }


    public function cancelar(Cita $cita)
    {
        $cita->estado = 3;
        //Actualizamos la fecha update_at a la fecha actual
        $cita->touch();
        $cita->save();
        $agenda = Agenda::find($cita->agenda_id);
        $agenda->estado = 1;
        $agenda->save();

         //Se envía el email para cancelar la cita
         $cancelarData=[
            "nombre"=>Auth()->user()->name,
            "fecha"=>$agenda->fecha,
            "hora"=>$agenda->hora,
            "procedimiento"=>$agenda->procedimiento->nombre,
            "medico"=>$agenda->medico->name
        ];
        Mail::to(Auth()->user()->email)->send(new CancelarMail($cancelarData));
        return redirect()->route('citas.index')->with('info', 'La cita se canceló con éxito');
    }

    //función para ver las citas del día del médico autenticado
    public function agenda()
    {
        $hoy=\Carbon\Carbon::today();
        //mostrar todas las citas de la agenda del dia del medico autenticado
        $citas=Cita::where('estado', '!=', 3)
            ->whereHas('agenda',function($query) use ($hoy){
            $query->where('medico_id',Auth()->user()->id)
            ->where('fecha',$hoy);
        })->get();
        //dd($citas);
        return view('citas.agenda', compact ('citas'));
    }

    public function atender(Cita $cita)
    {
        return view('citas.atender', compact('cita'));
    }

    public function historial(Request $request)
    {
        if($request->nombre || $request->tipo)
        {
            if($request->nombre)
            {
                //mostrar las citas al escribir el nombre del paciente con el medico autenticado
                //$citas=Cita::whereRaw('LOWER(name) like ?', '%'.strtolower($request->nombre).'%')->where('id', '!=', 1)->paginate(10)->withQueryString();

                $citas=Cita::where('estado','!=',1)
                ->whereHas('agenda',function($query){
                  $query->where('medico_id',Auth()->user()->id);
                })
                ->whereHas('paciente',function($query) use ($request){
                    $query->where('name','like','%'.$request->nombre.'%');
                })->get();
                return view('citas.historial', compact('citas'));
            }
            if($request->tipo)
            {
                //mostrar las citas de acuerdo al tipo de agenda (1=consulta o 2=procedimiento) con el medico autenticado
                $citas=Cita::where('estado','!=',1)
                ->whereHas('agenda',function($query) use ($request){
                    $query->where('medico_id',Auth()->user()->id)
                    ->where('tipo',$request->tipo);
                })->get();
                return view('citas.historial', compact('citas'));
            }
        }
        else{
            $citas=Cita::where('estado','!=',1)
            ->whereHas('agenda',function($query){
              $query->where('medico_id',Auth()->user()->id);
            })->get();
            return view('citas.historial', compact('citas'));
       }
    }

    //Funcion cuando el medico atiende la consulta o procedimiento
    public function registra(Request $request, Cita $cita)
    {
        $request->validate([
            'diagnostico'=>'required',
            'medicamento'=>'required',
        ]);

        $cita->update([
            'observacion'=>$request->observacion, 
            'diagnostico'=>$request->diagnostico,
            'medicamento'=>$request->medicamento,
            'estado'=>2
        ]);

         //Actualizamos el estado de la agenda
         $agenda = Agenda::find($cita->agenda_id);
         $agenda->estado = 4; //estado agenda atendida
         $agenda->save();


        return redirect()->route('citas.agenda_dia');
    }

    public function detalle(Cita $cita)
    {
        return view('citas.detalle', compact('cita'));

    }


    public function cita_procedimiento_crear()
    {
        $procedimientos=Procedimiento::all();
        return view('citas.medico.create', compact('procedimientos'));
    }

    public function cita_procedimiento_guardar(Request $request)
    {
       // Mostrar en pantalla las variables enviadas antes de la ejecución
       // dd($request->paciente_id);

        Cita::create([
            'paciente_id'=> $request->paciente_id,
            'agenda_id'  => $request->fecha,
            'estado' => 1,
        ]);
        //Actualizar el estado de la agenda del procedimiento a 2 (ocupada)
        $agenda=Agenda::find($request->fecha);
        $agenda->estado=2;
        $agenda->save();

         //Se envía el email de confirmación al paciente
         $mailData=[
            "nombre"=>$agenda->cita->paciente->name,
            "fecha"=>$agenda->fecha,
            "hora"=>$agenda->hora,
            "procedimiento"=>$agenda->procedimiento->nombre,
            "medico"=>$agenda->medico->name
        ];
        Mail::to(Auth()->user()->email)->send(new EnvioMail($mailData));


        return redirect()->route('procedimientos.programados')->with('info', 'La cirugía se programó con éxito');   
     }

     public function procedimientos_programados()
     {
        $citas=Cita::whereHas('agenda', function($query){
            $query->where('medico_id', Auth()->user()->id)
                ->where('tipo', 2);
               // ->where('estado',2);
        })->get();
        //dd($citas);
        return view('citas.medico.index', compact('citas'));
     }

     public function cita_procedimiento_editar(Cita $cita)
     {
        $procedimientos=Procedimiento::all();
        return view('citas.medico.edit', compact('cita','procedimientos'));

     }

     public function cita_procedimiento_actualizar(Request $request, Cita $cita)
     {
        //dd(request()->all(),$cita);
        //Liberar la agenda de la cita editada
        $agenda=Agenda::find($cita->id);
        $agenda->estado=1;

      
        $agenda->save();
        //Se cambia el estado de la cita a 3(cancelada)
        $cita->estado=3;
        //Se crea la nueva cita 
        Cita::create([
            'paciente_id'=> $request->paciente_id,
            'agenda_id'  => $request->fecha,
            'estado' => 1,
        ]);
        //Actualizar el estado de la agenda del procedimiento a 2 (ocupada)
        $agenda=Agenda::find($request->fecha);
        $agenda->estado=2;
        $agenda->save();

         //Se envía el email de confirmación al paciente
         $mailData=[
            "nombre"=>$agenda->cita->paciente->name,
            "fecha"=>$agenda->fecha,
            "hora"=>$agenda->hora,
            "procedimiento"=>$agenda->procedimiento->nombre,
            "medico"=>$agenda->medico->name
        ];
        Mail::to(Auth()->user()->email)->send(new EnvioMail($mailData));

        return redirect()->route('procedimientos.programados')->with('info', 'La cita se actualizó con éxito');   
 
     }

     public function cancelar_procedimiento_medico(Cita $cita)
    {
        $cita->estado = 3;
        //Actualizamos la fecha update_at a la fecha actual
        $cita->touch();
        $cita->save();
        $agenda = Agenda::find($cita->agenda_id);
        $agenda->estado = 1;
        $agenda->save();

         //Se envía el email para cancelar la cita
         $cancelarData=[
            "nombre"=>$cita->paciente->name,
            "fecha"=>$agenda->fecha,
            "hora"=>$agenda->hora,
            "procedimiento"=>$agenda->procedimiento->nombre,
            "medico"=>$agenda->medico->name
        ];
        Mail::to($cita->paciente->email)->send(new CancelarMail($cancelarData));
        return redirect()->route('procedimientos.programados')->with('info', 'La cita de cirugía se canceló con éxito');
    }
}
