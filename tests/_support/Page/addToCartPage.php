<?php
namespace Page;

use AcceptanceTester;
use Traits\InteractWithFaker;
use Traits\InteractAsserts;
use Page\Elements\addToCartElements;

class addToCartPage extends AbstractPage
{
    use InteractWithFaker, InteractAsserts;

    /**
     * @var addToCartElements
     */
    protected $elements;

    /**
     * 
     */
    protected $beforeName;

    /**
     * @var string
     */
    protected $beforePrice;

    /**
     * @var string
     */
    protected $afterPrice;

    /**
     * LoginPage constructor.
     *
     * @param AcceptanceTester $tester
     */
    public function __construct(AcceptanceTester $tester)
    {
        parent::__construct($tester);
        $this->elements = new addToCartElements;
    }

   /**
     * @return void
     * @throws Exception
     */
    public function beforeValueData()
    {
        $this->beforeName = $this->tester->grabTextFrom($this->elements->titleName);
        $this->beforePrice = $this->tester->grabTextFrom($this->elements->price);
        $this->afterPrice = $this->tester->grabTextFrom($this->elements->lastPrice);
    }

    /**
     * @return void
     * @throws Exception
     */
    public function addToCart()
    {
        $this->tester->click($this->elements->addToCartBtn[0]);
        $this->sameTextForm($this->elements->cartEl, '1');
    }

    /**
     * @return void
     * @throws Exception
     */
    public function addAllToCart()
    {
        $this->tester->click($this->elements->addToCartBtn[1]);
        $this->tester->click($this->elements->addToCartBtn[2]);
        $this->tester->click($this->elements->addToCartBtn[3]);
        $this->tester->click($this->elements->addToCartBtn[4]);
        $this->tester->click($this->elements->addToCartBtn[5]);
        $this->sameTextForm($this->elements->cartEl, '6');
    }

    /**
     * @return void
     * @throws Exception
     */
    public function checkoutAction()
    {
        $this->tester->click($this->elements->shopingCartBtn);
        $this->tester->amOnPage('/cart.html');
        $this->tester->click($this->elements->checkoutBtn);
        $this->tester->amOnPage('/checkout-step-one.html');
        $this->tester->fillField($this->elements->firstName, $this->faker()->firstName);
        $this->tester->fillField($this->elements->lastName, $this->faker()->lastName);
        $this->tester->fillField($this->elements->zipCode, rand(1234, 99299));
        $this->tester->click($this->elements->continueBtn);
        $this->tester->amOnPage('/checkout-step-two.html');
        $this->tester->click($this->elements->finishBtn);
    }

    /**
     * @return void
     * @throws Exception
     */
    public function finishPage()
    {
        $this->tester->amOnPage('/checkout-complete.html');
        $this->sameTextForm('h2', 'THANK YOU FOR YOUR ORDER');
        $this->tester->click($this->elements->backToHomaPageBtn);
        /** @var loginPage $url */
        $url = $this->resolvePage(loginPage::class);
        $url->assertImOnInventoryPage();
    }

    /**
     * @return void
     * @throws Exception
     */
    public function sorterForm($val)
    {
        $this->beforeValueData();
        $this->tester->click($this->elements->sortDropDown);
        $this->tester->click($this->elements->sortClickEl[$val]);
        $this->sameTextForm($this->elements->sortActive, $this->elements->sortedByValue[$val]);
    }

     /**
     * @return void
     * @throws Exception
     */
    public function sortedByAZValue()
    {
        $this->sorterForm(0);
        $this->sameTextForm($this->elements->titleName, $this->beforeName);
    }

    /**
     * @return void
     * @throws Exception
     */
    public function sortedByZAValue()
    {
        $this->sorterForm(1);
        $this->assertNotSameTextForm($this->elements->titleName, $this->beforeName);
    }

    /**
     * @return void
     * @throws Exception
     */
    public function sortedByLowToHighPrice()
    {
        $this->sorterForm(2);
        $this->assertNotSameTextForm($this->elements->titleName, $this->beforeName);
        $this->afterPrice;
        if($this->beforePrice <=  $this->afterPrice) {
            var_dump($this->beforePrice, $this->afterPrice);
            $this->tester->assertGreaterThan( $this->beforePrice, $this->afterPrice);
        }
    }

    /**
     * @return void
     * @throws Exception
     */
    public function sortedByHighToLowPrice()
    {
        $this->sorterForm(3);
        $this->assertNotSameTextForm($this->elements->titleName, $this->beforeName);
        if($this->beforePrice >=  $this->afterPrice) {
            var_dump($this->afterPrice . ' >= ' . $this->beforePrice);
            $this->tester->assertGreaterThan($this->afterPrice, $this->beforePrice);
        } else{
            var_dump('____NOT OK____');
        }
    }





   


}
