<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 18/04/2019
 * Time: 02:56 PM
 */

namespace App\Http\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Http\Model\User
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Http\Model\UserHasGroup[] $hasGroups
 * @property-read \App\Http\Model\Rol $rol
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\User query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $last_name
 * @property string $password
 * @property string $email
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $fk_id_rol
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\User whereFkIdRol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\User whereUsername($value)
 * @property string $rfid
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\User whereRfid($value)
 */
class User extends Authenticatable
{
    protected $table = "user";


    public function hasGroups()
    {
        return $this->hasMany(
            UserHasGroup::class,
            'fk_id_user',
            'id'
        );
    }

    public function rol()
    {
        return $this->belongsTo(
            Rol::class,
            'fk_id_rol',
            'id'
        );
    }


}