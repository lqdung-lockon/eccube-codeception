<?php

namespace Page\Admin;


class CsvSettingsPage extends AbstractAdminPageStyleGuide
{
    public static $CSVタイプ = ['id' => 'csv-type'];

    public static $登録完了メッセージ = '.c-container .container-fluid .alert-success';

    protected $tester;

    /**
     * CsvSettingsPage constructor.
     */
    public function __construct(\AcceptanceTester $I)
    {
        parent::__construct($I);
    }

    public static function go($I)
    {
        $page = new CsvSettingsPage($I);
        return $page->goPage('/setting/shop/csv', 'CSV出力項目設定  基本情報設定');
    }

    public static function at($I)
    {
        $page = new CsvSettingsPage($I);
        $page->tester->see('CSV出力項目設定  基本情報設定', '.c-container .c-pageTitle__titles');
        return $page;
    }

    public function 入力_CSVタイプ($value) {
        $this->tester->selectOption(['id' => 'csv-type'], $value);
        return $this;
    }

    public function 選択_出力項目($value) {
        $this->tester->selectOption(['id' => 'csv-output'], $value);
        return $this;
    }

    public function 削除() {
        $this->tester->click('#remove');
        return $this;
    }

    public function 設定() {
        $this->tester->click('#common_button_box__confirm_button button');
        return $this;
    }

}