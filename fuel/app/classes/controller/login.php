<?php

class Controller_Login extends Controller {
    const PASS_LENGTH_MIN = 6;
    const PASS_LENGTH_MAX = 20;

    public function action_index() {
        $error = '';
        $formData = '';

        $form = \Fuel\Core\Fieldset::forge('loginform');

        //Email入力欄
        $form->add('email', 'Email', array('type' => 'email', 'placeholder' => 'Email'))
            ->add_rule('required')
            ->add_rule('valid_email')
            ->add_rule('min_length', 1)
            ->add_rule('max_length', 20);

        //パスワード入力欄
        $form->add('password', 'Password', array('type' => 'password', 'placeholder' => 'パスワード'))
            ->add_rule('required')
            ->add_rule('min_length', self::PASS_LENGTH_MIN)
            ->add_rule('max_length', self::PASS_LENGTH_MAX);

        //ログインボタン
        $form->add('submit', '', array('type' => 'submit', 'value' => '登録'));

        if (Input::method() === 'POST') {
            //バリエーションインスタンスを取得
            $val = $form->validation();

            if ($val->run()) {
                //formデータの値を取得
                $formData = $val->validated();
                $auth = \Auth\Auth::instance();

                if ($auth->login($_POST['email'], $_POST['password'])) {
                    //ログイン成功メッセージ
                    \Fuel\Core\Session::set_flash('sucMsg', 'ログインしました');
                    //マイページへ遷移
                    \Fuel\Core\Response::redirect('member/mypage');
                } else {
                    //エラー格納
                    $error = $val->error();
                    //ログイン失敗メッセージ
                    \Fuel\Core\Session::set_flash('errMsg', 'ログインに失敗しました');
                }
            } else {
                //エラー格納
                $error = $val->error();
                //メッセージ格納
                Session::set_flash('errMsg', 'ユーザー登録に失敗しました！時間を置いてお試し下さい！');
            }
            //formにPOSTされた値をセットする
            //理由：手間防止で、もともとユーザが入力した内容を表示したいため
            $form->repopulate();
        }
        //変数としてビューを割り当てる
        $view = View::forge('template/index');
        $view->set('head', View::forge('template/head'));
        $view->set('header', \Fuel\Core\View::forge('template/header'));
        $view->set('contents', \Fuel\Core\View::forge('auth/login'));
        $view->set('footer', \Fuel\Core\View::forge('template/footer'));
        $view->set_global('loginform', $form->build(''), false);
        $view->set_global('error', $error);

        //レンダリングしたリクエストを返す
        return $view;
    }
}