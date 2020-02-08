<?php
/**
 * Created by PhpStorm.
 * User: zrhm7232
 * Date: 2/8/20
 * Time: 7:34 AM
 */

namespace App\Http\Services;


use App\Invitation;
use App\InvitationDetail;

class InvitationService
{
    public static function createItem($data)
    {
        $item = [];

        $invitation = Invitation::createItem($data);
        $item['invitation'] = $invitation->toArray();
        foreach ($data['invitation_user'] as $invited_user) {
            $user = InvitationDetail::createItem([
                'invitation_id' => $invitation->id,
                'invitation_user_id' => $invited_user
            ]);
            $item['users'][] = $user->toArray();
        }

        return $item;
    }

    public static function getMine($user_id)
    {
        $items = Invitation::getMine($user_id);

        return $items;
    }
}