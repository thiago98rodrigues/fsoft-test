<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;


use function Laravel\Prompts\password;

class UserController extends Controller
{

    protected $userService;

    public function  __construct(UserService $userService){
        $this->userService = $userService;
    }

    public function index(){
        $users =  $this->userService->getAll();
        return view('users.index', ['users'=> $users]);
    }

    public function create(){
        return view('users.create');
    }

    public function store(UserRequest $request){
        $request->validated();
        return $this->userService->store($request->name, $request->email, $request->password);
    }

    public function show($id){
        $user = $this->userService->getById($id);
        return view('users.show', ['user'=> $user]);
    }

    public function edit($id){
        $user = $this->userService->getById($id);
        return view('users.edit', ['user'=> $user]);
    }

    public function update(UserRequest $request, $id){
        $request->validated();
        return $this->userService->update($request->name, $request->email, $request->password, $id);
    }

    public function destroy($id){
        return $this->userService->destroy($id);
    }
}