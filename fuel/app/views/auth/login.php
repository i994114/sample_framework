<div class="ctn-main">
    <section class="ctn-form">
        <h1>ログイン</h1>

        <?php if(!empty($error)): ?>
            <ul class="area-error-msg"></ul>
            <?php foreach ($error as $key => $val): ?>
                <li><?=$val?></li>
            <?php endforeach;?>
        <?php endif ?>
        <?=$loginform?>
    </section>
</div>