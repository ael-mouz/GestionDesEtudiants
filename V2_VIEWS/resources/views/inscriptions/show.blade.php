@extends('layouts.app')

@section('content')
<h1>Insctiption Details</h1>

<div>
  <p><strong>ID:</strong> {{ $ins->id }}</p>
  <p><strong>dateinscription:</strong> {{ $ins->dateinscription }}</p>
  <p><strong>etudiant:</strong> {{ $ins->etudiant->nom }}</p>
  <p><strong>filiere:</strong> {{ $ins->filiere->libelle }}</p>
</div>

<a href="{{ route('inscriptions.index') }}" class="btn btn-primary">Back</a>
@endsection