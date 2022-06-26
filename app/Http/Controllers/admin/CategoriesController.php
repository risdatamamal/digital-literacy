<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $data = [
            'categories' => Category::all()
        ];

        return view('pages.admin.categories.index', $data);
    }

    public function create()
    {
        return view('pages.admin.categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        Category::create($data);

        return redirect()->route('categories.index')->with('success', 'Data berhasil dibuat');
    }

    public function edit(Category $category)
    {
        return view('pages.admin.categories.edit',[
            'item' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->all();

        $item = Category::where("name", $request->name)->first();

        if ($item != null) 
        {
            $item = $item->name;
        } 
            else 
        {
            $item = '';
        }

        if($request->name == $item)
        {
            // $request->session()->flash('failed', 'Data berhasil di update kecuali ' . 'Name ' . $request->name . ' sudah digunakan!' );

            unset($data['name']);
        }

        $category->update($data);
        
        return redirect()->route('categories.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Data berhasil dihapus');

    }
}
