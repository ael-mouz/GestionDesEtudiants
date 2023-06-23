@extends('layouts.app')

@section('content')
<h1>Create Inscription</h1>

<form action="{{ route('efms.store') }}" method="POST">
  @csrf
  <div class="form-group">
    <label for="codemodule">codemodule</label>
    <input type="text" class="form-control" id="codemodule" name="codemodule" value="{{ old('codemodule') }}" required>
    @error('codemodule')
    <div>{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group">
    <label for="note">note</label>
    <input type="text" class="form-control" id="note" name="note" value="{{ old('note') }}" required>
    @error('note')
    <div>{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group">
    <label for="coef">coef</label>
    <input type="text" class="form-control" id="coef" name="coef" value="{{ old('coef') }}" required>
    @error('coef')
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