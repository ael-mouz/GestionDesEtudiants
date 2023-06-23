@extends('layouts.app')

@section('content')
<h1>Etudiant Details</h1>

<div>
  <p><strong>ID:</strong> {{ $etudiant->id }}</p>
  <p><strong>CNE:</strong> {{ $etudiant->cne }}</p>
  <p><strong>Nom:</strong> {{ $etudiant->nom }}</p>
  <p><strong>Prénom:</strong> {{ $etudiant->prenom }}</p>
  <p><strong>Photo:</strong> {{ $etudiant->photo }}</p>
  <p><strong>CV:</strong> {{ $etudiant->cv }}</p>
  <p><strong>Date de naissance:</strong> {{ $etudiant->daten }}</p>
  <p><strong>Email:</strong> {{ $etudiant->email }}</p>
</div>

<a href="{{ route('etudiants.index') }}" class="btn btn-primary">Back</a>
@endsection