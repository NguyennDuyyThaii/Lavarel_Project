<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Danhmuc;
use App\Models\Views;
use Illuminate\Http\Request;
use App\Http\Requests\SavePostRequest;

class PostController extends Controller
{
    public function postList(Request $request){
        if($request->keyword){
            $posts = Post::where(
                'title','like','%'.$request->keyword.'%'
            )->paginate(4);
        }else{
            $posts = Post::paginate(4);
        }
        $posts->load('danhmuc');
        return view('post.index', [
            'posts' => $posts,
            'keyword' => $request->keyword
        ]);
    }
    public function postAdd(){
        $cates = Danhmuc::all();
        return view('post.add', compact('cates'));
    }
    public function postPostAdd(SavePostRequest $request){

        

            $title = $request->title;
            $author = $request->author;
            $content = $request->content;
            $short_desc = $request->short_desc;
            $danh_muc_id = $request->danh_muc_id;

            $post = new Post();
            $post->title = $title;
            $post->author = $author;
            $post->content = $content;
            $post->short_desc = $short_desc;
            $post->danh_muc_id = $danh_muc_id;
            if($request->hasFile('image')){
                $image = $request->file('image');
                $imageName = time().'.'.$image->extension();
                $image->move(public_path('images/post'),$imageName);
                $post->image = $imageName;
            }
            $post->save();

            // $views = new Views();
            // $views->bai_viet_id = $post->id;
            // $views->views = 0;
            // $views->save();

            return back()->with('post.added', "Thêm bài viết thành công!");
           
    }
    public function postDelete($id){
        $post = Post::find($id);
        //unlink(public_path('images/post').'/'.$post->image);
        $post->delete();
        return back()->with('post.deleted', "Xoá bài viết thành công!");
    }
    public function postEdit($id){
        $model = Post::find($id);
        $cates = Danhmuc::all();
        if(!$model) return redirect(route('post.index'));
        return view('post.edit', compact('model','cates'));
    }
    public function postPostEdit(SavePostRequest $request){
        

        $title = $request->title;
        $author = $request->author;
        $content = $request->content;
        $short_desc = $request->short_desc;
        $danh_muc_id = $request->danh_muc_id;

        $post = Post::find($request->id);
        $post->title = $title;
        $post->author = $author;
        $post->content = $content;
        $post->short_desc = $short_desc;
        $post->danh_muc_id = $danh_muc_id;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images/post'),$imageName);
            $post->image = $imageName;
        }else{
            $post->image = $request->logo;
        }
        
        $post->save();
        return back()->with('post.updated', "Sửa bài viết thành công!");

    }
}
