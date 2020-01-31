<?php
/**
 * Created by PhpStorm.
 * User: zrhm7232
 * Date: 1/31/20
 * Time: 2:39 PM
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class InvitationController
{
    public function createItem(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email'       => [
                'required_without:mobile',
            ],
            'password'    => 'required|min:8',
            'mobile'      => [
                'required_without:email',
            ]
        ]);

        if ($validate->fails()) {
            throw new
            BadRequestHttpException('msg_'.json_encode($validate->failed()));
        }

    }

    public function getMine(Request $request)
    {

    }

    public function getOthers(Request $request)
    {

    }

    public function updateItem(Request $request, $id)
    {

    }
}