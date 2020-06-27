@extends('welcome')

@section('content')

<div class="container pt-4">
	<h2 class="text-center mt-3">{{ $movie->tytul }}</h2>
	<div class="row">
		<div class="col-2">
			<div class="mt-5">
				<img src="{{ asset('okladki/')."/".$movie->okladka }}" width="150" height="220">
			</div>
		</div>
		<div class="col-10 mt-5">
			<span class="font-weight-bold">Gatunek: {{ $movie->gatunek }}</span>
			<p class="mt-4">
				{{ $movie->opis }}
			</p>
		</div>
	</div>
</div>

@endsection	