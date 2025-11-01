<?php

namespace Onlishop\Core\Checkout\Cart;

interface CartPersisterInterface {}
abstract class AbstractCartPersister {}

class MyClass implements CartPersisterInterface
{
    private CartPersisterInterface $cartPersister;

    public function __construct(CartPersisterInterface $cartPersister)
    {
        $this->cartPersister = $cartPersister;
    }
}
-----
<?php

namespace Onlishop\Core\Checkout\Cart;

interface CartPersisterInterface {}
abstract class AbstractCartPersister {}

class MyClass extends \Onlishop\Core\Checkout\Cart\AbstractCartPersister
{
    private \Onlishop\Core\Checkout\Cart\AbstractCartPersister $cartPersister;
    public function __construct(\Onlishop\Core\Checkout\Cart\AbstractCartPersister $cartPersister)
    {
        $this->cartPersister = $cartPersister;
    }
}
