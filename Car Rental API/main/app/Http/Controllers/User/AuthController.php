<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\GeneralTraits;
use Exception;
use Illuminate\Support\Facades\Auth;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request){
        try{
        //validation
        $rules =[
            'email' => 'required',
            'password' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            $code = GeneralTraits::returnCodeAccordingToInput($validator);
            return GeneralTraits::returnValidationError($code, $validator);
        }
        //login
        $credentials = $request->only(['email', 'password']);
        $token = Auth::guard('user')->attempt($credentials);

        if(!$token){
            return GeneralTraits::returnError('E001', 'The data are not correct');
        }

        $user = Auth::guard('user')->user();
        User::where('id', $user->id)->update(['token' => $token]);
        $updated_user = User::find($user->id);
        return GeneralTraits::returnData('user', $updated_user, 'Success');

        }catch(Exception $e){
            return GeneralTraits::returnError($e->getCode(), $e->getMessage());
        }
    }

    public function logout(Request $request){
        $token = $request->header('auth-token');
        if($token){
            try{
                JWTAuth::setToken($token)->invalidate();
            }catch(Exception $e){
                return GeneralTraits::returnError('E001', 'Something went wrong');
            }
            User::where('token', $token)->update(['token' => '']);
            return GeneralTraits::returnSuccessMessage('Logout successfully');
        }
        else{
            return GeneralTraits::returnError('E001', 'Something went wrong');
        }
    }
}
