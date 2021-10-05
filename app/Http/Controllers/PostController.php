<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store_category(Request $request)
    {
        if (Category::where('category', $request->cat)->exists()) {
            return response()->json([
                'status' => 'error',
                'msg' => 'Category already exists'
            ]);
        } else {
            $category = new Category;
            $category->category = $request->cat;
            if ($category->save()) {
                return response()->json([
                    'status' => 'success',
                    'msg' => 'Category added successfully'
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'msg' => 'An error occured!'
                ]);
            }
        }
                
    }

    public function fetch_category()
    {
        $category = Category::all();
        return json_encode($category);
    }

    public function delete_category(Request $request)
    {
        $delete = Category::find($request->cat);
        if ($delete->delete()) {
            return response()->json([
                'code' => 200,
                'msg' => 'Category Deleted'
            ]);
        } else {
            return response()->json([
                'code' => 500,
                'msg' => 'An error occured!'
            ]);
        }
    }

    // Posts

    public function store_post(Request $request)
    {
        $add = new Post;
        $add->category_id = $request->post['category_id'];
        // $add->img = $request->post['img'];
        $add->title = $request->post['title'];
        $add->pdate = $request->post['pdate'];
        $add->content = $request->post['content'];
        if ($add->save()) {
            return response()->json([
                'code' => 200,
                'msg' => 'Post added successfully'
            ]);
        }else{
            return response()->json([
                'code' => 500,
                'msg' => 'An error occured!'
            ]);
        }
    }

    public function fetch_post()
    {
        $post = Post::latest()->get();
        return json_encode($post);
    }

    // public function fetch_post_mission()
    // {
    //     $category = Category::where('category', 'Mission')->first();
    //     $postmission = Post::all()->where('category_id', $category->id)->take(10);
    //     return json_encode($postmission);
    // }

    public function fetch_post_event()
    {
        $category = Category::where('category', 'Events')->first();
        $post = Post::latest()->where('category_id', $category->id)->take(10)->get();
        return json_encode($post);
    }

    public function delete_post(Request $request)
    {
        $delete = Post::find($request->id);
        if ($delete->delete()) {
            return response()->json([
                'code' => 200,
                'msg' => 'Post deleted Successfully'
            ]);
        }else {
            return response()->json([
                'code' => 500,
                'msg' => 'Error occured!'
            ]);
        }
    }

    public function store_contact(Request $request)
    {
        $contact = new Contact;
        $contact->fullname = $request->contat['fullname'];
        $contact->email = $request->contat['email'];
        $contact->content = $request->contat['content'];
        if ($contact->save()) {
            return response()->json([
                'status' => 'success',
                'msg' => 'Message Sent Successfully'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'msg' => 'An error occured!'
            ]);
        }
    }
                
    
    public function fetch_contact()
    {
        $contact = Contact::all();
        return json_encode($contact);
    }

}
