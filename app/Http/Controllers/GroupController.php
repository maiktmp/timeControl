<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 07/05/2019
 * Time: 11:36 PM
 */

namespace App\Http\Controllers;


use App\Http\Controllers\Request\CreateGroupRequest;
use App\Http\Model\Group;
use App\Http\Model\Permission;
use App\Http\Model\UserHasGroup;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::whereHas('hasUser', function ($q) {
            $q->where('fk_id_user', \Auth::user()->id);
        })->with('hasDays')
            ->get();
        return view('group.index', ["groups" => $groups]);
    }

    public function createPost(CreateGroupRequest $request)
    {
        $group = new Group();
        $userHasGroup = new UserHasGroup();
        $userHasGroup->fk_id_user = \Auth::user()->id;
        $userHasGroup->fk_id_permission = Permission::TEACHER;
        $group->fill($request->all());
        try {
            $group->saveOrFail();
            $userHasGroup->fk_id_group = $group->id;
            $userHasGroup->saveOrFail();
            return redirect()->route('group_index');
        } catch (\Throwable $e) {
            return dd($e);
        }
    }

    public function update($groupId)
    {
        $group = Group::find($groupId);
        return view('group.update', ['group' => $group]);
    }

}