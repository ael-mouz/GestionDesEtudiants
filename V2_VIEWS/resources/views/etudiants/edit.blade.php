@extends('layouts.app')

@section('content')
<h1>Edit Etudiant</h1>

<form action="{{ route('etudiants.update', $etudiant->id) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="cne">CNE</label>
    <input type="number" class="form-control" id="cne" name="cne" value="{{ $etudiant->cne }}" required>
    @error('cne')
    <div>{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="nom">Nom</label>
    <input type="text" class="form-control" id="nom" name="nom" value="{{ $etudiant->nom }}" required>
    @error('nom')
    <div>{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="prenom">Prénom</label>
    <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $etudiant->prenom }}" required>
    @error('prenom')
    <div>{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="photo">Photo</label>
    <input type="text" class="form-control" id="photo" name="photo" value="{{ $etudiant->photo }}">
    @error('photo')
    <div>{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="cv">CV</label>
    <input type="text" class="form-control" id="cv" name="cv" value="{{ $etudiant->cv }}">
    @error('cv')
    <div>{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="daten">Date de naissance</label>
    <input type="date" class="form-control" id="daten" name="daten" value="{{ $etudiant->daten }}" required>
    @error('daten')
    <div>{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ $etudiant->email }}" required>
    @error('email')
    <div>{{ $message }}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
  <a href="{{ route('etudiants.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection