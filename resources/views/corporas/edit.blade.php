@extends('master')

@section('content')
  <form method="POST" action="/corporas/{{ $corpora->id  }}">
      {{ csrf_field() }}
      {{ method_field('patch') }}
      Nome: <input name="titulo" value="{{ $corpora->titulo }}" required>
      Descrição: <input name="titulo" value="{{ $corpora->descricao }}" required>
      <button class="btn btn-success" type="submit">Salvar</button>
  </form>
@endsection
