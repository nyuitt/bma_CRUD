<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Member;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticação bem-sucedida
            return redirect()->intended('/dashboard');
        } else {
            // Autenticação falhou
            return redirect()->back()->withErrors(['message' => 'Credenciais inválidas']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        

        

        $member = new Member([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            // outros campos do membro
        ]);

        $user->profile()->save($member);

        Auth::login($user);
    
        return redirect('/dashboard');
        
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();
    
        // Verificar se a senha atual está correta
        if (!Hash::check($request->input('current_password'), $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Senha atual incorreta']);
        }
    
        // Verificar se uma nova senha foi fornecida
        if (!$request->has('new_password')) {
            return redirect()->back()->withErrors(['new_password' => 'Por favor, forneça uma nova senha']);
        }
    
        // Atualizar a senha do usuário com a nova senha fornecida
        $user->password = Hash::make($request->input('new_password'));
        $user->save();
    
        return redirect('/dashboard')->with('success', 'Senha atualizada com sucesso!');
    }

    public function update(Request $request, $id)
    {
        $member = Member::find($id);
        $input = $request->all();
    
        // Verificar se a senha atual está correta
        $credentials = [
            'email' => $member->user->email,
            'password' => $request->input('current_password'),
        ];
    
        if (!Auth::attempt($credentials)) {
            return redirect()->back()->withErrors(['current_password' => 'Senha atual incorreta']);
        }
    
        // Verificar se uma nova senha foi fornecida
        if ($request->filled('new_password')) {
            // Atualizar a senha apenas se uma nova senha foi fornecida
            $member->user->password = bcrypt($request->input('new_password'));
            $member->user->save();
        }
    
        // Atualizar os outros dados do membro
        $member->fill($input)->save();
    
        return redirect('/');
    }
    
    

    

    
}
