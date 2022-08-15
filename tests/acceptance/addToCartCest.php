<?php

use Page\loginPage;
use Page\addToCartPage;
use Page\setCookiesPage;

class addToCartCest
{
    /**
     * @var loginPage
     */
    protected $loginPage;

    /**
     * @var addToCartPage
     */
    protected $addToCartPage;

     /**
     * @var setCookiesPage
     */
    protected $setCookiesPage;


    public function _before(AcceptanceTester $I)
    {
        $this->loginPage = new loginPage($I);
        $this->setCookiesPage = new setCookiesPage($I);
        $this->addToCartPage = new addToCartPage($I);
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
    public function addToCart()
    {
        $this->setCookiesPage->setCookies();
        $this->addToCartPage->addToCart();
        $this->setCookiesPage->grabCookies();
    }

    /**
     * @depends addToCart
     * @test
     * @throws Exception
     */
    public function addAllToCart() 
    {
        $this->setCookiesPage->setCookies();
        $this->addToCartPage->addAllToCart();
        $this->setCookiesPage->grabCookies();
    }

    /**
     * @depends addAllToCart
     * @test
     * @throws Exception
     */
    public function checkoutCartAction() 
    {
        $this->setCookiesPage->setCookies();
        $this->addToCartPage->checkoutAction();
        $this->setCookiesPage->grabCookies();
    }

     /**
     * @depends addAllToCart
     * @test
     * @throws Exception
     */
    public function finishActionAndAssertOrder() 
    {
        $this->setCookiesPage->setCookies();
        $this->addToCartPage->finishPage();
        $this->setCookiesPage->grabCookies();
    }

    /**
     * @depends finishActionAndAssertOrder
     * @test
     * @throws Exception
     */
    public function sortedByAZForm()
    {
        $this->setCookiesPage->setCookies();
        $this->addToCartPage->sortedByAZValue();
        $this->setCookiesPage->grabCookies();
    }

    /**
     * @depends sortedByAZForm
     * @test
     * @throws Exception
     */
    public function sortedByZAForm()
    {
        $this->setCookiesPage->setCookies();
        $this->addToCartPage->sortedByZAValue();
        $this->setCookiesPage->grabCookies();
    }

    /**
     * @depends sortedByZAForm
     * @test
     * @throws Exception
     */
    public function sortedByLowToHighPriceForm()
    {
        $this->setCookiesPage->setCookies();
        $this->addToCartPage->sortedByLowToHighPrice();
        $this->setCookiesPage->grabCookies();
    }

     /**
     * @depends sortedByLowToHighPriceForm
     * @test
     * @throws Exception
     */
    public function sortedByHighToLowPriceForm()
    {
        $this->setCookiesPage->setCookies();
        $this->addToCartPage->sortedByHighToLowPrice();
        $this->setCookiesPage->grabCookies();
    }

    /**
     * @depends sortedByHighToLowPriceForm
     * @test
     * @throws Exception
     */
    public function logout()
    {
        $this->logoutAction();
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
