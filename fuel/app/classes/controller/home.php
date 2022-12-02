<?php
class Controller_Home extends \Fuel\Core\Controller_Template
{
    public $template = 'template/index'; //memo:これでview/index.phpがテンプレートとなる
    public function action_index($param1 = null, $param2 = null)
    {
        //変数としてビューを割り当てる
        $this->template->head = View::forge('template/head');
        $this->template->content = View::forge('home/content');
        $this->template->footer = View::forge('template/footer');
        //テンプレートビューの中でさらに読み込んだビューの中にある変数へ値を渡したい場合はset_globalを使う。
        //テンプレートビューの中で使う変数へ値を渡すだけならsetでいい。


    }
}