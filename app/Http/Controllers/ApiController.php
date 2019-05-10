<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 18/04/2019
 * Time: 02:53 PM
 */

namespace App\Http\Controllers;

use App\Http\Model\Assistance;
use App\Http\Model\Group;
use App\Http\Model\User;
use App\Http\Model\UserHasGroup;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function login(Request $request)
    {
        $username = $request->input("username", null);
        $password = $request->input("password", null);
        $gr = new GenericResponse();
        $user = User::whereUsername($username);
        if (!is_null($user)) {
            if (\Hash::check($user->password, $password)) {
                $gr->data = $user;
                $gr->success = true;
                $gr->message = "Bienvenido " . $user->name . " " . $user->last_name;
                return response()->json($gr);
            }
        }
        $gr->message = "Usuario o contraseña incorrectos";
        $gr->success = false;
        return response()->json($gr);
    }

    public function getGroups($userId)
    {
        $day = Carbon::now()->dayOfWeek + 1;
        $groups = Group::whereActive(true)
            ->with('hasDays')
            ->orderBy('start_hour', 'ASC')
            ->whereHas('hasUser', function ($q) use ($userId) {
                $q->where('fk_id_user', $userId);
            })
            ->whereHas('hasDays', function ($q) use ($day) {
                $q->where('day.id', 1);
            })
            ->get();
        return response()->json($groups);
    }

    public function getCurrentGroup($userId)
    {
        $groups = Group::whereActive(true)
            ->whereHas('hasUser', function ($q) use ($userId) {
                $q->where('fk_id_user', $userId);
            })->get();
        $currentGroup = null;
        foreach ($groups as $group) {
            $start = Carbon::createFromFormat("H:i:s", $group->start_hour);
            $end = Carbon::createFromFormat("H:i:s", $group->end_hour);
            $current = Carbon::now();
            if ($current->lessThan($end) && $current->greaterThan($start)) {
                $currentGroup = $group;
            }
        }
        return $currentGroup;
    }

    public function checkAssistance(Request $request)
    {
        $users = $request->input("users", []);
        foreach ($users as $rfid) {
            $user = User::whereRfid($rfid);
            if (!is_null($user)) {
                $userHasGroup = UserHasGroup::whereFkIdUser($user->id);
                $assistance = new Assistance();
                $assistance->fk_id_user_has_group = $userHasGroup->id;
                $assistance->save();
            }
        }
        $gr = new GenericResponse();
        $gr->success = true;
        $gr->message = "Usuarios guardados con éxito";
        return response()->json($gr);
    }
}