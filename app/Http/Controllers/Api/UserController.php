<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Commentaire;
use App\Models\Like;
use App\Http\Controllers\Resources\UserResource as UserResource;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /* return User:: all();*/
        $users=User::paginate(10);
              
        /* return User:: all();*/
        return UserResource::collection($users);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                //  Allow for user update *or* create a new user
                $user = new User;
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = $request->password;
                $user->save();
                
                if ($user->save()) {
                    return new UserResource($user);
                }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
                // Get a single post
                $user = User::findOrFail($id);
        
                // Return a single post as a resource
                return new UserResource($user);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $user = User::find($id);
            $user->name = $request->name ? $request->name : $user->name;
            /*
            if ($request->name) {
                $user->name = $request->name;
            } else {
                $user->name = $user->name;
            }
            */
            $user->email = $request->email ? $request->email : $user->email;
            $user->password = $request->password ? $request->password : $user->password;
            $user->save();
            return response()->json([
                'status_code' => 200,
                'message' => "L'utilisateur a été modifié",
                'data' => $user
            ]);
            // $user->update($request->all());
        }
        catch(Exception $e) {
            return response()->json([
                'status_code' => 400,
                'message' => "Il y a eu une erreur lors de la modification de l'utilisateur"
            ]);
        }
    }
}