@extends('layouts.app')

@section('content')
<h1>Create Etudiant</h1>

<form action="{{ route('filieres.store') }}" method="POST">
  @csrf
  <div class="form-group">
    <label for="codefiliere">codefiliere</label>
    <input type="number" class="form-control" id="codefiliere" name="codefiliere" value="{{ old('codefiliere') }}" required>
    @error('codefiliere')
    <div>{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="libelle">libelle</label>
    <input type="text" class="form-control" id="libelle" name="libelle" value="{{ old('libelle') }}" required>
    @error('libelle')
    <div>{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Create</button>
    <a href="{{ route('etudiants.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection