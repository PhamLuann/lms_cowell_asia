<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LessonRequest;
use App\Mail\SendEmail;
use App\Models\Student;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    //


    public function index()
    {
        $users = DB::table('users')->select([
            'users.id',
            'first_name',
            'last_name',
            'email',
            'roles.name',
        ])
            ->join('role_users AS ru', 'users.id', '=', 'ru.user_id')
            ->leftJoin('roles', 'roles.id', '=', 'ru.role_id')
            ->paginate(12);
        return view('admin.user.all-user', compact('users'));
    }

    public function adduser()
    {
        return view('admin.user.add-user');
    }

    public function store(Request $request)
    {
        $user = $request->all();
        $u = Sentinel::registerAndActivate($user);
        DB::table('role_users')->insert([
            'user_id' => $u->id,
            'role_id' => $request->get('role'),
        ]);
        if ($request->get('role') == '3') {
            DB::table('students')->insert([
                'user_id' => $u->id,
            ]);

            $to_email = $u->email;

            Mail::to($to_email)->send(new SendEmail);
        }
        return redirect(route('user.all'));
    }

    public function edit(Request $request, $id)
    {
        $user = DB::table('users')->where('id', $id)->update([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
        ]);
        $role = DB::table('role_users')->where('user_id', $id)->update([
            'role_id' => $request->get('role')
        ]);
        if ($user || $role) {
            return redirect(route('user.all'));
        }
    }
    public function editForm(Request $request, $id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        $role = DB::table('role_users')
            ->select([
                'role_id',
                'name',
            ])
            ->join('roles', 'id', '=', 'role_users.role_id')
            ->where('user_id', $id)
            ->get();

        $orther_roles = DB::table('roles')->where('id', '<>', $role->first()->role_id)->get();
        if ($user) {
            return view('admin.user.edit-user', compact('user', 'role', 'orther_roles'));
        }
        return redirect(route('user.all'));
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);

            $users = DB::table('users')->select([
                'users.id',
                'first_name',
                'last_name',
                'email',
                'roles.name',
            ])
                ->join('role_users AS ru', 'users.id', '=', 'ru.user_id')
                ->leftJoin('roles', 'roles.id', '=', 'ru.role_id')
                ->where('first_name', 'like', '%' . $query . '%')
                ->orWhere('last_name', 'like', '%' . $query . '%')
                ->orWhere('email', 'like', '%' . $query . '%')
                ->paginate(12);
            return view('admin.user.__render', compact('users'))->render();
        }
    }



    public function destoy(Request $request)
    {
        $user_id = $request->input('user_id', 0);
        if ($user_id) {
            DB::table('users')->where('id', $user_id)->delete();
            return redirect(route('user.all'))->with('msg', "Delete course {$user_id} success!");
        } else {
            throw new ModelNotFoundException();
        }
    }
}
