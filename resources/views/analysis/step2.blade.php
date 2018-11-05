@extends('master')

@section('content')
  <div class="container-lista">
    <div class="row">
      <h2>{!! __('texts.passo2.passo') !!}</h2>
    </div>
    <div class="row mt-10">
      <p>{!! __('texts.passo2.texto1') !!}</p>
    </div>

    <form name="step2" action="/analysis/2" method="post">
      {{ csrf_field() }}

      <div class="row align-items-center row-header-lista px-1">
        <div class="col-xs-1 text-center">
          <h3 class="h3 h3-lista">{!! __('texts.passo2.lista') !!}</h3>
        </div>
      </div>
      <div class="row bg-gray">
        <div class="col-lg-1-12">
          <ul class="corpora">
            <li class="corpora">
              <input type="radio" name="tool" id="concordanciador" value="concordanciador" checked><label for="concordanciador">{!! __('texts.categorias.concordanciador') !!}</label>
            </li>
            <li>
              <input type="radio" name="tool" id="lista_palavras" value="lista_palavras"><label for="lista_palavras">{!! __('texts.categorias.gerador1') !!}</label>
            </li>
            <li>
              <input type="radio" name="tool" id="n_grams" value="n_grams"><label for="n_grams">{!! __('texts.categorias.gerador2') !!}</label>
            </li>
          </ul>
        </div>
      </div>

      <div class="row">
        <div class="col text-right mt-4 pr-0">
          <button type="submit" class="btn btn-success text-right">Próximo Passo</button>
        </div>
      </div>
    </form>
  </div>
@endsection

@section('javascripts')
  @parent
@endsection
