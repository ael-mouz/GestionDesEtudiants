@extends('layouts.app')

@section('content')
<h1>Inscriptions</h1>

<a href="{{ route('inscriptions.create') }}" class="btn btn-primary">Create Filiere</a>

@if (session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif

<table class="table">
  <thead>
    <tr>
      <th>dateinscription</th>
      <th>filiere_id</th>
      <th>etudiant_id</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($inscriptions as $inscriptions)
    <tr>
      <td>{{ $inscriptions->dateinscription }}</td>
      <td>{{ $inscriptions->filiere->libelle }}</td>
      <td>{{ $inscriptions->etudiant->nom }}</td>
      <td>
        <a href="{{ route('inscriptions.show', $inscriptions->id) }}" class="btn btn-primary">View</a>
        <a href="{{ route('inscriptions.edit', $inscriptions->id) }}" class="btn btn-secondary">Edit</a>
        <form action="{{ route('inscriptions.destroy', $inscriptions->id) }}" method="POST" style="display: inline">
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