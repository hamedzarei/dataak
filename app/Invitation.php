<?php
/**
 * Created by PhpStorm.
 * User: zrhm7232
 * Date: 2/8/20
 * Time: 7:35 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $table = 'invitations';

    protected $fillable = [
        'owner_id', 'title', 'description', 'when', 'where', 'type'
    ];

    public static function createItem($data)
    {
        $item = self::create($data);

        return $item;
    }

    public static function getMine($user_id)
    {
        $items = self::where('owner_id', $user_id)->get();

        return $items->toArray();
    }
}