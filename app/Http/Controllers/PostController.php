<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Event;
use App\Models\Contact;
use App\Models\Category;
use App\Models\Testimony;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Posts Mission
    public function store_post(Request $request)
    {
        if (Post::where('title', $request->title)->exists()) {
            return response()->json([
                'status' => 'success',
                'msg' => 'This Post already exists',
            ]);
        } else {
            $add = new Post;
            // $add->img = $request->post['img'];
            $add->title = $request->title;
            $add->content = $request->content;
            if ($add->save()) {
                return response()->json([
                    'code' => 200,
                    'msg' => 'Mission added successfully',
                ]);
            } else {
                return response()->json([
                    'code' => 500,
                    'msg' => 'An error occured!',
                ]);
            }
        }
    }

    public function fetch_post()
    {
        $post = Post::latest()->get();
        return json_encode($post);
    }

    public function fetch_post_mission()
    {
        // $postmission = Post::latest()->take(3)->get();
        $postmission = Post::all()->take(3);
        return json_encode($postmission);
    }

    public function fetch_post_mission_count($id)
    {
        // $postmission1 = Post::count();
        // return json_encode($postmission1);
        $postmission1 = Post::where('id',$id)->count();
        return json_encode($postmission1);
        // return Participant::where('event_id',$id)->count();
    }

    public function delete_post(Request $request)
    {
        $delete = Post::find($request->id);
        if ($delete->delete()) {
            return response()->json([
                'code' => 200,
                'msg' => 'Mission deleted Successfully',
            ]);
        } else {
            return response()->json([
                'code' => 500,
                'msg' => 'Error occured!',
            ]);
        }
    }

    // Posts Event
    public function store_event(Request $request)
    {
        if (Event::where('pdate', $request->pdate)->exists()) {
            return response()->json([
                'status' => 'success',
                'msg' => 'This Date already exists, please choose another date',
            ]);
        } else {
            $addevent = new Event;
            $addevent->title = $request->title;
            $addevent->pdate = $request->pdate;
            $addevent->content = $request->content;
            if ($addevent->save()) {
                return response()->json([
                    'code' => 200,
                    'msg' => 'Event added successfully',
                ]);
            } else {
                return response()->json([
                    'code' => 500,
                    'msg' => 'An error occured!',
                ]);
            }
        }
    }

    public function fetch_event()
    {
        $event = Event::latest()->get();
        return json_encode($event);
    }

    public function fetch_post_event()
    {
        $postevent = Event::latest()
            ->take(3)
            ->get();
        // $postevent = Post::all()->take(3);
        return json_encode($postevent);
    }

    public function delete_event(Request $request)
    {
        $delete = Event::find($request->id);
        if ($delete->delete()) {
            return response()->json([
                'code' => 200,
                'msg' => 'Event deleted Successfully',
            ]);
        } else {
            return response()->json([
                'code' => 500,
                'msg' => 'Error occured!',
            ]);
        }
    }

    // TESTIMONY POSTS  
    public function store_testimony(Request $request)
    {
        $testimony = new Testimony;
        $testimony->fullname = $request->fullname;
        $testimony->phone = $request->phone;
        $testimony->email = $request->email;
        $testimony->subject = $request->subject;
        $testimony->content = $request->content;
        if ($testimony->save()) {
            return response()->json([
                'status' => 'success',
                'msg' => 'Thank You For Sharing Your Testimony'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'msg' => 'An error occured!'
            ]);
        }
    }

    public function fetch_testimony()
    {
        $testimony = Testimony::all();
        return json_encode($testimony);
    }

    public function fetch_testimony_once()
    {
        $testimonyonce = Testimony::latest()->take(1)->get();
        return json_encode($testimonyonce);
    }
    
    public function delete_testimony(Request $request)
    {
        $delete = Testimony::find($request->id);
        if ($delete->delete()) {
            return response()->json([
                'code' => 200,
                'msg' => 'Testimony deleted Successfully',
            ]);
        } else {
            return response()->json([
                'code' => 500,
                'msg' => 'Error occured!',
            ]);
        }
    }
    

    // CONTACTS
    // public function store_contact(Request $request)
    // {
    //     $contact = new Contact;
    //     $contact->fullname = $request->cont['fullname'];
    //     $contact->email = $request->cont['email'];
    //     $contact->subject = $request->cont['subject'];
    //     $contact->content = $request->cont['content'];
    //     if ($contact->save()) {
    //         return response()->json([
    //             'status' => 'success',
    //             'msg' => 'Message Sent Successfully'
    //         ]);
    //     } else {
    //         return response()->json([
    //             'status' => 'error',
    //             'msg' => 'An error occured!'
    //         ]);
    //     }
    // }

    // public function fetch_contact()
    // {
    //     $contact = Contact::all();
    //     return json_encode($contact);
    // }
}
