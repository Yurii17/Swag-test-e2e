<?php

use Page\loginPage;
use Page\setCookiesPage;

class loginCest
{
    /**
     * @var loginPage
     */
    protected $loginPage;

     /**
     * @var setCookiesPage
     */
    protected $setCookiesPage;


    public function _before(AcceptanceTester $I)
    {
        $this->loginPage = new loginPage($I);
        $this->setCookiesPage = new setCookiesPage($I);
    }

    /**
     * @test
     * @throws Exception
     */
    public function assertImOnLoginPage()
    {
        $this->loginPage->assertImOnLoginPage();
    }

    /**
     * @depends assertImOnLoginPage
     * @test
     * @throws Exception
     */
    public function loginWithValidCredentials()
    {
        $this->loginPage->loginByStandartUserEmail();
        $this->setCookiesPage->grabCookies();
    }

    /**
     * @depends loginWithValidCredentials
     * @test
     * @throws Exception
     */
    public function assertImOnInventoryPage()
    {
        $this->setCookiesPage->setCookies();
        $this->loginPage->assertImOnInventoryPage();
        $this->setCookiesPage->grabCookies();
    }

    /**
     * @depends assertImOnInventoryPage
     * @test
     * @throws Exception
     */
    public function logout()
    {
        $this->logoutAction();
    }

    /**
     * @depends logout
     * @test
     * @throws Exception
     */
    public function loginWithLockedUserEmail()
    {
        $this->loginPage->loginByLockedUserEmail();
    }

    /**
     * @depends loginWithLockedUserEmail
     * @test
     * @throws Exception
     */
    public function loginWithInvalidUserEmail()
    {
        $this->loginPage->loginByInvalidUserEmail();
    }

    /**
     * @depends loginWithLockedUserEmail
     * @test
     * @throws Exception
     */
    public function loginWithProblemUserEmail()
    {
        $this->loginPage->loginByProblemUserEmail();
        $this->logoutAction();
    }

    /**
     * @depends loginWithProblemUserEmail
     * @test
     * @throws Exception
     */
    public function loginWithPerformanceUserEmail()
    {
        $this->loginPage->loginByPefrormanceUserEmail();
    }

    /**
     * @throws Exception
     */
    protected function logoutAction()
    {
        $this->setCookiesPage->setCookies();
        $this->loginPage->logout();
    }

}
