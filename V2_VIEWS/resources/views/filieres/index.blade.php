@extends('layouts.app')

@section('content')
<h1>Filieres</h1>

<a href="{{ route('filieres.create') }}" class="btn btn-primary">Create Filiere</a>

@if (session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif

<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>codefiliere</th>
      <th>libelle</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($filieres as $filiere)
    <tr>
      <td>{{ $filiere->id }}</td>
      <td>{{ $filiere->codefiliere }}</td>
      <td>{{ $filiere->libelle }}</td>
      <td>
        <a href="{{ route('filieres.show', $filiere->id) }}" class="btn btn-primary">View</a>
        <a href="{{ route('filieres.edit', $filiere->id) }}" class="btn btn-secondary">Edit</a>
        <form action="{{ route('filieres.destroy', $filiere->id) }}" method="POST" style="display: inline">
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