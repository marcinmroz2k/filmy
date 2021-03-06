@extends('welcome')

@section('content')

<div class="container pt-4">
	<h2 class="text-center">Dodaj nowy film:</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
	<form method="POST" action="{{ route('add-movie') }}" enctype="multipart/form-data">
		@csrf
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
        <button class="btn btn-primary font-weight-bold float-right mt-3 mb-5" type="submit">Dodaj</button>
	</form>
</div>

@endsection