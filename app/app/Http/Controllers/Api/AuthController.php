<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AuthController extends Controller
{
    /**
     * ユーザ登録
     *
     * @return json ステータス
     */
    public function register()
    {
        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        return response()->json(['status' => 201]);
    }

    /**
     * ログイン
     *
     * @return json ステータス
     */
    public function login()
    {
        $user = User::whereEmail(request('username'))->first();

        $client = \DB::table('oauth_clients')
                ->where('password_client', true)
                ->first();
        if (!$client) {
            return response()->json([
                'message' => 'system error.',
                'status' => 500
            ], 500);
        }

        $data = [
            'grant_type'    => 'password',
            'client_id'     => $client->id,
            'client_secret' => $client->secret,
            'username'      => request('username'),
            'password'      => request('password'),
        ];

        $request = Request::create('/oauth/token', 'POST', $data);

        $response = app()->handle($request);

        // Check if the request was successful
        if ($response->getStatusCode() != 200) {

            return response()->json([
                'message' => 'Wrong email or password',
                'status' => 401
            ], 401);
        }

        // Get the data from the response
        $data = json_decode($response->getContent());

        // Format the final response in a desirable format
        return response()->json([
            'token'  => $data->access_token,
            'user'   => $user,
            'status' => 200
        ]);
    }

    /**
     * ログアウト
     *
     * @return void
     */
    public function logout()
    {
        $access_token = auth()->user()->token();

        $refresh_token = \DB::table('oauth_refresh_tokens')
                      ->where('access_token_id', $access_token->id)
                      ->update([
                          'revoked' => true
                      ]);

        $access_token->revoke();

        return response()->json(['status' => 200]);
    }

    /**
     * ユーザ情報取得
     *
     * @return array
     */
    public function getUser()
    {
        return auth()->user();
    }
}
