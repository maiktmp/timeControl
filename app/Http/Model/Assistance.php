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
 * App\Http\Model\Assistance
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\Assistance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\Assistance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\Assistance query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $fk_id_user_has_group
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\Assistance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\Assistance whereFkIdUserHasGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\Assistance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\Assistance whereUpdatedAt($value)
 */
class Assistance extends Model
{
    protected $table = "assistance";
}