@extends('layouts.app')

@section('content')
<h1>Etudiants</h1>

<a href="{{ route('etudiants.create') }}" class="btn btn-primary">Create Etudiant</a>

@if (session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif

<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>CNE</th>
      <th>Nom</th>
      <th>Prénom</th>
      <th>Photo</th>
      <th>CV</th>
      <th>Date de naissance</th>
      <th>Email</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($etudiants as $etudiant)
    <tr>
      <td>{{ $etudiant->id }}</td>
      <td>{{ $etudiant->cne }}</td>
      <td>{{ $etudiant->nom }}</td>
      <td>{{ $etudiant->prenom }}</td>
      <td>{{ $etudiant->photo }}</td>
      <td>{{ $etudiant->cv }}</td>
      <td>{{ $etudiant->daten }}</td>
      <td>{{ $etudiant->email }}</td>
      <td>
        <a href="{{ route('etudiants.show', $etudiant->id) }}" class="btn btn-primary">View</a>
        <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn btn-secondary">Edit</a>
        <form action="{{ route('etudiants.destroy', $etudiant->id) }}" method="POST" style="display: inline">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this etudiant?')">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection