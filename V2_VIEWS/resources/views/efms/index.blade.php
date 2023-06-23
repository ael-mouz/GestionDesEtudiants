@extends('layouts.app')

@section('content')
<h1>Efm</h1>

<a href="{{ route('efms.create') }}" class="btn btn-primary">Create Filiere</a>

@if (session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif

<table class="table">
  <thead>
    <tr>
      <th>codemodule</th>
      <th>note</th>
      <th>coef</th>
      <th>etudiant_id</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($efms as $efm)
    <tr>
      <td>{{ $efm->codemodule }}</td>
      <td>{{ $efm->note }}</td>
      <td>{{ $efm->coef }}</td>
      <td>{{ $efm->etudiant->nom }}</td>
      <td>
        <a href="{{ route('efms.show', $efm->id) }}" class="btn btn-primary">View</a>
        <a href="{{ route('efms.edit', $efm->id) }}" class="btn btn-secondary">Edit</a>
        <form action="{{ route('efms.destroy', $efm->id) }}" method="POST" style="display: inline">
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