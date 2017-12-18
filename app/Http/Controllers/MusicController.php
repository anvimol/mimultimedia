<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Music;
use App\Disk;
use DB;

class MusicController extends Controller
{
    protected $messages = [
        'artist.required' => 'Es necesario ingresar el nombre del artista',
        'artist.min' => 'Este campo debe tener al menos 2 caracteres',
        'title.required' => 'Es necesario ingresar un titulo para el disco',
        'title.min' => 'El titulo del disco debe tener al menos 2 caracteres',
        'year.required' => 'El año de producción es un campo obligatorio',
        'year.numeric' => 'El campo año inicio debe de ser un campo numérico',
        'image.required' => 'Es obligatorio seleccionar una imagen',
        'song.required' => 'El campo director es obligatorio',
        'disco_id.required' => 'Es obligatorio seleccionar un disco',

    ];

    protected $rules = [
        'artist' => ['required','min:2'],
        'title' => ['required','unique:musics','min:2'],
        'year' => ['required','numeric'],
        'image' => ['required'],
        'song' => ['required'],
        'disco_id' => ['required'],
    ];

    protected $rulesEdit = [
        'artist' => ['required','min:2'],
        'title' => ['required','min:2'],
        'year' => ['required','numeric'],
        'song' => ['required'],
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
        $musicas = DB::table('musics as m')
        ->join('disks as d','m.disk_id','=','d.id')
        ->select('m.id','m.artist','m.image','m.title','m.year','m.country','d.name')
        ->where('m.artist','LIKE','%'.$searchText.'%')
        ->orwhere('d.name','LIKE','%'.$searchText.'%')
        ->where('m.title','LIKE','%'.$searchText.'%')
        ->orwhere('d.name','LIKE','%'.$searchText.'%')
        ->orderBy('m.artist','ASC')
        ->paginate(9);
        return view('admin.musicas.index', compact('musicas','searchText'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $disco = Disk::all()->pluck('name','id');
        return view('admin.musicas.create', compact('disco'));
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
        $music = new Music;
        $music->artist = $request->artist;
        $music->title = $request->title;
        $music->year = $request->year;
        $music->country = $request->country;
        $music->song = $request->song;

        $file = $request->file('image');
        $path = public_path() . '/images/discos';
        $fileName = uniqid() . $file->getClientOriginalName();
        $moved = $file->move($path, $fileName);
        $music->image = $fileName;

        $music->disk_id = $request->disco_id;

        $music->save();
        
        return redirect('musica');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $musica = Music::find($id);
        $disco = Disk::all()->pluck('name','id');
        $selectedDisk = $musica->disk_id;
        return view('admin.musicas.show',compact('musica','disco','selectedDisk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $musica = Music::find($id);
        $disco = Disk::all()->pluck('name','id');
        $selectedDisk = $musica->disk_id;
        return view('admin.musicas.edit',compact('musica','disco','selectedDisk'));
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
        $music = Music::find($id);
        $music->artist = $request->artist;
        $music->title = $request->title;
        $music->year = $request->year;
        $music->country = $request->country;
        $music->song = $request->song;

        if (empty($request->file('image'))) {
            $music->image = $music->image;
        }
        else {
            unlink(public_path() . '/images/discos/' . $music->image);
            $file = $request->file('image');
            $path = public_path() . '/images/discos';
            $fileName = uniqid() . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);
            $music->image = $fileName;
        }

        $music->disk_id = $request->disco_id;

        $music->save();
        
        return redirect('musica');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $musica = Music::find($id);
        unlink(public_path() . '/images/discos/' . $musica->image);
        $musica->delete();
        return redirect('musica');
    }
}
