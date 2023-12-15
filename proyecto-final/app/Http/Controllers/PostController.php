<?php

namespace App\Http\Controllers;

use App\Models\post;

use Illuminate\Http\Request;
use Illuminate\support\Str;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class PostController extends Controller
{
    public function index()
    {
        return view("posts.index", [
            'posts' => post::latest()->paginate(),
        ]);
    }
    public function create(post $post)
    {
        return view("posts.create", [ 'post' => $post ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'identi'=> 'required',
            'nombre'=> 'required',
            'apellido'=> 'required',
            'correo'=> 'required',
            'celular'=> 'required',
            'materia'=> 'required',
        ]);
        $post = $request->user()->posts()->create([
        
            'identi'  =>$id = $request->identi,
            'nombre'  =>$request->nombre,
            'apellido'=>$request->apellido,
            'correo'  =>$request->correo,
            'celular' =>$request->celular,
            'materia' =>$request->materia,
            'slug'=> Str::slug($id),
        ]);
        return redirect()->route('posts.create', $post);
    }
    public function guardarEstudiante(Request $request)
    {
        $post = $request->user()->posts()->create([

            'identi'  =>$id = $request->identi,
            'nombre'  =>$request->nombre,
            'apellido'=>$request->apellido,
            'correo'  =>$request->correo,
            'celular' =>$request->celular,
            'materia' =>$request->materia,
            'slug'=> Str::slug($id),
        ]);
        return redirect()->route('estudiante', $post);
    }

      
    public function edit(post $post)
    { 
        return view("posts.edit", [ 'post' => $post ]);
    }
    public function Update(Request $request, Post $post)
    {
        $request->validate([
            'identi'=> 'required',
            'nombre'=> 'required',
            'apellido'=> 'required',
            'correo'=> 'required',
            'celular'=> 'required',
            'materia'=> 'required',
        ]);
        $post->update([
          
            'identi'  =>$id = $request->identi,
            'nombre'  =>$request->nombre,
            'apellido'=>$request->apellido,
            'correo'  =>$request->correo,
            'celular' =>$request->celular,
            'materia' =>$request->materia,
            'slug'=> Str::slug($id),
            
        ]);
        return redirect()->route('posts.edit', $post);
    }
    
    
    public function export()
{
    $posts = Post::all();

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->setCellValue('A1', 'Identi');
    $sheet->setCellValue('B1', 'Nombre');
    $sheet->setCellValue('C1', 'Apellido');
    $sheet->setCellValue('D1', 'Correo');
    $sheet->setCellValue('E1', 'Celular');
    $sheet->setCellValue('F1', 'Materia'); 
    $sheet->setCellValue('G1', 'Slug'); 
    $sheet->setCellValue('H1', 'fecha');
    
    

    $row = 2; 

    foreach ($posts as $post) {
        $sheet->setCellValue('A' . $row, $post->identi);
        $sheet->setCellValue('B' . $row, $post->nombre);
        $sheet->setCellValue('C' . $row, $post->apellido);
        $sheet->setCellValue('D' . $row, $post->correo);
        $sheet->setCellValue('E' . $row, $post->celular);
        $sheet->setCellValue('F' . $row, $post->materia);
        $sheet->setCellValue('G' . $row, $post->slug);
        $sheet->setCellValue('H' . $row, $post->updated_at);
        

        $row++; 
    }

    $writer = new Xlsx($spreadsheet);

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="posts.xlsx"');
    header('Cache-Control: max-age=0');

    return $writer->save('php://output');
}
    public function destroy(post $post)
    {
       $post->delete();
       
       return back();
    }
}