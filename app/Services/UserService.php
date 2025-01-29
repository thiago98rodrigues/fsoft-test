<?php

namespace App\Services;

use App\Models\User;
use App\Services\AbstractClasses\AbstractService;
use Illuminate\Support\Facades\Hash;

class UserService extends AbstractService
{
    protected $model = User::class;

    public function store($name, $email, $password){
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);
        return redirect()->route('dashboard')->with('success', 'Usáurios cadastrado com sucesso!');
    }

    public function update($name, $email, $password, $id){
        $user = $this->getById($id);
        $user->update([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);
        return redirect()->route('dashboard', ['user' => $user->id])->with('success', 'Usaurios editado com sucesso!');
    }

    public function destroy($id){
        $user = $this->getById($id);
        $user->delete();
        return redirect()->route('dashboard')->with('success', 'Usaurios apagado com sucesso!');
    }
}