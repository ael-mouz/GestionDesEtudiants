@extends('layouts.app')

@section('content')
<h1>Create Etudiant</h1>

<form action="{{ route('filieres.update', $filiere->id) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="codefiliere">codefiliere</label>
    <input type="number" class="form-control" id="codefiliere" name="codefiliere" value="{{ $filiere->codefiliere }}" required>
    @error('codefiliere')
    <div>{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="libelle">libelle</label>
    <input type="text" class="form-control" id="libelle" name="libelle" value="{{ $filiere->libelle }}" required>
    @error('libelle')
    <div>{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Create</button>
    <a href="{{ route('etudiants.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection