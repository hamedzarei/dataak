<?php
/**
 * Created by PhpStorm.
 * User: zrhm7232
 * Date: 2/8/20
 * Time: 7:36 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class InvitationDetail extends Model
{
    protected $table = 'invitation_details';

    protected $fillable = [
        'invitation_id', 'invitation_user_id', 'status'
    ];

    public static function createItem($data)
    {
        $item = self::create($data);

        return $item;
    }
}