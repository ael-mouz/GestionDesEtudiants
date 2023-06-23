@extends('layouts.app')

@section('content')
<h1>Edit Inscription</h1>

<form action="{{ route('inscriptions.update', $inscription->id) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="dateinscription">dateinscription</label>
    <input type="date" class="form-control" id="dateinscription" name="dateinscription" value="{{ $inscription->dateinscription }}" required>
    @error('dateinscription')
    <div>{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group">
    <label for="filiere_id">filiere_id</label>
    <select name="filiere_id" id="filiere_id" class="form-select">
      @foreach($filieres as $filiere)
      <option value="{{$filiere->id}}">{{$filiere->libelle}}</option>
      @endforeach
    </select>
    @error('filiere_id')
    <div>{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group">
    <label for="etudiant_id">etudiant_id</label>
    <select name="etudiant_id" id="etudiant_id" class="form-select">
      @foreach($etudiants as $etudiant)
      <option value="{{$etudiant->id}}">{{$etudiant->nom}}</option>
      @endforeach
    </select>
    @error('etudiant_id')
    <div>{{ $message }}</div>
    @enderror
  </div>

  <button type="submit" class="btn btn-primary">Create</button>
  <a href="{{ route('etudiants.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection