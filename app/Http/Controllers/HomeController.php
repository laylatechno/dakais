<?php

namespace App\Http\Controllers;

use App\Models\Alasan;
use App\Models\Faq;
use App\Models\Metode;
use App\Models\Portofolio;
use App\Models\Profil;
use App\Models\Galeri;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $alasans = Alasan::all();
        $profils = Profil::all();
        $profile = Profil::first();
        $testimonis = Testimoni::all();
        $faqModel = new Faq();
        $faqs = $faqModel->orderByUrutan()->get();
        $metodes = Metode::all();
        $galeris = Galeri::all();
        return view('front.home',compact('alasans','profils','testimonis','portofolios','faqs','metodes','profile','galeris'));
    }

    public function blog(){
        return view('front.blog');
    }

    public function kontak(){
        return view('front.kontak');
    }

    public function kebijakan(){
        $profile = Profil::first();
        return view('front.kebijakan',compact('profile'));
    }

    public function syarat(){
        $profile = Profil::first();
        return view('front.syarat',compact('profile'));
    }

}
