<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;

class BeritaController extends Controller
{

    public function index() {
        return view('user.berita.index');
    }

    public function detail($beritaid) {
        $news = Berita::find($beritaid);
        return view('user.berita.detail', ['news' => $news]);
    }

    public function create() {
        return view('upt.berita.create');
    }


    // For Admin UPT
    public function store(Request $request) {
        Berita::create([
            'title' => $request->title,
            'body'  => $request->body
        ]);
        toast('Berhasil tambah berita','success');
        return back();
    }

    public function list() {
        return view('upt.berita.list');
    }

    public function display($beritaid) {
        $news = Berita::find($beritaid);
        return view('upt.berita.display', ['news' => $news]);
    }

    public function edit($beritaid)
    {
        $news = Berita::find($beritaid);
        return view('upt.berita.edit', [ 'news' => $news]);
    }

    public function update(Request $request, $beritaid)
    {
        Berita::where('id', $beritaid)->update([
            'title' => $request->title,
            'body'  => $request->body
        ]);
        toast('Berhasil ubah berita','success');
        return redirect()->to('/upt/berita/edit/'.$beritaid);
    }

    public function destroy($beritaid)
    {
        Berita::where('id', $beritaid)->delete();
        toast('Berhasil hapus berita','success');
        return back();
    }

    public static function limit_text($text, $limit) {
        if (str_word_count($text, 0) > $limit) {
            $words = str_word_count($text, 2);
            $pos = array_keys($words);
            $text = substr($text, 0, $pos[$limit]) . ' [....]';
        }
        return $text;
    }
}
