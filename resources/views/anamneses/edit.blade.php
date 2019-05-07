@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header"> 
    Edit Share
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('anamneses.update', $anamnese->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
              @csrf
              <label for="name">Anamnese:</label>
              <input type="text" class="form-control" name="question" value="<?php echo htmlspecialchars($anamnese->question); ?>" />
          </div>
          <div id="form-group">
            <label>Resposta</label>
              <label>
                <input type="radio" name="answer" value="Sim" checked>Sim
              </label>
              <label>
                <input type="radio" name="answer" value="Nao">Não
            </label>
          </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection