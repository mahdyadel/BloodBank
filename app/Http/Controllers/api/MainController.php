<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Government;
use App\City;
use App\Post;
use App\Order;
use App\Notification;
use App\Setting;
use App\Blood_type;
use App\Category;
use App\Favourites;
use App\Contact;
use Validator;
use RequestLog;



class MainController extends Controller
{
    //government
public function governments(){

    $governments = Government::all();
     
    return responseJson(1 , 'successs' , $governments);

}
//cities
public function cities(Request $request){

    $cities = City::where(function ($query) use($request){

        if($request->has('government_id'))
        {
            $query->where('government_id' , $request->government_id);

        }
    })->get();
     
    return responseJson(1 , 'successs' , $cities);

}
//posts
public function posts(Request $request){

    $posts = Post::where(function ($query) use($request){

        if($request->has('category_id'))
        {
            $query->where('category_id' , $request->category_id);

        }
    })->get();
     
    return responseJson(1 , 'successs' , $posts);

}
//orders
public function orders(Request $request){

    $orders  = Order::where(function($query) use($request){

        if($request->has('client_id')){
            $query->where('client_id' , $request->client_id);
        }
    })->get();
    return responseJson(1 , 'hih' , $orders);

}
//notifications
public function notifications(Request $request){

    $notifications = Notification::where(function ($query) use($request){

        if($request->has('order_id')){

            $query->where('order_id', $request->order_id);
        }
    })->get();

    return responseJson(1 , 'hi' ,$notifications);
}
//settins
public function settings(){

    $settings = Setting::all();

    return responseJson(1 , ' hi mahdy' ,$settings);
}
//blood/types
public function bloodTypse(){

    $blood_types = Blood_type:: all();
    return responseJson( 1 ,'hih mahdy' , $blood_types);
}
//categories
public function categories(){

    $categories = Category:: all();
    return responseJson(1 , 'hi mahdy' , $categories);

}

//contacts
public function contacts(Request $request){

    $contacts = Contact::where(function($query) use($request){

        if($request->has('client_id')){
            $query->where('client_id' , $request->client_id);
        }
    })->get();
    return responseJson(1 , 'hi mahdy' , $contacts);
}
//DonatinRequestCreate
public function DonatinRequestCreate(Request $request){
    $validator = Validator::make($request->all(),[

        'name' => 'required',
        'age' => 'required',
        'blood_type' => 'required',
        'many_bages' => 'required',
        'hospital_name' => 'required',
        'hospital_addres' => 'required',  
        'city_id' => 'required',  
        'client_id' => 'required',
        'phone' => 'required|unique:orders',
        'notes' => 'required',
    ]);
    if($validator->fails())
    {
        return responseJson(0 , $validator->errors()->first() , $validator->errors());
    }else{
        $donationRequest = Order::create($request->all());
        return responseJson(1 , 'تم الطلب بنجاح' ,$donationRequest);
    }
}
//DonatinRequest
public function donationRequest(Request $request){
    $donationRequest = Order::all();
    return responseJson(1 , 'hi mahdy' , $donationRequest);
}
 //favouritePost'
 public function favouritePost(Request $request){

    // RequestLog::create(['content' => $request->all(),'service' => 'post toggle favourite']);
    $rules = [
        'post_id' => 'required|exists:posts,id',
    ];
    $validator = validator()->make($request->all(),$rules);
    if ($validator->fails())
    {
        return responseJson(0,$validator->errors()->first(),$validator->errors());
    }
    return $request->user();
    $toggle = $request->user()->favourites()->toggle($request->post_id);// attach() detach() sync() toggle()
    // [1,2,4] - sync(2,5,7) -> [1,2,4,5,7]
    // detach()
    // attach([2,5,7])
    return responseJson(1,'Success',$toggle);
}

 //myFavourite
 public function myFavourite(Request $request){

    $posts = $request->user()->favourites()->latest()->paginate(20);//oldest()
    return responseJson(1 , 'Load.......' , $posts);
 }
}

