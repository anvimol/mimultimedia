<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disk;
use App\Serie;
use DB;

class SerieController extends Controller
{
   protected $messages = [
        'title.required' => 'Es necesario ingresar un titulo para la serie',
        'title.min' => 'El titulo de la serie debe tener al menos 2 caracteres',
        'year.required' => 'El año de producción es un campo obligatorio',
        'year.numeric' => 'El campo año inicio debe de ser una campo numérico',
        'image.required' => 'Es obligatorio seleccionar una imagen',
        'director.required' => 'El campo director es obligatorio',
        'actor.required' => 'Es obligatorio insertar algun dato en Reparto',
        'temporada.required' => 'Es obligatorio ingresar una temporada',
        'disco_id.required' => 'Es obligatorio seleccionar un disco',

    ];

    protected $rules = [
        'title' => ['required','unique:series','min:2'],
        'year' => ['required','numeric'],
        'image' => ['required'],
        'director' => ['required'],
        'actor' => ['required'],
        'temporada' => ['required'],
        'disco_id' => ['required'],
    ];

    protected $rulesEdit = [
        'title' => ['required','min:2'],
        'year' => ['required','numeric'],
        'director' => ['required'],
        'actor' => ['required'],
        'temporada' => ['required'],
        'disco_id' => ['required'],
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchText=trim($request->get('searchText'));
        $series = DB::table('series as s')
        ->join('disks as d','s.disk_id','=','d.id')
        ->select('s.id','s.image','s.title','s.year','s.temporada','s.country','d.name')
        ->where('s.title','LIKE','%'.$searchText.'%')
        ->orwhere('d.name','LIKE','%'.$searchText.'%')
        ->orderBy('s.title','ASC')
        ->paginate(9);
        return view('admin.series.index', compact('series','searchText'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $disco = Disk::all()->pluck('name','id');
        return view('admin.series.create', compact('disco'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules, $this->messages);
        $serie = new Serie;
        $serie->title = $request->title;
        $serie->year = $request->year;
        $serie->temporada = $request->temporada;
        $serie->country = $request->country;
        $serie->director = $request->director;
        $serie->actor = $request->actor;
        $serie->sinopsis = $request->sinopsis;
        if(empty($request->completed)) {
            $serie->completed = 0;
        }
        else {
            $serie->completed = $request->completed;
        }
        
        $file = $request->file('image');
        $path = public_path() . '/images/series';
        $fileName = uniqid() . $file->getClientOriginalName();
        $moved = $file->move($path, $fileName);
        $serie->image = $fileName;

        $serie->disk_id = $request->disco_id;

        $serie->save();
        
        return redirect('serie');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serie = Serie::find($id);
        $disco = Disk::all()->pluck('name','id');
        $selectedDisk = $serie->disk_id;
        return view('admin.series.show',compact('serie','disco','selectedDisk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serie = Serie::find($id);
        $disco = Disk::all()->pluck('name','id');
        $selectedDisk = $serie->disk_id;
        return view('admin.series.edit',compact('serie','disco','selectedDisk'));
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
        $this->validate($request, $this->rulesEdit, $this->messages);
        $serie = Serie::find($id);
        $serie->title = $request->title;
        $serie->year = $request->year;
        $serie->temporada = $request->temporada;
        $serie->country = $request->country;
        $serie->director = $request->director;
        $serie->actor = $request->actor;
        $serie->sinopsis = $request->sinopsis;
        if(empty($request->completed)) {
            $serie->completed = 0;
        }
        else {
            $serie->completed = $request->completed;
        }
        
        if (empty($request->file('image'))) {
            $serie->image = $serie->image;
        }
        else {
            unlink(public_path() . '/images/series/' . $serie->image);
            $file = $request->file('image');
            $path = public_path() . '/images/series';
            $fileName = uniqid() . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);
            $serie->image = $fileName;

        }
        
        $serie->disk_id = $request->disco_id;

        $serie->save();
        
        return redirect('serie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serie = Serie::find($id);
        unlink(public_path() . '/images/series/' . $serie->image);
        $serie->delete();
        return redirect('serie');
    }
}
