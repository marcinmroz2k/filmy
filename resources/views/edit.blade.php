@extends('welcome')

@section('content')

<div class="container mt-4">
	<h2 class="font-weight-bold text-center">Edycja filmu:</h2>
	<form action="{{ $id }}/submit" method="post" enctype="multipart/form-data">
    	@csrf
    	{{ method_field('put') }}
    	<div class="form-group mt-3">
        	<label for="tytul" class="font-weight-bold">Tytuł:</label>
        	<input type="text" class="form-control" name="tytul">
        </div>
        <div class="form-group mt-3">
            <label for="tytul" class="font-weight-bold">Gatunek:</label>
        	<input type="text" class="form-control" name="gatunek">
        </div>
        <div class="form-group mt-3">
        	<label for="tytul" class="font-weight-bold">Kraj produkcji:</label>
        	<input type="text" class="form-control" name="kraj_produkcji">
        </div>
        <div class="form-group mt-3">
        	<label for="tytul" class="font-weight-bold">Opis:</label>
        	<textarea class="form-control" name="opis" rows="5"></textarea>
        </div>
        <div class="form-group mt-3">
        	<label for="tytul" class="font-weight-bold">Okładka:</label>
        	<div class="custom-file">
			     <input type="file" class="custom-file-input" name="okladka">
		         <label class="custom-file-label" for="okladka">Wybierz plik</label>
		    </div>
        </div>
    	<button class="btn btn-primary text-white float-right font-weight-bold" type="submit">Edytuj film</button>
    </form>
</div>
	

@endsection