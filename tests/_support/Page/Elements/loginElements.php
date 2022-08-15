<?php
namespace Page\Elements;

class loginElements 
{

/**
 * @var string
 */
public $loginContainer = '#login_button_container';

/**
 * @var string
 */
public $username = '[data-test="username"]';

/**
 * @var string
 */
public $password = '[data-test="password"]';

/**
 * @var string
 */
public $button = '[data-test="login-button"]';

/**
 * @var string
 */
public $menu = '#react-burger-menu-btn';

/**
 * @var string
 */
public $logout = '#logout_sidebar_link';

/**
 * @var string
 */
public $title = '.title';

/**
 * @var string
 */
public $h3 = '[data-test="error"]';

/**
 * @var string
 */
public $errorMessage = 'Epic sadface: Sorry, this user has been locked out.';

/**
 * @var string
 */
public $errorMessageUserDoNotMutch = 'Epic sadface: Username and password do not match any user in this service';


}