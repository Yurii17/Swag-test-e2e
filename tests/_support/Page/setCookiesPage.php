<?php

namespace Page;

use Page\Elements\setCookiesElements;

class setCookiesPage extends AbstractPage
{
    /**
     * @var \Page\Elements\setCookiesElements
     */
    protected $elements;

    /**
     * @var array
     */
    protected $userCookies;

    /**
     * SetCookiesPage constructor.
     * @param \AcceptanceTester $tester
     */
    public function __construct(\AcceptanceTester $tester)
    {
        parent::__construct($tester);
        $this->elements = new setCookiesElements;
    }

    /**
     * @param array $data
     * @param $file
     */
    public function saveUser(array $data, $file)
    {
        file_put_contents(codecept_data_dir($file), $data);
    }

    /**
     * @return void
     */
    public function grabCookies()
    {
        $this->tester->saveSessionSnapshot('cookies');
    }

    /**
     * @return void
     */
    public function setCookies()
    {
        $this->tester->loadSessionSnapshot('cookies');
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function setInvalidCookies()
    {
        $this->tester->setCookie(getenv('USER_TOKEN'), 'invalid_token' . rand(123, 999));
        $this->tester->setCookie(getenv('USER_SESSION'), 'invalid_session' . rand(123, 999));
    }

}
