<?php
namespace Page\Elements;

class addToCartElements 
{

/**
 * @var array
 */
public $addToCartBtn = [
    '[data-test="add-to-cart-sauce-labs-backpack"]',
    '[data-test="add-to-cart-sauce-labs-bike-light"]',
    '[data-test="add-to-cart-sauce-labs-bolt-t-shirt"]',
    '[data-test="add-to-cart-sauce-labs-fleece-jacket"]',
    '[data-test="add-to-cart-sauce-labs-onesie"]',
    '[data-test="add-to-cart-test.allthethings()-t-shirt-(red)"]'
];

/**
 * @var string
 */
public $checkoutBtn = '[data-test="checkout"]';

/**
 * @var string
 */
public $shopingCartBtn = '#shopping_cart_container';

/**
 * @var string
 */
public $firstName = '[data-test="firstName"]';

/**
 * @var string
 */
public $lastName = '[data-test="lastName"]';

/**
 * @var string
 */
public $zipCode = '[data-test="postalCode"]';

/**
 * @var string
 */
public $cartEl = '.shopping_cart_badge';

/**
 * @var string
 */
public $sortDropDown = '[data-test="product_sort_container"]';

/**
 * @var string
 */
public $sortActive = '.active_option';

/**
 * @var array
 */
public $sortClickEl = [
    'option:nth-child(1)',
    'option:nth-child(2)',
    'option:nth-child(3)',
    'option:nth-child(4)',
];

/**
 * @var array
 */
public $sortedByValue = [
    'NAME (A TO Z)',
    'NAME (Z TO A)',
    'PRICE (LOW TO HIGH)',
    'PRICE (HIGH TO LOW)'
];

/**
 * @var string
 */
public $titleName = '.inventory_item_name';

/**
 * @var string
 */
public $price = '.inventory_item_price';

/**
 * @var string
 */
public $lastPrice = 'div:nth-child(6) .inventory_item_description .pricebar div';

/**
 * @var string
 */
public $errorMessage = 'Epic sadface: Sorry, this user has been locked out.';

/**
 * @var string
 */
public $continueBtn = '[data-test="continue"]';

/**
 * @var string
 */
public $finishBtn = '[data-test="finish"]';

/**
 * @var string
 */
public $backToHomaPageBtn = '[data-test="back-to-products"]';

}