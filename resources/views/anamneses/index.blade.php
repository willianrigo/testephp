@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
  .title {
      text-align: center;
      font-size: 2em;
  }
  .table .button{
    padding: 10px;
    /* padding-left: 10px;
    padding-right: 10px; */
    max-width: 150px;
  }
  #cssTable td 
  {
    text-align: center; 
    vertical-align: middle;
  }
  
</style>
<div class="uper">
<h1 class="title">Listagem de Anamneses</h1>

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td class="">Código</td>
          <td class="col-md-2">Anamnese</td>
          <td class="col-md-5">Resposta</td>
          <td colspan="2">Opções</td>
        </tr>
    </thead>
    <tbody>
        @foreach($anamneses as $anamnese)
        <tr>
            <td>{{$anamnese->id}}</td>
            <td>{{$anamnese->question}}</td>
            <td>{{$anamnese->answer}}</td>
            <td class="button"><a href="{{ route('anamneses.show',$anamnese->id)}}" class="btn btn-primary">Visualizar</a></td>
            <td class="button"><a href="{{ route('anamneses.edit',$anamnese->id)}}" class="btn btn-primary">Editar</a></td>
            <!-- <td class="button"><a href="{{ route('anamneses.destroy',$anamnese->id)}}" type="submit" class="btn btn-danger">Excluir</a></td> -->
            <td>
                <form action="{{ route('anamneses.destroy', $anamnese->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Excluir</button>
                </form>
            </td>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <div class="button"><a href="{{ route('anamneses.create')}}" class="btn btn-primary">Nova anamnese</a></div >
<div>
@endsection