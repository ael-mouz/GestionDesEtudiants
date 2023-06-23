@extends('layouts.app')

@section('content')
<h1>Create Etudiant</h1>

<form action="{{ route('etudiants.store') }}" method="POST">
  @csrf
  <div class="form-group">
    <label for="cne">CNE</label>
    <input type="number" class="form-control" id="cne" name="cne" value="{{ old('cne') }}" required>
    @error('cne')
    <div>{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="nom">Nom</label>
    <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}" required>
    @error('nom')
    <div>{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="prenom">Prénom</label>
    <input type="text" class="form-control" id="prenom" name="prenom" value="{{ old('prenom') }}" required>
    @error('prenom')
    <div>{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="photo">Photo</label>
    <input type="file" class="form-control" id="photo" name="photo" value="{{ old('photo') }}" required>
    @error('photo')
    <div>{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="cv">CV</label>
    <input type="file" class="form-control" id="cv" name="cv" value="{{ old('cv') }}" required>
    @error('cv')
    <div>{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="daten">Date de naissance</label>
    <input type="date" class="form-control" id="daten" name="daten" value="{{ old('daten') }}" required>
    @error('daten')
    <div>{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
    @error('email')
    <div>{{ $message }}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Create</button>
  <a href="{{ route('etudiants.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection