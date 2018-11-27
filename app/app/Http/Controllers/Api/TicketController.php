<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    /**
     * タスク情報全て取得
     */
    public function all()
    {
        return [
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
                'request_user_id' => '5',
                'status'          => '1',
                'createa_at'      => '2018-01-10 00:00:00',
                'updated_at'      => '2018-01-10 00:00:00',
            ],
            [
                'id'              => 3,
                'key'             => 'AAA_002',
                'title'           => 'レビュー依頼のタイトル_002',
                'description'     => 'レビュー依頼の詳細内容_002',
                'limit_datetime'  => '2018-02-02 15:00:00',
                'assign_user_id'  => '3',
                'request_user_id' => '5',
                'status'          => '0',
                'createa_at'      => '2018-01-10 00:00:00',
                'updated_at'      => '2018-01-10 00:00:00',
            ],
            [
                'id'              => 1,
                'key'             => 'AAA_003',
                'title'           => 'レビュー依頼のタイトル_003',
                'description'     => 'レビュー依頼の詳細内容',
                'limit_datetime'  => '2018-03-11 15:00:00',
                'assign_user_id'  => '1',
                'request_user_id' => '2',
                'status'          => '0',
                'createa_at'      => '2018-02-10 00:00:00',
                'updated_at'      => '2018-02-10 00:00:00',
            ],
        ];
    }
}
