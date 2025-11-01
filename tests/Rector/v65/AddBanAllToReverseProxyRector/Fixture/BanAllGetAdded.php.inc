<?php
namespace FriendsOfOnlishop\Rector\Tests\Rector\v65\AddBanAllToReverseProxyRector\Fixture;

class Test extends \Onlishop\Storefront\Framework\Cache\ReverseProxy\AbstractReverseProxyGateway {

}
?>

-----
<?php
namespace FriendsOfOnlishop\Rector\Tests\Rector\v65\AddBanAllToReverseProxyRector\Fixture;

class Test extends \Onlishop\Storefront\Framework\Cache\ReverseProxy\AbstractReverseProxyGateway
{
    public function banAll()
    {
        $this->ban([]);
    }
}
?>
