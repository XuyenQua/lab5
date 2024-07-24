<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $view;

    public function __construct(){
        $this->view = [];
    }
    public function index()
    {   
        $ObjCategory = new Category();
        $this->view['listCate'] = $ObjCategory->loadDataWithPager();
        // dd($this->view);
        return view("category.index", $this->view);
    }
    public function create()
    {
        return view("category.create");
    }

    public function store(Request $request)
    {
        $validate = $request->validate(
            [
                "name"=> ['required', 'string', 'max:255'],
            ],
            [
                'name.required' => 'Tên danh mục không được để trống',
                'name.string' => 'Tên danh mục phải là chuỗi',
                'name.max' => 'Tên danh mục không được vượt quá 255 ký tự',
            ],
        );
    }


}
