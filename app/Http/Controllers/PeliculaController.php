<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disk;
use App\Pelicula;
use DB;

class PeliculaController extends Controller
{
    protected $messages = [
        'title.required' => 'Es necesario ingresar un titulo para la pelicula',
        'title.min' => 'El titulo de la pelicula debe tener al menos 2 caracteres',
        'year.required' => 'El año de producción es un campo obligatorio',
        'year.numeric' => 'El campo año inicio debe de ser un campo numérico',
        'image.required' => 'Es obligatorio seleccionar una imagen',
        'director.required' => 'El campo director es obligatorio',
        'actor.required' => 'Es obligatorio insertar algun dato en Reparto',
        'disco_id.required' => 'Es obligatorio seleccionar un disco',

    ];

    protected $rules = [
        'title' => ['required','unique:peliculas','min:2'],
        'year' => ['required','numeric'],
        'image' => ['required'],
        'director' => ['required'],
        'actor' => ['required'],
        'disco_id' => ['required'],
    ];

    protected $rulesEdit = [
        'title' => ['required','min:2'],
        'year' => ['required','numeric'],
        'director' => ['required'],
        'actor' => ['required'],
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
        $peliculas = DB::table('peliculas as p')
        ->join('disks as d','p.disk_id','=','d.id')
        ->select('p.id','p.image','p.title','p.year','p.director','p.country','d.name')
        ->where('p.title','LIKE','%'.$searchText.'%')
        ->orwhere('d.name','LIKE','%'.$searchText.'%')
        ->orderBy('p.title','desc')
        ->paginate(9);
        return view('admin.peliculas.index', compact('peliculas','searchText'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $disco = Disk::all()->pluck('name','id');
        return view('admin.peliculas.create', compact('disco'));
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
        $pelicula = new Pelicula;
        $pelicula->title = $request->title;
        $pelicula->year = $request->year;
        $pelicula->country = $request->country;
        $pelicula->director = $request->director;
        $pelicula->actor = $request->actor;
        $pelicula->sinopsis = $request->sinopsis;

        $file = $request->file('image');
        $path = public_path() . '/images/peliculas';
        $fileName = uniqid() . $file->getClientOriginalName();
        $moved = $file->move($path, $fileName);
        $pelicula->image = $fileName;

        $pelicula->disk_id = $request->disco_id;

        $pelicula->save();
        
        return redirect('pelicula');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelicula = Pelicula::find($id);
        $disco = Disk::all()->pluck('name','id');
        $selectedDisk = $pelicula->disk_id;
        return view('admin.peliculas.show',compact('pelicula','disco','selectedDisk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelicula = Pelicula::find($id);
        $disco = Disk::all()->pluck('name','id');
        $selectedDisk = $pelicula->disk_id;
        return view('admin.peliculas.edit',compact('pelicula','disco','selectedDisk'));
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
        $pelicula = Pelicula::find($id);
        $pelicula->title = $request->title;
        $pelicula->year = $request->year;
        $pelicula->country = $request->country;
        $pelicula->director = $request->director;
        $pelicula->actor = $request->actor;
        $pelicula->sinopsis = $request->sinopsis;

        if (empty($request->file('image'))) {
            $pelicula->image = $pelicula->image;
        }
        else {
            unlink(public_path() . '/images/peliculas/' . $pelicula->image);
            $file = $request->file('image');
            $path = public_path() . '/images/peliculas';
            $fileName = uniqid() . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);
            $pelicula->image = $fileName;

        }

        $pelicula->disk_id = $request->disco_id;

        $pelicula->save();
        
        return redirect('pelicula');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelicula = Pelicula::find($id);
        unlink(public_path() . '/images/peliculas/' . $pelicula->image);
        $pelicula->delete();
        return redirect('pelicula');
    }
}

