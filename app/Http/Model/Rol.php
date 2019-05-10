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
 * App\Http\Model\Rol
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\Rol newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\Rol newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\Rol query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\Rol whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\Rol whereName($value)
 */
class Rol extends Model
{
    protected $table = "rol";
}