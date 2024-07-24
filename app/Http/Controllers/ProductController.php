<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $view;
    public function __construct()
    {
        $this->view = [];
    }

    public function index()
    {
        //
        // Khởi tạo model
        $objPro = new Product();
        $this->view['listPro'] = $objPro->loadDataWithPager();
        // Truy vân + logic
        //        $objCate = new Category();
        //        $listCate = $objCate->loadAllCate();
        //        $arrayCate = [];
        //        foreach ($listCate as $value){
        //            $arrayCate[$value->id] = $value->name;
        //        }
        //        $this->view['listCate'] =  $arrayCate;
        ///
        //        dd( $this->view['listCate']);
        return view('product.index', $this->view);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $objCate = new Category();
        $this->view['listCate'] = $objCate->loadAllCate();
        return view('product.create', $this->view);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'price' => ['required', 'integer', 'min:1'],
                'quantity' => ['required', 'integer', 'min:1'],
                'image' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
                'category_id' => ['required', 'exists:categories,id']
            ],
            [
                'name.required' => 'Tên sản phẩm không được để trống',
                'name.string' => 'Tên sản phẩm phải là chuỗi',
                'name.max' => 'Tên sản phẩm không được vượt quá 255 ký tự',
                'price.required' => 'Giá sản phẩm không được để trống',
                'price.integer' => 'Giá sản phẩm phải là số',
                'price.min' => 'Giá sản phẩm không được nhỏ hơn 1',
                'quantity.required' => 'Số lượng sản phẩm không được để trống',
                'quantity.integer' => 'Số lượng sản phẩm phải là số',
                'quantity.min' => 'Số lượng sản phẩm không được nhỏ hơn 1',
                'image.required' => 'Ảnh sản phẩm không được để trống',
                'image.image' => 'Ảnh sản phẩm phải là ảnh',
                'image.mimes' => 'Ảnh sản phẩm phải có định dạng jpeg,png,jpg,gif,svg',
                'image.max' => 'Ảnh sản phẩm không được vượt quá 2048 ký tự',
                'category_id.required' => 'Danh mục sản phẩm không được để trống',
                'category_id.exits' => 'Danh mục sản phẩm không tồn tại',
            ]
        );
        //        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
    }
}
