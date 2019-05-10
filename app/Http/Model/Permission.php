<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 19/04/2019
 * Time: 09:18 PM
 */

namespace App\Http\Model;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Http\Model\Permission
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\Permission query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\Permission whereName($value)
 */
class Permission extends Model
{
    public const TEACHER = 1;
    public const STUDENT = 2;
    protected $table = "permission";
}