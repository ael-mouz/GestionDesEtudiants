@extends('layouts.app')

@section('content')
<h1>Efm Details</h1>

<div>
  <p><strong>ID:</strong> {{ $ef->id }}</p>
  <p><strong>codemodule:</strong> {{ $ef->codemodule }}</p>
  <p><strong>note:</strong> {{ $ef->note }}</p>
  <p><strong>coef:</strong> {{ $ef->coef }}</p>
  <p><strong>etudiant_id:</strong> {{ $ef->etudiant->nom }}</p>
</div>

<a href="{{ route('efms.index') }}" class="btn btn-primary">Back</a>
@endsection