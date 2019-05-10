<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Http\Model\Group
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Http\Model\UserHasGroup[] $hasGroups
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\Group newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\Group newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\Group query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $start_hour
 * @property string $end_hour
 * @property string $duration
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\Group whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\Group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\Group whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\Group whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\Group whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\Group whereStartHour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Model\Group whereUpdatedAt($value)
 */
class Group extends Model
{
    protected $table = "group";

    protected $fillable = [
        'name',
        'start_hour',
        'end_hour',
    ];

    public static function rules()
    {
        return [
            'name' => 'required',
            'start_hour' => 'required',
            'end_hour' => 'required|after:start_hour'
        ];
    }

    public static function messages()
    {
        return [
            'name.required' => 'El nombre del grupo es requerido',
            'start_hour.required' => 'La hora de inicio es requerida',
            'end_hour.required' => 'La hora de fin es requerida',
            'end_hour.after' => 'La hora de fin no puede ser antes a la de inicio'
        ];
    }

    public function hasUser()
    {
        return $this->hasMany(
            UserHasGroup::class,
            'fk_id_group',
            'id'
        );
    }

    public function hasDays()
    {
        return $this->belongsToMany(
            Day::class,
            'group_has_day',
            'fk_id_group',
            'fk_id_day'
        );
    }
}