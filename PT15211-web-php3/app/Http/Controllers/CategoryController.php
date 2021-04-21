<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Danhmuc;
use App\Http\Requests\SaveCategoryRequest;

class CategoryController extends Controller
{
    // public function index(Request $request){
    //     if($request->keyword){

    //         $cates = Category::where(
    //                 'name', 'like', "%".$request->keyword."%"
    //             )->paginate(10);
    //         $cates->withPath('?keyword=' . $request->keyword);
    //     }else{
    //         $cates = Category::paginate(10);
    //     }

    //     $cates->load('products');

    //     return view('cate.index', [
    //         'cates' => $cates,
    //         'keyword' => $request->keyword
    //     ]);
    // }

    // public function remove($id){
    //     Category::destroy($id);
    //     return redirect(route('cate.index'));
    // }

    // public function addForm(){
    //     return view('cate.add-form');
    // }

    // public function editForm($id){
    //     $model = Category::find($id);
    //     if(!$model) return redirect(route('cate.index'));

    //     return view('cate.edit-form', ['model' => $model]);
    // }

    // public function saveEdit($id, SaveCategoryRequest $request)
    // {
    //     $model = Category::find($id);
    //     $model->name = $request->name;
    //     $model->detail = $request->detail;
    //     $model->save();
    //     return redirect(route('cate.index'));
    // }

    // public function saveAdd(SaveCategoryRequest $request)
    // {
    //     $model = new Category();
    //     $model->name = $request->name;
    //     $model->detail = $request->detail;
    //     $model->save();

    //     return redirect(route('cate.index'));
    // }




    public function categoryList(Request $request)
    {
        if ($request->keyword) {

            $cates = Danhmuc::where(
                'name',
                'like',
                "%" . $request->keyword . "%"
            )->paginate(5);
            $cates->withPath('?keyword=' . $request->keyword);
        } else {
            $cates = Danhmuc::paginate(5);
        }

        $cates->load('posts');

        return view('category.index', [
            'cates' => $cates,
            'keyword' => $request->keyword
        ]);
    }
    public function categoryAdd()
    {
        return view('category.add');
    }
    public function categoryPostAdd(SaveCategoryRequest $request)
    {
        $name = $request->name;
        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images/category'), $imageName);

        $category = new Danhmuc();
        $category->name = $name;
        $category->image = $imageName;
        $category->save();
        return back()->with('category.added', "Thêm danh mục thành công!");
    }
    public function categoryDelete($id)
    {
        $cate = Danhmuc::find($id);
        //unlink(public_path('images/category') . '/' . $cate->image);
        $cate->delete();
        return back()->with('category.deleted', "Xoá bài viết thành công!");
    }
    public function categoryEdit($id)
    {
        $model = Danhmuc::find($id);
        if (!$model) return redirect(route('category.index'));
        return view('category.edit', compact('model'));
    }
    public function categoryPostEdit(SaveCategoryRequest $request)
    {
        $name = $request->name;
        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images/category'), $imageName);

        $category = Danhmuc::find($request->id);
        $category->name = $name;
        $category->image = $imageName;
        $category->save();
        return back()->with('category.updated', "Sửa danh mục thành công!");
    }
}
