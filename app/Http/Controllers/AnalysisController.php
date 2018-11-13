<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Corpora;
use App\Utils;

class AnalysisController extends Controller
{
  /**
   * Verifies the entry and display the second step for corpora analysis, the selection of tool.
   *
   * @return \Illuminate\Http\Response
   */
  public function step2(Request $request)
  {
    $validatedData = $request->validate([
        'language' => 'required',
        'corporas' => 'required',
    ]);

    $corporas_ids = collect($request->corporas);
    $request->session()->put('form_analysis.corporas_ids', $corporas_ids);
    $language = $request->language;
    $request->session()->put('form_analysis.language', $language);

    //verifica se todos os corpora estão disponíveis no idioma selecionado
    $has_language = $corporas_ids->every(function ($corpora_id) use ($language){
        $corpora = Corpora::find($corpora_id);
        return $corpora->hasCorpusLang($language);
    });

    if(!$has_language)
    {
      return redirect("/");
    }

    return view('analysis.step2', compact('language'));
  }

  /**
   * Redirect to the selected tool.
   *
   * @return \Illuminate\Http\Response
   */
  public function step3(Request $request)
  {
    $tool = $request->tool;

    switch ($tool) {
      case 'concordanciador':
        // code...
        break;
      case 'lista_palavras':
        return $this->listaPalavras($request);
        break;
      case 'n_grams':
        // code...
        break;
      default:
        return redirect("/");
        break;
    }

    return redirect("/");
  }

  /**
   * Process the analysis and display it.
   *
   * @return \Illuminate\Http\Response
   */
  public function listaPalavras(Request $request)
  {
    $corpora_ids = collect($request->session()->get('form_analysis.corporas_ids'));
    $all_corpus = $corpora_ids->reduce(function ($carry, $id) {
        $corpora_corpus = Corpora::find($id)->getAllCorpus();
        return $carry . ' ' . $corpora_corpus;
    });

    $utils = new Utils($all_corpus);
    $analysis = $utils->getAnalysis();

    return view('analysis.lista_palavras', compact('analysis'));
  }

}
