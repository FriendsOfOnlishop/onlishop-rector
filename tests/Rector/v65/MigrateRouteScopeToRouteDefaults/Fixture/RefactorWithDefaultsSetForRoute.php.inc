<?php
namespace FriendsOfOnlishop\Rector\Tests\Rector\v65\MigrateRouteScopeToRouteDefaults\Fixture;

use Onlishop\Core\Framework\Routing\Annotation\RouteScope;

/**
 * @RouteScope(scopes={"storefront", "api"})
 */
class Controller
{
}
?>

-----
<?php
namespace FriendsOfOnlishop\Rector\Tests\Rector\v65\MigrateRouteScopeToRouteDefaults\Fixture;

use Onlishop\Core\Framework\Routing\Annotation\RouteScope;

/**
 * @Route(defaults={"_routeScope"={"storefront", "api"}})
 */
class Controller
{
}
?>

