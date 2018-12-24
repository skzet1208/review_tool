<?php
namespace App\Traits;

/**
 * [Trait] チケット情報の操作系トレイト
 *
 * 各タスク情報の取得、登録、更新、削除などを行うAPIを実装する。
 *
 * @auther Kai Suzuki
 */
trait Ticket
{
    /**
     * ステータス毎に整形する
     *
     * @param  array $list
     * @return array $format_list
     */
    public function formatStatus($list)
    {
        $status = array_flip(config('ticket.const.status'));

        $format_list = array_fill_keys($status, []);
        foreach ($list as $v) {
            $key = $status[$v['status']];

            if (isset($format_list[$key])) {
                $format_list[$key][] = $v;
            }
        }

        return $format_list;
    }
}
