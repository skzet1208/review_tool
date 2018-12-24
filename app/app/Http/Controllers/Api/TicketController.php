<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Ticket;

/**
 * [API] タスクチケット情報操作を行うクラス
 *
 * 各タスク情報の取得、登録、更新、削除などを行うAPIを実装する。
 *
 * @auther Kai Suzuki
 */
class TicketController extends Controller
{
    use Ticket;

    /**
     * 全ユーザのレビューチケット情報を取得
     *
     * アサイン及び依頼したチケット情報を全て取得する。
     * 取得した情報は、ステータスごとに整形する。
     *
     * @param  Request $request
     * @return JSON
     */
    public function all(Request $request)
    {
        $res = [];

        return response()->json($res, 200);
    }

    /**
     * ユーザのレビュー情報を取得
     *
     * ユーザIDに該当するユーザにアサインされているレビューチケットを取得する。
     * 取得した情報は、ステータスごとに整形する。
     *
     * @param  Request $request
     * @return JSON
     */
    public function myReviewList()
    {
        // ユーザIDの存在チェック
        $res = [
            [
                'id'              => 1,
                'key'             => 'AAA_001',
                'title'           => 'レビューのタイトル_001',
                'description'     => 'レビューの詳細内容_001',
                'limit_datetime'  => '2018-02-01 15:00:00',
                'assign_user_id'  => '1',
                'request_user_id' => '2',
                'status'          => '0',
                'createa_at'      => '2018-01-10 00:00:00',
                'updated_at'      => '2018-01-10 00:00:00',
            ],
            [
                'id'              => 2,
                'key'             => 'AAA_002',
                'title'           => 'レビューのタイトル_002',
                'description'     => 'レビューの詳細内容_002',
                'limit_datetime'  => '2018-02-02 15:00:00',
                'assign_user_id'  => '1',
                'request_user_id' => '5',
                'status'          => '1',
                'createa_at'      => '2018-01-10 00:00:00',
                'updated_at'      => '2018-01-10 00:00:00',
            ],
            [
                'id'              => 3,
                'key'             => 'AAA_003',
                'title'           => 'レビューのタイトル_003',
                'description'     => 'レビューの詳細内容_003',
                'limit_datetime'  => '2018-02-14 15:00:00',
                'assign_user_id'  => '1',
                'request_user_id' => '5',
                'status'          => '0',
                'createa_at'      => '2018-01-10 00:00:00',
                'updated_at'      => '2018-01-10 00:00:00',
            ],
            [
                'id'              => 1,
                'key'             => 'AAA_004',
                'title'           => 'レビューのタイトル_004',
                'description'     => 'レビューの詳細内容_004',
                'limit_datetime'  => '2018-03-11 15:00:00',
                'assign_user_id'  => '1',
                'request_user_id' => '3',
                'status'          => '2',
                'createa_at'      => '2018-02-10 00:00:00',
                'updated_at'      => '2018-02-10 00:00:00',
            ],
        ];

        $res = $this->formatStatus($res);

        return response()->json($res, 200);
    }

    /**
     * ユーザの依頼情報を取得
     *
     * ユーザIDに該当するユーザが依頼したレビューチケットを取得する。
     * 取得した情報は、ステータスごとに整形する。
     *
     * @param  Request $request
     * @return JSON
     */
    public function myRequestList(Request $request)
    {
        $res = [
            [
                'id'              => 1,
                'key'             => 'AAA_001',
                'title'           => 'レビュー依頼のタイトル_001',
                'description'     => 'レビュー依頼の詳細内容_001',
                'limit_datetime'  => '2018-02-01 15:00:00',
                'assign_user_id'  => '2',
                'request_user_id' => '1',
                'status'          => '0',
                'createa_at'      => '2018-01-10 00:00:00',
                'updated_at'      => '2018-01-10 00:00:00',
            ],
            [
                'id'              => 2,
                'key'             => 'AAA_002',
                'title'           => 'レビュー依頼のタイトル_002',
                'description'     => 'レビュー依頼の詳細内容_002',
                'limit_datetime'  => '2018-02-02 15:00:00',
                'assign_user_id'  => '2',
                'request_user_id' => '1',
                'status'          => '1',
                'createa_at'      => '2018-01-10 00:00:00',
                'updated_at'      => '2018-01-10 00:00:00',
            ],
            [
                'id'              => 3,
                'key'             => 'AAA_003',
                'title'           => 'レビュー依頼のタイトル_003',
                'description'     => 'レビュー依頼の詳細内容_003',
                'limit_datetime'  => '2018-02-12 15:00:00',
                'assign_user_id'  => '3',
                'request_user_id' => '1',
                'status'          => '2',
                'createa_at'      => '2018-01-10 00:00:00',
                'updated_at'      => '2018-01-10 00:00:00',
            ],
            [
                'id'              => 1,
                'key'             => 'AAA_003',
                'title'           => 'レビュー依頼のタイトル_003',
                'description'     => 'レビュー依頼の詳細内容',
                'limit_datetime'  => '2018-03-11 15:00:00',
                'assign_user_id'  => '4',
                'request_user_id' => '1',
                'status'          => '0',
                'createa_at'      => '2018-02-10 00:00:00',
                'updated_at'      => '2018-02-10 00:00:00',
            ],
        ];

        return response()->json($res, 200);
    }
}
