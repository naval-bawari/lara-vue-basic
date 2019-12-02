<?php

namespace App\Http\Controllers\api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\User as UserResource;

class UserController extends Controller
{
    public function list(){

        try{
        	return UserResource::collection(User::all());
        	//return new UserResource(User::all());
            //return User::limit(5)->get();
        }catch(Exception $e){
            throw new \App\Exceptions\CustomException('Something Went Wrong.');
        }
        
    }
}
