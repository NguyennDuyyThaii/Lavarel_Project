<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VOV;
use App\Http\Requests\SavePostRequest;
use Goutte\Client;
class VovController extends Controller
{
    public function index(Request $request){
        if($request->keyword){
            $vov = VOV::where(
                'title','like','%'.$request->keyword.'%'
            )->paginate(4);
        }else{
            $vov = VOV::paginate(4);
        }
        return view('vov.index', [
            'vov' => $vov,
            'keyword' => $request->keyword
        ]);
    }
    public function add(){
        return view('vov.add');
    }
    public function addVOV(Request $request){

        $client = new Client();
        $page = $client->request('GET', $request->link);

        $model = new VOV();
        $model->title = $page->filter('.article-title')->text();
        $model->summary = $page->filter('.article-summary')->text();
        $model->content = $page->filter('.article-content')->text();
        $model->date = $page->filter('.article-date')->text();
        $model->breadcrumb = $page->filter('.article-breadcrumb')->text();
        $model->author = $page->filter('.article-author')->text();

        $model->save();
        return back()->with('vov.added', "Thêm bài viết thành công!");
    }

    public function delete($id){
        $post = VOV::find($id);
        //unlink(public_path('images/post').'/'.$post->image);
        $post->delete();
        return back()->with('vov.deleted', "Xoá bài viết thành công!");
    }
}
