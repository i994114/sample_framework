<?php

class Controller_Member_Mypage extends Controller
{
    public function action_index()
    {
        $error = '';
        $formData = '';

        //認証用のインスタンス生成
        $auth = \Auth\Auth::instance();

        //ログアウト用のボタン作成
        $form = \Fuel\Core\Fieldset::forge('logoutform');
        $form->add('submit', '', array('type' => 'submit', 'value' => 'ログアウト'));

        //ログインしているユーザがいるかをチェック
        if (!Auth::check()) {
            $auth = 0;
            //不正ログインによりログイン画面にリダイレクト
            \Fuel\Core\Response::redirect('/login');

        } else {
            if (\Fuel\Core\Input::method() === 'POST') {
                //ログアウトメッセージを表示
                \Fuel\Core\Session::set_flash('sucMsg', 'ログアウトしました');

                //ログアウトしてログイン画面に戻る
                $auth->logout();
                \Fuel\Core\Response::redirect('login');
            }
            $form->repopulate();
        }


        //変数としてビューを割り当てる
        $view = View::forge('template/index');
        $view->set('head',View::forge('template/head'));
        $view->set('header',View::forge('template/header'));
        $view->set('contents',View::forge('member/mypage'));
        $view->set('footer',View::forge('template/footer'));
        $view->set_global('logoutform', $form->build(''), false);

        // レンダリングした HTML をリクエストに返す
        return $view;
    }
}

