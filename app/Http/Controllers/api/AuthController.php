<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
use Hash;
use Update;
use Validator;
use Mail;
use Illuminate\Validation\Rule;
use App\Mail\RestPassword;


class AuthController extends Controller
{
    
//register
public function register(Request $request){


    $validator = Validator::make($request->all(), [


        'name' => 'required',
        'email' => 'required|unique:clients',
        'password' => 'required|confirmed',
        'phone' => 'required|unique:clients',
        'blood_type_id' => 'required',
        'last_date' => 'required',
        'birthday' => 'required',

    ]);
    if($validator->fails())
    {
        return responseJson(0 ,$validator->errors()->first(),$validator->errors());
    }
    $request->merge(['password' => bcrypt($request->password)]);
    $clients = Client::create($request->all());
    $clients->api_token = str_random(60);
    $clients->save();
    // $client->citues()->attach($request->government_id);
    // $client->bloodType()->attach($request->Bloo_type_id);
    
    return responseJson(1 , 'تم الدخول بنجاح' ,[
    'api_token' => $clients->api_token,
    'clients' => $clients 
    ]);


}
//login
public function login(Request $request){

    
    $validator = Validator::make($request->all(), [

        'password' => 'required',
        'phone' => 'required',
        

    ]);
    if($validator->fails())
    {
        return responseJson(0, $validator->errors()->first(),$validator->errors());
    }
    $clients = Client::where('phone' ,$request->phone)->first();
    if($clients){
        if(Hash::check($request->password, $clients->password))
        {
            return responseJson(1 ,'تم التسجيل بنجاح',[
                'api_token' => $clients->api_token,
                'clients' => $clients
            ]);
        }else{
            return responseJson(0,'البيانات المدخله غير صحيحه');

        }

    }else{
        return responseJson(0,'البيانات المدخله غير صحيحه');
    }
}
//profile
public function profile(Request $request){

    $validator = validator()->make($request->all() , [

        'password' => 'confirmed',
         'email' => Rule::unique('clients')->ignore($request->user()->id),
        'phone' => Rule::unique('clients')->ignore($request->user()->id)
    ]);
    if($validator->fails()){
        $data = $validator->errors();
        return responseJson( 0  , $validator->errors()->first() , $data);
    }
    $loginUser = $request->user();
    $loginUser->update($request->all());

    if($request->has('password')){
    $loginUser->password = bcrypt($request->password);
    }
    $loginUser->save();

    // if($requesthas('government_id')){

    //     $loginUser->governments()->detach($request->government_id);
    //     $loginUser->governments()->attach($request->government_id);
    // }
    // if($request->has('blood_type'))
    // {
    //     $bloodType = BloodType::where('name' , $request->blood_type)->first();
    //     $loginUser->bloodtypes()->detach($request->bloodType_id);
    //     $loginUser->bloodtypes()->attach($request->blooType_id);

    // }
    
    $data = [
        'user' => $request->user()->fresh()
    ];
    return responseJson(1,'تم تحديث البيانات',$data);
}



//  resetPassword
public function reset(Request $request){
    $validator = Validator::make($request->all(), [

        'phone' => 'required', 
    ]);

    if($validator->fails()){
    $data = $validator->errors();
    return responseJson(0 , $validator->errors()->first() , $data);
    
}
    $user = Client::where('phone' , $request->phone)->first();

    if($user){
        $code = rand(1111 , 9999);
        $update = $user->update(['pen_code' => $code]);

        if($update){

            //smsmisr
            // smsmisr($request->phone , 'your rest code is : '.$code);

            Mail::to($user->email)
            // ->cc($moreUsers)
            ->bcc("mahdyadel000@gmail.com")
            ->send(new RestPassword($user));

            return responseJson(1 , 'برجاء فحص هاتفك' ,
            [
                'pen_code_for_test' => $code,
               
            ]);
        }else{
            return responseJson(0 , 'حاول مره اخري');
        }
    }
        else{
            return responseJson(0 , 'حاول مره اخري');
           
    }

}
//new password
public function password(Request $request){

    $validator = validator::make($request->all() , [
    
        'pen_code' => 'required',
        'password' => 'required|confirmed'
    ]);

    if($validator->fails()){
        $data = $validator->errors();
        return responseJson(0 , $validator->errors()->first() , $data);
        
    }
     
    $user = Client::where('pen_code' , $request->pen_code)->where('pen_code' , '!=' , null)->first();

    if($user){

        $user->password = bcrypt($request->password);
        $user->pen_code = null; 

        if($user->save()){
            return responseJson(1 , 'تم تغيير كلمه المرور بنجاح');
        }else{
            return responseJson(0 , 'حدث خطا مه اخري');
        }
    }
        else{
            return responseJson(0 ,'هذا الكود غير صالح');
        
    }
}

}
