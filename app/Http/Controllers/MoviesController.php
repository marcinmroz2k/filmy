<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Movie;

class MoviesController extends Controller
{
	public function __construct()
	{
    	$this->middleware('MovieMiddleware')->only('store');
	}

    public function get()
    {
    	$movies = DB::table('movies')->get();
    	return view('movies')->with(['movies' => $movies]);
    }

    public function store(Request $request)
    {
    	$tytul 			= $request->input('tytul');
    	$gatunek 		= $request->input('gatunek');
    	$kraj_produkcji = $request->input('kraj_produkcji');
    	$opis 			= $request->input('opis');
    	$okladka		= $request->file('okladka');

    	$fileName = $okladka->getClientOriginalName();
        $destination = public_path('okladki/').$fileName;

        $movie = new Movie;
        $movie->tytul           = $tytul;
        $movie->gatunek         = $gatunek;
        $movie->kraj_produkcji  = $kraj_produkcji;
        $movie->opis            = $opis;
        $movie->okladka         = $fileName;

        if($movie->save())
        {
            copy($okladka,$destination);
            return redirect('movies');
        }
        else
        {
            echo "coś poszło nie tak";
        }
    }

    public function delete($id)
    {
    	$movie = DB::table('movies')->where('id' , '=' , $id)->first();
        $okladka = $movie->okladka;

        unlink(public_path('okladki').'/'.$okladka);

        $movie = DB::table('movies')->where('id' , '=' , $id)->delete();

    	return redirect()->back()->with('message-success' , "Film o id = $id został usunięty pomyślnie.");
    }

    public function edit($id)
    {
    	return view('edit')->with(['id' => $id]);
    }

    public function preview($id)
    {
    	$movie = DB::table('movies')->where('id' , '=' , $id)->first();

        return view('movie-preview')->with(['movie' => $movie]);
    }

    public function update($id, Request $request)
    {
        $movie = Movie::where('id' , '=' , $id)->first();

        $oldFile = $movie->okladka;

        $tytul          = $request->input('tytul');
        $gatunek        = $request->input('gatunek');
        $kraj_produkcji = $request->input('kraj_produkcji');
        $opis           = $request->input('opis');
        $okladka        = $request->file('okladka');

        if(!empty($tytul))
        {
            $movie->update(['tytul' => $tytul]);
        }

        if(!empty($gatunek))
        {
            $movie->update(['gatunek' => $gatunek]);
        }

        if(!empty($kraj_produkcji))
        {
            $movie->update(['kraj_produkcji' => $kraj_produkcji]);
        }

        if(!empty($opis))
        {
            $movie->update(['opis' => $opis]);
        }

        if($request->has('okladka'))
        {
            $fileName = $okladka->getClientOriginalName();
            $destination = public_path('okladki/');

            $movie->update(['okladka' => $fileName]);

            $destination = public_path('okladki/');

            $oldPath = $destination.$oldFile;

            unlink($oldPath);
            copy($okladka,$destination.$fileName);
        }

            return redirect('movies');

    }
}