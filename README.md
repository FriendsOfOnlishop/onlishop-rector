# Rector for Onlishop

This project extends Rector with multiple Rules for Onlishop specific. 

See available [Onlishop rules](/docs/rector_rules_overview.md)


## Install

Make sure to install both `frosh/onlishop-rector` as well as `rector/rector`.

```bash
composer req frosh/onlishop-rector --dev
```

## Use Sets

To add a set to your config, use `FriendsOfOnlishop\Rector\Set\OnlishopSetList` class and pick one of constants:

```php
use Rector\Config\RectorConfig;
use FriendsOfOnlishop\Rector\Set\OnlishopSetList;

return RectorConfig::configure()
    ->withSets([
        OnlishopSetList::ONLISHOP_6_7_0,
    ]);
```

## Use directly the config

```bash
# Clone this repo

composer install

# Dry Run
./vendor/bin/rector process --config config/onlishop-6.7.0.php --autoload-file [ONLISHOP]/vendor/autoload.php [ONLISHOP]/custom/plugins/MyPlugin --dry-run

# Normal Run
./vendor/bin/rector process --config config/onlishop-6.7.0.php --autoload-file [ONLISHOP]/vendor/autoload.php [ONLISHOP]/custom/plugins/MyPlugin
```
