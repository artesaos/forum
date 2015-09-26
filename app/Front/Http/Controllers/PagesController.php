<?php

namespace App\Front\Http\Controllers;

class PagesController extends BaseController
{
    /**
     * @return \Illuminate\View\View
     */
    public function home()
    {
        $quotes = [
            'Aquele que trabalha duro pode superar um gênio, porém, de nada adianta trabalhar duro se você não confia em você mesmo…',
            'Você é grande, mas não é dois! Eu sou pequeno, mas não sou metade.',
            'Eu sou calmo... e meu coração é puro... meu coração é pura maldade.',
            'Se quiser fazer algo, faça para ver o que acontece.',
            'Fiquei sem meus peões, meu cavalo, minha torre, meu bispo... E até a rainha... Mas ainda é muito cedo para um xeque-mate.',
            'Não existe tal coisa, como a perfeição. Esse mundo não é perfeito. É por isso que é lindo.'
        ];

        $quote = $quotes[array_rand($quotes, 1)];

        return $this->view('front::pages.home', compact('quote'));
    }
}