<?php
/**
 * Created by PhpStorm.
 * User: zrhm7232
 * Date: 1/31/20
 * Time: 2:39 PM
 */

namespace App\Http\Controllers;

use App\Http\Services\InvitationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class InvitationController
{
    public function createItem(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'title'       => 'required|max:100',
            'description'    => 'required',
            'when'      => 'required|date_format:Y-m-d H:i:s',
            'type'      => 'required|in:party,meeting',
            'where'     => 'required',
            'invitation_user'   => 'required|array',
            'invitation_user.*'   => 'required|numeric'
        ]);

        if ($validate->fails()) {
            throw new
            BadRequestHttpException('msg_'.json_encode($validate->failed()));
        }
        $user_id = $request->header('x-user-id');
//        get required args
        $data = $request->all();
//        create user
        $invitation = InvitationService::createItem(array_merge($data, [
            'owner_id' => $user_id
        ]));

        return new JsonResponse([
            'data' => $invitation
        ]);

    }

    public function getMine(Request $request)
    {
        $user_id = $request->header('x-user-id');

        $items = InvitationService::getMine($user_id);

        return new JsonResponse([
            'data' => $items
        ]);
    }

    public function getOthers(Request $request)
    {

    }

    public function updateItem(Request $request, $id)
    {

    }
}