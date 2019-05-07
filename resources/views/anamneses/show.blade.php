@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header"> 
    Visualizar Anamnese
  </div>
  <div class="card-body">
   
        @method('PATCH')
        @csrf
        <div class="form-group">
            @csrf
            <label for="name">Anamnese:</label>
            <input type="text" class="form-control" name="question" value="<?php echo htmlspecialchars($anamnese->question); ?>" readonly/>
          </div>
          <div id="form-group">
            <label>Resposta</label>
              <label>
                <input type="radio" name="answer" value="Sim" checked disabled>Sim
              </label>
              <label>
                <input type="radio" name="answer" value="Nao" disabled>Não
            </label>
          </div>
        <button type="submit" class="btn btn-primary"><a href="{{ route('anamneses.index')}}" class="btn btn-primary">Voltar</a></button>
  </div>
</div>
@endsection