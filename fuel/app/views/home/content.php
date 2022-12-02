<h1>タイトルです</h1>
<div class="welcome_user">Welcome 設定すればユーザ名が入ります。</div>
わたしの名前は<?php echo $username; ?>で、年齢は<?php echo $age; ?>なのでありますっ！
<?php echo Asset::img('hero.jpg', array('width' => '600px', 'alt' => 'タイトル画像')); ?>
<?php echo Asset::css('base.css'); ?>
<?php echo Html::anchor('welcome/index', 'リンクの文言'); ?>
<?php echo Asset::add_path('assets/upload/', 'img'); ?>
<?php echo Asset::img('upload_hero.jpg', array('width' => '300px', 'alt' => 'タイトル画像2')); ?>

