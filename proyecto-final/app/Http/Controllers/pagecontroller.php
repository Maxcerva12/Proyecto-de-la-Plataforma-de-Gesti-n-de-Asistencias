<?php

namespace App\Http\Controllers;

use App\Models\post;


use Illuminate\Http\Request;
use Illuminate\support\Str;

class pagecontroller extends Controller
{
    public function home()
    {
        return view('home');  
    }

    public function estudiante()
    {
        
        return view('estudiante');  
    }

    public function administrador()
    {
        //$posts = post::get();
         /**
         * etraeme los post
         */
        //$post = post::first();
        //$post = post::find(id);
        //dd($post);
        
        $posts = post::latest()->paginate();
        
        return view('administrador', ['posts' =>$posts]);
    }

    public function post(post $post)
    {   
        return view('post', ['post' => $post]);
    }

    public function buscar($request)
    {
        return $request->all();
    }
}