<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\post;
use Validator;
use Auth;
use Session;
class AppController extends Controller
{
    public function welcome()
    {
  
    	$posts = Post::paginate(3);
    	return view('welcome', compact('posts'));
    }


    public function admin()
    {
    	return view('adminLogin'); 
    }



    public function checkLogin(Request $request)
    {
    	$validation = $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->intended(route('home'));
        }
        Session::flash('message', 'Invalid Login!');
        return back()->withInput($request->only('username'));
    }


    public function home()
    {
    	if (Auth::check()) {
    		$posts = Post::paginate(5);
    		return view('home', compact('posts')); 
    	}
    }

    public function addPostPage()
    {
    	if (Auth::check()) {
    		return view('addPostPage'); 
    	}
    }


    public function addPost(Request $request)
    {
    	if (Auth::check()) {
    		$validation = Validator::make($request->all(), [
	            'title' => 'required|unique:posts|min:5',
	            'description' => 'required|min:20',
	        
	        ]);

	        if ($validation->fails())
	        {
	            return redirect('addPostPage')->withInput($request->all())->withErrors($validation);
	        }
	        else
	        {
	           
	            $data = array(
	                'title' =>  $request->title,
	                'description' => $request->description
	            );
	            Post::create($data);
	            Session::flash('message', 'Successfully saved!');
	            return redirect('home');
	        }
    	}
    }


    public function editPostPage($id)
    {
    	if (Auth::check()) {
    		$post = Post::where('id', $id)->get();
    		return view('editPostPage', compact('post')); 
    	}
    }


    public function editPost(Request $request)
    {
    	$validation = Validator::make($request->all(), [
            'title' => 'required|min:5',
            'description' => 'required|min:20',
        ]);

        if ($validation->fails())
        {
            return redirect('editPostPage/' . $request->id)->withInput($request->all())->withErrors($validation);
        }
        else
        {
           
            $data = array(
                'title' =>  $request->title,
                'description' => $request->description
            );
            Post::where('id', $request->id)->update($data);
            Session::flash('message', 'Successfully saved!');
            return redirect('home');
        }
    }


    public function deletePost($id)
    {
    	if (Auth::check()) {
    		$post = Post::where('id', $id)->delete();
			Session::flash('message', 'Successfully deleted!');
            return redirect('home');
    	}
    }

}
