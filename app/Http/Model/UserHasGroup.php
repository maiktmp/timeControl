<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 19/04/2019
 * Time: 09:15 PM
 */

namespace App\Http\Model;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Http\Model\UserHasGroup
 *
 * @property-read \App\Http\Model\Assistance $assistance
 * @property-read \App\Http\Model\Group $group
 * @property-read \App\Http\Model\Permission $permission
 * @property-read \App\Http\Model\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\UserHasGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\UserHasGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\UserHasGroup query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $fk_id_user
 * @property int $fk_id_group
 * @property int $fk_id_permission
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\UserHasGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\UserHasGroup whereFkIdGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\UserHasGroup whereFkIdPermission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\UserHasGroup whereFkIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\UserHasGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\UserHasGroup whereUpdatedAt($value)
 */
class UserHasGroup extends Model
{
    protected $table = "user_has_group";

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'fk_id_user',
            'id'
        );
    }

    public function group()
    {
        return $this->belongsTo(
            Group::class,
            'fk_id_group',
            'id'
        );
    }

    public function permission()
    {
        return $this->belongsTo(
            Permission::class,
            'fk_id_permission',
            'id'
        );
    }

    public function assistance()
    {
        return $this->belongsTo(
            Assistance::class,
            'fk_id_assistance',
            'id'
        );
    }

}