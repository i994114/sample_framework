<?php
class Controller_Home extends Controller
{
    public function action_index($param1 = null, $param2 = null)
    {
        //変数としてビューを割り当てる
        $view = View::forge('template/index'); //テンプレートとなるビューファイルの読込み
        $view->set('head',View::forge('template/head'));
        $view->set('content',View::forge('home/content'));
        $view->set('footer',View::forge('template/footer'));
        $view->set_global('site_title','WEBsite');

        //子供のビューファイル(今回でいうとhead/content/footer.php)に変数渡したいとき
        $view->set_global('username', 'set_blobalテスト中');

        $view->set_global('username',$param1);
        $view->set_global('age', $param2);
        //テンプレートビューの中でさらに読み込んだビューの中にある変数へ値を渡したい場合はset_globalを使う。
        //テンプレートビューの中で使う変数へ値を渡すだけならsetでいい。

        // レンダリングした HTML をリクエストに返す
        return $view;
    }
}