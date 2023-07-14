<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Member; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\RedirectResponse;//add Member Models

class MemberController extends Controller
{
    public function index(){
        return view('show');
    }
 
    public function getMembers(){
        $members = Member::all();
 
        return view('show')->with('members', $members);
    }
 
    public function save(Request $request){
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:8',
            'email' => 'required|email',
            // outras regras de validação aqui
        ]);
    
        if ($validator->fails()) {
            //dd($validator->errors());
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }
        $user = new User();
        $user->name = $request->input('firstname');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();
    
        $member = new Member();
        $member->first_name = $request->input('firstname');
        $member->last_name = $request->input('lastname');
        $member->email = $request->input('email');
        $member->user_id = $user->id;
        $member->save();
    
        return redirect('/');
    }
 
    public function updatePassword(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'current_password' => 'required',
        'new_password' => 'required|min:8',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $member = Member::find($id);
    if (!$member) {
        return redirect()->back()->withErrors(['message' => 'Membro não encontrado']);
    }

    $user = $member->user;

    $credentials = [
        'email' => $user->email,
        'password' => $request->input('current_password'),
    ];

    if (!Auth::attempt($credentials)) {
        return redirect()->back()->withErrors(['current_password' => 'Senha atual incorreta']);
    }

    $user->password = Hash::make($request->input('new_password'));
    $user->save();

    return redirect('/')->with('success', 'Senha atualizada com sucesso!');
}

    public function update(Request $request, $id)
    {
        $member = Member::find($id);
        $input = $request->all();

        // Verificar se o membro existe
        if (!$member) {
            return redirect()->back()->withErrors(['message' => 'Membro não encontrado']);
        }

        // Verificar se a senha atual está correta
        $credentials = [
            'email' => $member->user->email,
            'password' => $request->input('current_password'),
        ];

        if (!Auth::attempt($credentials)) {
            return redirect()->back()->withErrors(['current_password' => 'Senha atual incorreta'])->withInput();


        }

        // Verificar se uma nova senha foi fornecida
        if ($request->filled('new_password')) {
            // Atualizar a senha apenas se uma nova senha foi fornecida
            $member->user->password = bcrypt($request->input('new_password'));
            $member->user->save();
        }

        // Atualizar os outros dados do membro
        $member->fill($input)->save();

        return redirect()->back()->with('success', 'Dados do membro atualizados com sucesso!');
    }



    
 
    public function delete(Request $request, $id)
    {
        $member = Member::find($id);
        
        if (!$member) {
            return redirect()->back()->withErrors(['message' => 'Membro não encontrado']);
        }

        $credentials = [
            'email' => $member->user->email,
            'password' => $request->input('password'),
        ];

        if (!Auth::attempt($credentials)) {
            return redirect()->back()->withErrors(['password' => 'Senha incorreta'])->withInput(['delete_id' => $id]);
        }

        $member->delete();

        return redirect('/');
    }





    



}