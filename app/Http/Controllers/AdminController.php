<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use App\Models\Menu;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\Instagram;
use App\Models\Comment;
use App\Models\Buyurtma;

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin.index');
    }
    public function index_instagram()
    {
        return view('admin.instagram');
    }
    public function index_single()
    {
        $comments = Comment::all();
        return view('frontend.single-blog', ['comments' => $comments, '']);
    }
    public function index_elements()
    {
        return view('frontend.elements');
    }
    public function index_gallery()
    {
        return view('admin.gallery');
    }
    public function index_contact()
    {
        return view('frontend.contact');
    }
    public function index_menu()
    {
        return view('admin.menu');
    }
    public function index_buyurtma($id)
    {
        $menus = Menu::all();
        $instagram = Instagram::all();
        $pro = array();
        foreach($menus as $menu ){
            if($menu->id == $id){
                $pro = $menu;
            }
        }

        $buyurtma = new Buyurtma();
        $buyurtma->miqdori = '1';
        $buyurtma->nomi = $pro->name;
        $buyurtma->narxi = $pro->cost;

        $buyurtma->save();

        return view('frontend.home',[ 'menus' => $menus, 'instagrams' => $instagram ]);
    }
    public function index_menu_admin()
    {
        return view('admin.menu');
    }
    public function index_blog()
    {
        return view('admin.blog');
    }
    public function store(Request $request)
    {
        $menu = new Menu();

        $menu->name = $request -> input('name');
        $menu->type = $request -> input('type');
        $menu->text = $request -> input('text');
        $menu->cost = $request -> input('cost');
        $menu->image = $request -> input('image');

        if (request()->hasFile('image')){
            $file = $request->file('image');
            $extension = $file -> getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('uploads/menu', $fileName);
            $menu->image = $fileName;

        }else{
            return $request;
            $menu->image = '';
        }

        $menu -> save();

        return view('admin.menu');
    }
    public function store_instagram(Request $request)
    {
        $instagram = new Instagram();

        $instagram->image = $request -> input('image');

        if (request()->hasFile('image')){
            $file = $request->file('image');
            $extension = $file -> getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('uploads/instagram', $fileName);
            $instagram->image = $fileName;
        }else{
            return $request;
            $instagram->image = '';
        }

        $instagram -> save();
        return view('admin.instagram');
    }
    public function store_gallery(Request $request)
    {
        $gallery = new Gallery();

        $gallery->image = $request -> input('image');

        if (request()->hasFile('image')){
            $file = $request->file('image');
            $extension = $file -> getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('uploads/gallery', $fileName);
            $gallery->image = $fileName;
        }else{
            return $request;
            $gallery->image = '';
        }

        $gallery -> save();
        return view('admin.gallery');
    }
    public function store_blog(Request $request)
    {
        $blog = new Blog();

        $blog->title = $request -> input('title');
        $blog->category = $request -> input('category');
        $blog->text = $request -> input('text');
        $blog->author = $request -> input('author');
        $blog->image = $request -> input('image');

        if (request()->hasFile('image')){
            $file = $request->file('image');
            $extension = $file -> getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('uploads/blog', $fileName);
            $blog->image = $fileName;
        }else{
            return $request;
            $blog->image = '';
        }
            $blog -> save();
            return view('admin.blog');
    }
    public function show_menu()
    {
        $menu = Menu::paginate(10);
        return view('frontend.Menu', ['menus' => $menu]);
    }
    public function show_about()
    {
        $gallery = Gallery::all();
        $instagram = Instagram::all();
        return view('frontend.about', ['gallerys' => $gallery, 'instagrams' => $instagram]);
    }
    public function show_home()
    {
        $menu = Menu::all();
        $instagram = Instagram::all();
        return view('frontend.home', ['menus' => $menu, 'instagrams' => $instagram]);
    }
    public function show_blog()
    {
        $blog = Blog::all();
        return view('frontend.blog', ['blogs' => $blog]);
    }
    public function show_buyurtma()
    {
        $buyurtma = Buyurtma::all();
        return view('admin.buyurtma' , ['buyurtmas' => $buyurtma]);
    }
    public function sendEmail(Request $request)
    {   
        Mail::send('emails.contactmessage',[
            'msg' => $request->message,
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject
        ], function($mail) use($request){
            $mail->from(env('MAIL_FROM_ADDRESS'),$request->name);
            $mail->to("developer7277@gmail.com")->subject('Contact Us Message');
        });
        return view('frontend.contact');
    }
    public function comment(Request $request)
    {
    
        $comments = Comment::all();
        $comment = new Comment();

        $comment->comment = $request->input('comment');
        $comment->name = $request->input('name');
        $comment->email = $request->input('email');
        $comment->website = $request->input('website');

        $comment->save();
        return view('frontend.single-blog', ['comments' => $comments]);
    }
}