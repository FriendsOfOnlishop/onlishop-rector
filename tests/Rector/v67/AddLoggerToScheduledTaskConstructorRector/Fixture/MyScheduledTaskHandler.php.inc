<?php declare(strict_types=1);

namespace FriendsOfOnlishop\Rector\Tests\Rector\v67\AddLoggerToScheduledTaskConstructorRector\Fixture;

use Onlishop\Core\Framework\DataAbstractionLayer\EntityRepository;
use Onlishop\Core\Framework\MessageQueue\ScheduledTask\ScheduledTaskHandler;

class MyScheduledTaskHandler extends ScheduledTaskHandler
{
    public function __construct(EntityRepository $scheduledTaskRepository) {
        parent::__construct($scheduledTaskRepository);
    }

    public function run(): void {}
}
?>
-----
<?php declare(strict_types=1);

namespace FriendsOfOnlishop\Rector\Tests\Rector\v67\AddLoggerToScheduledTaskConstructorRector\Fixture;

use Psr\Log\LoggerInterface;
use Onlishop\Core\Framework\DataAbstractionLayer\EntityRepository;
use Onlishop\Core\Framework\MessageQueue\ScheduledTask\ScheduledTaskHandler;

class MyScheduledTaskHandler extends ScheduledTaskHandler
{
    public function __construct(EntityRepository $scheduledTaskRepository, LoggerInterface $exceptionLogger) {
        parent::__construct($scheduledTaskRepository, $exceptionLogger);
    }

    public function run(): void {}
}
?>
