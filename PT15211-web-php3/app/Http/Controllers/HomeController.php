<?php

namespace App\Http\Controllers;

use App\Models\Danhmuc;
use App\Models\Post;
use App\Models\Views;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->keyword) {
            $posts = Post::where(
                'title',
                'like',
                '%' . $request->keyword . '%'
            )->paginate(100);
        } else {
            $posts = Post::paginate(100);
        }
        $posts->load('luotxem'); 
        $cates = Danhmuc::all();
        return view('home.index', [
            'cates' => $cates,
            'posts' => $posts,
            'keyword' => $request->keyword
        ]);
    }
    public function categoryPost(Request $request, $id)
    {
        if ($request->keyword) {
            $posts = Post::where(
                'title',
                'like',
                '%' . $request->keyword . '%'
            )->where('danh_muc_id', $id)->get();
        } else {
            $posts = Post::where('danh_muc_id', $id)->get();
        }
        $posts->load('luotxem');
        $cates = Danhmuc::all();
        return view('home.categoryPost', [
            'cates' => $cates,
            'posts' => $posts,
            'keyword' => $request->keyword
        ]);
    }
    public function detailPost(Request $request, $id)
    {
        $today = Carbon::now();
        if ($request->keyword) {
            $posts = Post::where(
                'title',
                'like',
                '%' . $request->keyword . '%'
            )->paginate(100);
            return redirect(route('homepage'));
        } else {
            $posts = Post::find($id);
            if (!$posts) return redirect(route('homepage'));
        }
        $posts->load('luotxem');
        // $view = new Views();
        // $view->bai_viet_id = $id;
        // $view->views = '1';
        // $view->save();
        $idPost = Views::where('bai_viet_id', $id)->sum("views");
        // $idPost->views += 1;
        // $idPost->save();
        $cates = Danhmuc::all();

        $postRelative = Post::where('danh_muc_id','like','%'. $posts->danh_muc_id .'%')
                            ->where('id','!=',$id )
                            ->get();
        return view('home.detail', [
            'cates' => $cates,
            'posts' => $posts,
            'keyword' => $request->keyword,
            'idPost' => $idPost,
            'postRelative'=> $postRelative
        ]);
    }
    public function increaseView(Request $request)
    {
            // tao 1 ban ghi
            $view = new Views();
            $view->bai_viet_id = $request->id;
            $view->views = '1';
            $view->save();
            // 
            $productView = Views::where('bai_viet_id', $request->id)->sum("views");
            // $productView = $productView + 1;
            // $productView->save();
            //$productView->save();
        return response()->json($productView);
        // if(count($lx) >0){
        //     $lx[0]->views = $lx[0]->views + 1;
        //     $lx[0]->save();
        // }else{
        //     $view = new Views();
        //     $view->bai_viet_id = $request->id;
        //     $view->created_at =$request->toDateString();
        //     $view->views = '1';
        //     $view->save();
        // }
    }
    public function topPostView()
    {
        $cates = Danhmuc::all();
        $today = Carbon::now();
        $lastDay = Carbon::now()->subDays(2);
    
        
        // $postsOfViews = Views::where('created_at', '>=', $lastDay)
        //                 ->where('created_at', '<=', $today)
        //                 ->groupBy('bai_viet_id')
        //                 ->get();
        $postsOfViews = DB::table('luotxem')
                        ->join('baiviet', 'luotxem.bai_viet_id', '=', 'baiviet.id')
                        ->select('bai_viet_id', 'title','image','author', 'baiviet.created_at','danh_muc_id',DB::raw('SUM(views) as luot_xem'))
                        ->where('luotxem.created_at', '>=', $lastDay)
                        ->where('luotxem.created_at', '<=', $today)
                        ->groupBy('bai_viet_id','title','image','author','baiviet.created_at','danh_muc_id')
                        ->orderByDesc('luot_xem')
                        ->get();

        // $post = Post::all();
        // $post->load('luotxem');
        // $t = $post->luotxem->where('created_at', '>=', $lastDay)
        // ->where('created_at', '<=', $today)
        // ->orderBy('views', 'desc')
        // ->get();
        // dd($t);
        return view('home.top', [
            "postsOfViews" => $postsOfViews,
            "cates" => $cates
        ]);
    }
}
