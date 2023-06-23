@extends('layouts.app')

@section('content')
<h1>Filiere Details</h1>

<div>
  <p><strong>ID:</strong> {{ $filiere->id }}</p>
  <p><strong>codefiliere:</strong> {{ $filiere->codefiliere }}</p>
  <p><strong>libelle:</strong> {{ $filiere->libelle }}</p>
</div>

<a href="{{ route('filieres.index') }}" class="btn btn-primary">Back</a>
@endsection