<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

/**
 * @OA\Get(
 *     path="/api/v1/users",
 *     tags={"Users V1"},
 *     summary="Get all users - V1",
 *     @OA\Response(
 *         response=200,
 *         description="Users fetched successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="version", type="string", example="v1"),
 *             @OA\Property(
 *                 property="users",
 *                 type="array",
 *                 @OA\Items(
 *                     @OA\Property(property="id", type="integer", example=1),
 *                     @OA\Property(property="name", type="string", example="John Doe"),
 *                     @OA\Property(property="email", type="string", example="john@example.com"),
 *                     @OA\Property(property="email_verified_at", type="string", format="date-time", example="2024-04-10T12:00:00Z"),
 *                     @OA\Property(property="created_at", type="string", format="date-time", example="2024-04-10T12:00:00Z"),
 *                     @OA\Property(property="updated_at", type="string", format="date-time", example="2024-04-10T12:00:00Z")
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
             'version' => 'v1',
             'users' => User::all()
         ]);
     }
}
