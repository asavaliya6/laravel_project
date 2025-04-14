<?php

namespace App\Http\Controllers\API\V2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

/**
 * @OA\Get(
 *     path="/api/v2/users",
 *     tags={"Users V2"},
 *     summary="Get all users (only id and name) - V2",
 *     @OA\Response(
 *         response=200,
 *         description="Users fetched successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="version", type="string", example="v2"),
 *             @OA\Property(
 *                 property="users",
 *                 type="array",
 *                 @OA\Items(
 *                     @OA\Property(property="id", type="integer", example=1),
 *                     @OA\Property(property="name", type="string", example="John Doe")
 *                 )
 *             )
 *         )
 *     )
 * )
 */
class UserController extends Controller
{
    public function index()
     {
         return response()->json([
             'version' => 'v2',
             'users' => User::select('id', 'name')->get()
         ]);
     }
}
