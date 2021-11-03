<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Event;
use App\Models\Contact;
use App\Models\Testimony;
use Illuminate\Http\Request;
// use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManagerStatic as Image;

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
            $extArray = ['png', 'jpg', 'jpeg'];
            if ($request->hasFile('image')) {
                $image_file = $request->file('image')->getRealPath();
                $file = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($file, PATHINFO_FILENAME);
                $ext = pathinfo($file, PATHINFO_EXTENSION);
                $name2store =  $filename . time() . '.' . $ext;
                if (in_array(strtolower($ext), $extArray)) {
                    $image = Image::make($image_file);
                    $image->resize(600,  null, function ($constraint) {
                        $constraint->aspectRatio();
                        });
                    if ($image->save(storage_path('app/public/img_mission/' . $name2store))) {
                        $addmission = new Post;
                        $addmission->title = $request->title;
                        $addmission->content = $request->content;
                        $addmission->image = $name2store;
                        if ($addmission->save()) {
                            return response()->json([
                                'code' => 200,
                                'msg' => 'Mission added successfully',
                            ]);
                        } else {
                            unlink(storage_path('app/public/img_mission/' . $name2store));
                            return response()->json([
                                'code' => 500,
                                'msg' => 'An error occured!',
                            ]);
                        }
                    }                
                }else{
                    return 'Invalid Images';
                }
            } else {
                return 'No Image Found';
            }
        }
           
    }
// fetching mission post at admin side
    public function fetch_post()
    {
        $post = Post::latest()->get();
        return json_encode($post);
    }

    // getting count of event
    public function event_count()
    {
        $event = Event::count();
        return json_encode($event);
    }

    // getting count of mission
    public function mission_count()
    {
        $mission = Post::count();
        return json_encode($mission);
    }

    // getting count of testimonies
    public function count_testimony()
    {
        $testimony = Testimony::count();
        return json_encode($testimony);
    }

// fetching mission post at the home page
    public function fetch_post_mission()
    {
        // $postmission = Post::latest()->take(3)->get();
        $postmission = Post::latest()->take(3)->get();
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

 
    // fetching event post at the admin side
    public function fetch_event()
    {
        $event = Event::latest()->get();
        return json_encode($event);
    }

    // fetching event post at the home page
    public function fetch_post_event()
    {
        $postevent = Event::latest()->take(3)->get();
        // $postevent = Post::all()->take(3);
        return json_encode($postevent);
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
             $extArray = ['png', 'jpg', 'jpeg'];
             if ($request->hasFile('image')) {
                 $image_file = $request->file('image')->getRealPath();
                 $file = $request->file('image')->getClientOriginalName();
                 $filename = pathinfo($file, PATHINFO_FILENAME);
                 $ext = pathinfo($file, PATHINFO_EXTENSION);
                 $name2store =  $filename . time() . '.' . $ext;
                 if (in_array(strtolower($ext), $extArray)) {
                     $image = Image::make($image_file);
                     $image->resize(600,  null, function ($constraint) {
                         $constraint->aspectRatio();
                         });
                     if ($image->save(storage_path('app/public/img_event/' . $name2store))) {
                         $addevent = new Event;
                         $addevent->title = $request->title;
                         $addevent->pdate = $request->pdate;
                         $addevent->content = $request->content;
                         $addevent->image = $name2store;
                         if ($addevent->save()) {
                             return response()->json([
                                 'code' => 200,
                                 'msg' => 'Event added successfully',
                             ]);
                         } else {
                             unlink(storage_path('app/public/img_event/' . $name2store));
                             return response()->json([
                                 'code' => 500,
                                 'msg' => 'An error occured!',
                             ]);
                         }
                     }                
                 }else{
                     return 'Invalid Images';
                 }
             } else {
                 return 'No Image Found';
             }
         }
             
     }
        // deleting event post from backend
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
        $extArray = ['png', 'jpg', 'jpeg'];
        if ($request->hasFile('image')) {
            $image_file = $request->file('image')->getRealPath();
            $file = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($file, PATHINFO_FILENAME);
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $name2store =  $filename . time() . '.' . $ext;
            if (in_array(strtolower($ext), $extArray)) {
                $image = Image::make($image_file);
                $image->resize(600,  null, function ($constraint) {
                    $constraint->aspectRatio();
                    });
                if ($image->save(storage_path('app/public/img_testimony/' . $name2store))) {
                    $testimony = new Testimony;
                    $testimony->fullname = $request->fullname;
                    $testimony->phone = $request->phone;
                    $testimony->email = $request->email;
                    $testimony->subject = $request->subject;
                    $testimony->content = $request->content;
                    $testimony->image = $name2store;
                    if ($testimony->save()) {
                        return response()->json([
                            'status' => 'success',
                            'msg' => 'Thank You For Sharing Your Testimony'
                        ]);
                    } else {
                        unlink(storage_path('app/public/img_testimony/' . $name2store));
                        return response()->json([
                            'status' => 'error',
                            'msg' => 'An error occured!'
                        ]);
                    }
                }                
            }else{
                return 'Invalid Images';
            }
        } else {
            return 'No Image Found';
        }

    }
    // getting id of the event post you want to view it's details
    public function showpost($id)
    {
        $showpost = Event::find($id);
        // rendering page to display the details
        return Inertia::render('Event_details',['eventpost'=>$showpost]);
        // return json_encode($showpost);
    }
    // fetching to admin dashboard
    public function fetch_testimony()
    {
        $testimony = Testimony::latest()->get();
        return json_encode($testimony);
    }
    // fetch to the main page
    public function fetch_testimony_once()
    {
        $testimonyonce = Testimony::latest()->get();
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


       // Posts Event
    //    public function store_event(Request $request)
    //    {
    //        if (Event::where('pdate', $request->pdate)->exists()) {
    //            return response()->json([
    //                'status' => 'success',
    //                'msg' => 'This Date already exists, please choose another date',
    //            ]);
    //        } else {
    //            $addevent = new Event;
    //            $addevent->title = $request->title;
    //            $addevent->pdate = $request->pdate;
    //            $addevent->content = $request->content;
    //            if ($addevent->save()) {
    //                return response()->json([
    //                    'code' => 200,
    //                    'msg' => 'Event added successfully',
    //                ]);
    //            } else {
    //                return response()->json([
    //                    'code' => 500,
    //                    'msg' => 'An error occured!',
    //                ]);
    //            }
    //        }
    //    }
   
    
}