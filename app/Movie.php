<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Movie extends Model
{

	use Searchable;

    protected $fillable = [
		'tytul' , 'opis' , 'okladka' , 'gatunek' , 'kraj_produkcji',
	];

	public $timestamps = false;

	public function toSearchableArray()
	{
  		$array = $this->toArray();
     
  		return array('tytul' => $array['tytul']);
	}

}