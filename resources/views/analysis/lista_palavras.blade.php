@extends('master')

@section('content')
  <div class="row">
    <div class="col-md-6">
      <table class="table lista-palavras" id="tbl-lista-palavras">
        <thead>
          <tr>
            <th scope="col" class="text-center" colspan="2">Ocorrências (tokens)</th>
          </tr>
        </thead>
          <tr>
            <td class="text-center">Total de Ocorrências</td>
            <td class="text-center">{{$analysis['count-tokens']}}</td>
          </tr>
          <tr>
            <td class="text-center">Total de Ocorrências que aparecem uma vez</td>
            <td class="text-center">{{null}}</td>
          </tr>
          <tr>
            <td class="text-center">Total de Ocorrências que aparecem mais de uma vez</td>
            <td class="text-center">{{null}}</td>
          </tr>
      </table>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <table class="table lista-palavras" id="tbl-lista-palavras">
        <thead>
          <tr>
            <th scope="col" class="text-center" colspan="2">Palavras únicas/formas (types)</th>
          </tr>
        </thead>
          <tr>
            <td class="text-center">Total de Palavras</td>
            <td class="text-center">{{$analysis['count-types']}}</td>
          </tr>
          <tr>
            <td class="text-center">Total de Palavras que aparecem uma vez</td>
            <td class="text-center">{{null}}</td>
          </tr>
          <tr>
            <td class="text-center">Total de Palavras que aparecem mais de uma vez</td>
            <td class="text-center">{{null}}</td>
          </tr>
      </table>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <table class="table lista-palavras" id="tbl-lista-palavras">
        <thead>
          <tr>
            <th scope="col" class="text-center" colspan="2">Índice Vocabular (token/type ratio)</th>
          </tr>
        </thead>
          <tr>
            <td class="text-center">Token/Type</td>
            <td class="text-center">{{$analysis['ratio']}}</td>
          </tr>
      </table>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <table class="table lista-palavras" id="tbl-lista-palavras">
        <thead style="cursor: pointer;">
          <tr>
            <th scope="col" data-sort class="text-center">Pos. <i class="fas fa-sort"></i></th>
            <th scope="col" data-sort class="text-center">Palavra <i class="fas fa-sort"></i></th>
            <th scope="col" data-sort class="text-center">Freq. <i class="fas fa-sort"></i></th>
          </tr>
        </thead>
          @php
            $i = 1;
          @endphp
          @foreach ($analysis['frequency-tokens'] as $word => $count)
            <tr>
              <td class="text-center">{{$i}}</td>
              <td class="text-center">{{$word}}</td>
              <td class="text-center">{{$count}}</td>
            </tr>
            @php
              $i++;
            @endphp
          @endforeach
      </table>
    </div>
  </div>
@endsection



@section('javascripts')
  @parent
  <script type="text/javascript" src="{{ asset('/js/corpuses/analise_lista_palavras.js') }}"></script>
@endsection
