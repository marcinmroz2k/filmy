@extends('welcome')

@section('content')

<div class="container pt-4">
	<h2 class="text-center">Wyniki wyszukiwania:</h2>
	<table class="table mt-4">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Tytuł</th>
	      <th scope="col">Gatunek/Gatunki</th>
	      <th scope="col">Akcja</th>
	    </tr>
	  </thead>
	  <tbody>
	    @foreach($movies as $movie)
	    	<tr>
	      		<th scope="row">{{ $movie->id }}</th>
	      		<td>{{ $movie->tytul }}</td>
	      		<td>{{ $movie->gatunek }}</td>
	      		<td>
	      			<div class="btn-group" role="group">
						<button class="btn btn-default"><a href="{{ url('movies').'/'.$movie->id }}">Podgląd</a></button>
						<button class="btn btn-default"><a href="{{ url('edit/movies').'/'.$movie->id }}">Edytuj</a></button>
      					<form action="delete/movies/{{ $movie->id }}" method="post">
      						@csrf
                			{{ method_field('delete') }}
                			<button class="btn btn-default text-primary" onclick="return confirm('Na pewno chcesz usunąc ten film?')" type="submit">Usuń</button>
            			</form>
	      			</div>
	      		</td>
	    	</tr>
	    @endforeach
	  </tbody>
	</table>
</div>

@endsection