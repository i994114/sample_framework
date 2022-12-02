<?php

namespace Model;

class Welcome extends \Model
{
    public static function get_results()
    {
        //memo:まだDB登録してないので、今回はこの文字列をreturnすることとするとのこと
        return 'レコードです';
        //DBへ接続する処理を書く
        //DB::query('SELECT * FROM users WHERE id = 5');



        //クエリビルｄを使って書くこともできる
        //memo:最後にas_array()を追加することで、配列形式でデータを取り出すことが可能となる
        //DB::select('title', 'content')->from('articles')->execute()->as_array();
    }
}