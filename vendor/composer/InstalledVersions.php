<?php

namespace Composer;

use Composer\Semver\VersionParser;






class InstalledVersions
{
private static $installed = array (
  'root' => 
  array (
    'pretty_version' => '5.8.x-dev',
    'version' => '5.8.9999999.9999999-dev',
    'aliases' => 
    array (
    ),
    'reference' => NULL,
    'name' => 'laravel/laravel',
  ),
  'versions' => 
  array (
    'beyondcode/laravel-dump-server' => 
    array (
      'pretty_version' => '1.3.0',
      'version' => '1.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fcc88fa66895f8c1ff83f6145a5eff5fa2a0739a',
    ),
    'cordoval/hamcrest-php' => 
    array (
      'replaced' => 
      array (
        0 => '*',
      ),
    ),
    'davedevelopment/hamcrest-php' => 
    array (
      'replaced' => 
      array (
        0 => '*',
      ),
    ),
    'dnoegel/php-xdg-base-dir' => 
    array (
      'pretty_version' => 'v0.1.1',
      'version' => '0.1.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '8f8a6e48c5ecb0f991c2fdcf5f154a47d85f9ffd',
    ),
    'doctrine/inflector' => 
    array (
      'pretty_version' => '1.4.3',
      'version' => '1.4.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '4650c8b30c753a76bf44fb2ed00117d6f367490c',
    ),
    'doctrine/instantiator' => 
    array (
      'pretty_version' => '1.3.1',
      'version' => '1.3.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f350df0268e904597e3bd9c4685c53e0e333feea',
    ),
    'doctrine/lexer' => 
    array (
      'pretty_version' => '1.2.1',
      'version' => '1.2.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e864bbf5904cb8f5bb334f99209b48018522f042',
    ),
    'dragonmantank/cron-expression' => 
    array (
      'pretty_version' => 'v2.3.1',
      'version' => '2.3.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '65b2d8ee1f10915efb3b55597da3404f096acba2',
    ),
    'egulias/email-validator' => 
    array (
      'pretty_version' => '2.1.22',
      'version' => '2.1.22.0',
      'aliases' => 
      array (
      ),
      'reference' => '68e418ec08fbfc6f58f6fd2eea70ca8efc8cc7d5',
    ),
    'erusev/parsedown' => 
    array (
      'pretty_version' => '1.7.4',
      'version' => '1.7.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'cb17b6477dfff935958ba01325f2e8a2bfa6dab3',
    ),
    'fideloper/proxy' => 
    array (
      'pretty_version' => '4.4.1',
      'version' => '4.4.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c073b2bd04d1c90e04dc1b787662b558dd65ade0',
    ),
    'filp/whoops' => 
    array (
      'pretty_version' => '2.9.0',
      'version' => '2.9.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '2ec31f3adc54c71a59c5e3c2143d7a0e2f8899f8',
    ),
    'fzaninotto/faker' => 
    array (
      'pretty_version' => 'v1.9.1',
      'version' => '1.9.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fc10d778e4b84d5bd315dad194661e091d307c6f',
    ),
    'hamcrest/hamcrest-php' => 
    array (
      'pretty_version' => 'v2.0.1',
      'version' => '2.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '8c3d0a3f6af734494ad8f6fbbee0ba92422859f3',
    ),
    'illuminate/auth' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/broadcasting' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/bus' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/cache' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/config' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/console' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/container' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/contracts' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/cookie' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/database' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/encryption' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/events' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/filesystem' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/hashing' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/http' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/log' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/mail' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/notifications' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/pagination' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/pipeline' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/queue' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/redis' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/routing' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/session' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/support' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/translation' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/validation' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'illuminate/view' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.8.38',
      ),
    ),
    'jakub-onderka/php-console-color' => 
    array (
      'pretty_version' => 'v0.2',
      'version' => '0.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd5deaecff52a0d61ccb613bb3804088da0307191',
    ),
    'jakub-onderka/php-console-highlighter' => 
    array (
      'pretty_version' => 'v0.4',
      'version' => '0.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '9f7a229a69d52506914b4bc61bfdb199d90c5547',
    ),
    'kodova/hamcrest-php' => 
    array (
      'replaced' => 
      array (
        0 => '*',
      ),
    ),
    'laravel/framework' => 
    array (
      'pretty_version' => 'v5.8.38',
      'version' => '5.8.38.0',
      'aliases' => 
      array (
      ),
      'reference' => '78eb4dabcc03e189620c16f436358d41d31ae11f',
    ),
    'laravel/laravel' => 
    array (
      'pretty_version' => '5.8.x-dev',
      'version' => '5.8.9999999.9999999-dev',
      'aliases' => 
      array (
      ),
      'reference' => NULL,
    ),
    'laravel/tinker' => 
    array (
      'pretty_version' => 'v1.0.10',
      'version' => '1.0.10.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ad571aacbac1539c30d480908f9d0c9614eaf1a7',
    ),
    'league/flysystem' => 
    array (
      'pretty_version' => '1.1.3',
      'version' => '1.1.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '9be3b16c877d477357c015cec057548cf9b2a14a',
    ),
    'league/mime-type-detection' => 
    array (
      'pretty_version' => '1.5.1',
      'version' => '1.5.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '353f66d7555d8a90781f6f5e7091932f9a4250aa',
    ),
    'mockery/mockery' => 
    array (
      'pretty_version' => '1.3.3',
      'version' => '1.3.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '60fa2f67f6e4d3634bb4a45ff3171fa52215800d',
    ),
    'monolog/monolog' => 
    array (
      'pretty_version' => '1.25.5',
      'version' => '1.25.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '1817faadd1846cd08be9a49e905dc68823bc38c0',
    ),
    'myclabs/deep-copy' => 
    array (
      'pretty_version' => '1.10.1',
      'version' => '1.10.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '969b211f9a51aa1f6c01d1d2aef56d3bd91598e5',
      'replaced' => 
      array (
        0 => '1.10.1',
      ),
    ),
    'nesbot/carbon' => 
    array (
      'pretty_version' => '2.41.4',
      'version' => '2.41.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '6571aec754a648ef476a8d8f57993f7bc965afe4',
    ),
    'nikic/php-parser' => 
    array (
      'pretty_version' => 'v4.10.2',
      'version' => '4.10.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '658f1be311a230e0907f5dfe0213742aff0596de',
    ),
    'nunomaduro/collision' => 
    array (
      'pretty_version' => 'v3.0.1',
      'version' => '3.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'af42d339fe2742295a54f6fdd42aaa6f8c4aca68',
    ),
    'opis/closure' => 
    array (
      'pretty_version' => '3.6.0',
      'version' => '3.6.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c547f8262a5fa9ff507bd06cc394067b83a75085',
    ),
    'paragonie/random_compat' => 
    array (
      'pretty_version' => 'v9.99.99',
      'version' => '9.99.99.0',
      'aliases' => 
      array (
      ),
      'reference' => '84b4dfb120c6f9b4ff7b3685f9b8f1aa365a0c95',
    ),
    'phar-io/manifest' => 
    array (
      'pretty_version' => '1.0.3',
      'version' => '1.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '7761fcacf03b4d4f16e7ccb606d4879ca431fcf4',
    ),
    'phar-io/version' => 
    array (
      'pretty_version' => '2.0.1',
      'version' => '2.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '45a2ec53a73c70ce41d55cedef9063630abaf1b6',
    ),
    'phpdocumentor/reflection-common' => 
    array (
      'pretty_version' => '2.2.0',
      'version' => '2.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '1d01c49d4ed62f25aa84a747ad35d5a16924662b',
    ),
    'phpdocumentor/reflection-docblock' => 
    array (
      'pretty_version' => '5.2.2',
      'version' => '5.2.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '069a785b2141f5bcf49f3e353548dc1cce6df556',
    ),
    'phpdocumentor/type-resolver' => 
    array (
      'pretty_version' => '1.4.0',
      'version' => '1.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '6a467b8989322d92aa1c8bf2bebcc6e5c2ba55c0',
    ),
    'phpoption/phpoption' => 
    array (
      'pretty_version' => '1.7.5',
      'version' => '1.7.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '994ecccd8f3283ecf5ac33254543eb0ac946d525',
    ),
    'phpspec/prophecy' => 
    array (
      'pretty_version' => '1.12.1',
      'version' => '1.12.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '8ce87516be71aae9b956f81906aaf0338e0d8a2d',
    ),
    'phpunit/php-code-coverage' => 
    array (
      'pretty_version' => '6.1.4',
      'version' => '6.1.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '807e6013b00af69b6c5d9ceb4282d0393dbb9d8d',
    ),
    'phpunit/php-file-iterator' => 
    array (
      'pretty_version' => '2.0.2',
      'version' => '2.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '050bedf145a257b1ff02746c31894800e5122946',
    ),
    'phpunit/php-text-template' => 
    array (
      'pretty_version' => '1.2.1',
      'version' => '1.2.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '31f8b717e51d9a2afca6c9f046f5d69fc27c8686',
    ),
    'phpunit/php-timer' => 
    array (
      'pretty_version' => '2.1.2',
      'version' => '2.1.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '1038454804406b0b5f5f520358e78c1c2f71501e',
    ),
    'phpunit/php-token-stream' => 
    array (
      'pretty_version' => '3.1.1',
      'version' => '3.1.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '995192df77f63a59e47f025390d2d1fdf8f425ff',
    ),
    'phpunit/phpunit' => 
    array (
      'pretty_version' => '7.5.20',
      'version' => '7.5.20.0',
      'aliases' => 
      array (
      ),
      'reference' => '9467db479d1b0487c99733bb1e7944d32deded2c',
    ),
    'psr/container' => 
    array (
      'pretty_version' => '1.0.0',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b7ce3b176482dbbc1245ebf52b181af44c2cf55f',
    ),
    'psr/event-dispatcher-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'psr/log' => 
    array (
      'pretty_version' => '1.1.3',
      'version' => '1.1.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '0f73288fd15629204f9d42b7055f72dacbe811fc',
    ),
    'psr/log-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
        1 => '1.0.0',
      ),
    ),
    'psr/simple-cache' => 
    array (
      'pretty_version' => '1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '408d5eafb83c57f6365a3ca330ff23aa4a5fa39b',
    ),
    'psy/psysh' => 
    array (
      'pretty_version' => 'v0.9.12',
      'version' => '0.9.12.0',
      'aliases' => 
      array (
      ),
      'reference' => '90da7f37568aee36b116a030c5f99c915267edd4',
    ),
    'ramsey/uuid' => 
    array (
      'pretty_version' => '3.9.3',
      'version' => '3.9.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '7e1633a6964b48589b142d60542f9ed31bd37a92',
    ),
    'rhumsaa/uuid' => 
    array (
      'replaced' => 
      array (
        0 => '3.9.3',
      ),
    ),
    'sebastian/code-unit-reverse-lookup' => 
    array (
      'pretty_version' => '1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '4419fcdb5eabb9caa61a27c7a1db532a6b55dd18',
    ),
    'sebastian/comparator' => 
    array (
      'pretty_version' => '3.0.2',
      'version' => '3.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '5de4fc177adf9bce8df98d8d141a7559d7ccf6da',
    ),
    'sebastian/diff' => 
    array (
      'pretty_version' => '3.0.2',
      'version' => '3.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '720fcc7e9b5cf384ea68d9d930d480907a0c1a29',
    ),
    'sebastian/environment' => 
    array (
      'pretty_version' => '4.2.3',
      'version' => '4.2.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '464c90d7bdf5ad4e8a6aea15c091fec0603d4368',
    ),
    'sebastian/exporter' => 
    array (
      'pretty_version' => '3.1.2',
      'version' => '3.1.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '68609e1261d215ea5b21b7987539cbfbe156ec3e',
    ),
    'sebastian/global-state' => 
    array (
      'pretty_version' => '2.0.0',
      'version' => '2.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e8ba02eed7bbbb9e59e43dedd3dddeff4a56b0c4',
    ),
    'sebastian/object-enumerator' => 
    array (
      'pretty_version' => '3.0.3',
      'version' => '3.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '7cfd9e65d11ffb5af41198476395774d4c8a84c5',
    ),
    'sebastian/object-reflector' => 
    array (
      'pretty_version' => '1.1.1',
      'version' => '1.1.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '773f97c67f28de00d397be301821b06708fca0be',
    ),
    'sebastian/recursion-context' => 
    array (
      'pretty_version' => '3.0.0',
      'version' => '3.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '5b0cd723502bac3b006cbf3dbf7a1e3fcefe4fa8',
    ),
    'sebastian/resource-operations' => 
    array (
      'pretty_version' => '2.0.1',
      'version' => '2.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '4d7a795d35b889bf80a0cc04e08d77cedfa917a9',
    ),
    'sebastian/version' => 
    array (
      'pretty_version' => '2.0.1',
      'version' => '2.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '99732be0ddb3361e16ad77b68ba41efc8e979019',
    ),
    'swiftmailer/swiftmailer' => 
    array (
      'pretty_version' => 'v6.2.3',
      'version' => '6.2.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '149cfdf118b169f7840bbe3ef0d4bc795d1780c9',
    ),
    'symfony/console' => 
    array (
      'pretty_version' => 'v4.4.15',
      'version' => '4.4.15.0',
      'aliases' => 
      array (
      ),
      'reference' => '90933b39c7b312fc3ceaa1ddeac7eb48cb953124',
    ),
    'symfony/css-selector' => 
    array (
      'pretty_version' => 'v5.1.7',
      'version' => '5.1.7.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e544e24472d4c97b2d11ade7caacd446727c6bf9',
    ),
    'symfony/debug' => 
    array (
      'pretty_version' => 'v4.4.15',
      'version' => '4.4.15.0',
      'aliases' => 
      array (
      ),
      'reference' => '726b85e69342e767d60e3853b98559a68ff74183',
    ),
    'symfony/error-handler' => 
    array (
      'pretty_version' => 'v4.4.15',
      'version' => '4.4.15.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c8be4a5c70af70fec82e762dd93e3bbcf95c035f',
    ),
    'symfony/event-dispatcher' => 
    array (
      'pretty_version' => 'v4.4.15',
      'version' => '4.4.15.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e17bb5e0663dc725f7cdcafc932132735b4725cd',
    ),
    'symfony/event-dispatcher-contracts' => 
    array (
      'pretty_version' => 'v1.1.9',
      'version' => '1.1.9.0',
      'aliases' => 
      array (
      ),
      'reference' => '84e23fdcd2517bf37aecbd16967e83f0caee25a7',
    ),
    'symfony/event-dispatcher-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.1',
      ),
    ),
    'symfony/finder' => 
    array (
      'pretty_version' => 'v4.4.15',
      'version' => '4.4.15.0',
      'aliases' => 
      array (
      ),
      'reference' => '60d08560f9aa72997c44077c40d47aa28a963230',
    ),
    'symfony/http-client-contracts' => 
    array (
      'pretty_version' => 'v2.3.1',
      'version' => '2.3.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '41db680a15018f9c1d4b23516059633ce280ca33',
    ),
    'symfony/http-foundation' => 
    array (
      'pretty_version' => 'v4.4.15',
      'version' => '4.4.15.0',
      'aliases' => 
      array (
      ),
      'reference' => '10683b407c3b6087c64619ebc97a87e36ea62c92',
    ),
    'symfony/http-kernel' => 
    array (
      'pretty_version' => 'v4.4.15',
      'version' => '4.4.15.0',
      'aliases' => 
      array (
      ),
      'reference' => '6544745997b06c7dcecf0d4a70f09e5de1db7ca8',
    ),
    'symfony/mime' => 
    array (
      'pretty_version' => 'v5.1.7',
      'version' => '5.1.7.0',
      'aliases' => 
      array (
      ),
      'reference' => '4404d6545125863561721514ad9388db2661eec5',
    ),
    'symfony/polyfill-ctype' => 
    array (
      'pretty_version' => 'v1.18.1',
      'version' => '1.18.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '1c302646f6efc070cd46856e600e5e0684d6b454',
    ),
    'symfony/polyfill-iconv' => 
    array (
      'pretty_version' => 'v1.18.1',
      'version' => '1.18.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '6c2f78eb8f5ab8eaea98f6d414a5915f2e0fce36',
    ),
    'symfony/polyfill-intl-idn' => 
    array (
      'pretty_version' => 'v1.18.1',
      'version' => '1.18.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '5dcab1bc7146cf8c1beaa4502a3d9be344334251',
    ),
    'symfony/polyfill-intl-normalizer' => 
    array (
      'pretty_version' => 'v1.18.1',
      'version' => '1.18.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '37078a8dd4a2a1e9ab0231af7c6cb671b2ed5a7e',
    ),
    'symfony/polyfill-mbstring' => 
    array (
      'pretty_version' => 'v1.18.1',
      'version' => '1.18.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a6977d63bf9a0ad4c65cd352709e230876f9904a',
    ),
    'symfony/polyfill-php70' => 
    array (
      'pretty_version' => 'v1.18.1',
      'version' => '1.18.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '0dd93f2c578bdc9c72697eaa5f1dd25644e618d3',
    ),
    'symfony/polyfill-php72' => 
    array (
      'pretty_version' => 'v1.18.1',
      'version' => '1.18.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '639447d008615574653fb3bc60d1986d7172eaae',
    ),
    'symfony/polyfill-php73' => 
    array (
      'pretty_version' => 'v1.18.1',
      'version' => '1.18.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fffa1a52a023e782cdcc221d781fe1ec8f87fcca',
    ),
    'symfony/polyfill-php80' => 
    array (
      'pretty_version' => 'v1.18.1',
      'version' => '1.18.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd87d5766cbf48d72388a9f6b85f280c8ad51f981',
    ),
    'symfony/process' => 
    array (
      'pretty_version' => 'v4.4.15',
      'version' => '4.4.15.0',
      'aliases' => 
      array (
      ),
      'reference' => '9b887acc522935f77555ae8813495958c7771ba7',
    ),
    'symfony/routing' => 
    array (
      'pretty_version' => 'v4.4.15',
      'version' => '4.4.15.0',
      'aliases' => 
      array (
      ),
      'reference' => '006b2d06672b8650998f328fc603eb6f3feb979f',
    ),
    'symfony/service-contracts' => 
    array (
      'pretty_version' => 'v2.2.0',
      'version' => '2.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd15da7ba4957ffb8f1747218be9e1a121fd298a1',
    ),
    'symfony/translation' => 
    array (
      'pretty_version' => 'v4.4.15',
      'version' => '4.4.15.0',
      'aliases' => 
      array (
      ),
      'reference' => '8494fa1bbf9d77fe1e7d50ac8ccfb80a858a98bd',
    ),
    'symfony/translation-contracts' => 
    array (
      'pretty_version' => 'v2.3.0',
      'version' => '2.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e2eaa60b558f26a4b0354e1bbb25636efaaad105',
    ),
    'symfony/translation-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'symfony/var-dumper' => 
    array (
      'pretty_version' => 'v4.4.15',
      'version' => '4.4.15.0',
      'aliases' => 
      array (
      ),
      'reference' => '0dc22bdf9d1197467bb04d505355180b6f20bcca',
    ),
    'theseer/tokenizer' => 
    array (
      'pretty_version' => '1.2.0',
      'version' => '1.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '75a63c33a8577608444246075ea0af0d052e452a',
    ),
    'tijsverkoyen/css-to-inline-styles' => 
    array (
      'pretty_version' => '2.2.3',
      'version' => '2.2.3.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b43b05cf43c1b6d849478965062b6ef73e223bb5',
    ),
    'vlucas/phpdotenv' => 
    array (
      'pretty_version' => 'v3.6.7',
      'version' => '3.6.7.0',
      'aliases' => 
      array (
      ),
      'reference' => '2065beda6cbe75e2603686907b2e45f6f3a5ad82',
    ),
    'webmozart/assert' => 
    array (
      'pretty_version' => '1.9.1',
      'version' => '1.9.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'bafc69caeb4d49c39fd0779086c03a3738cbb389',
    ),
  ),
);







public static function getInstalledPackages()
{
return array_keys(self::$installed['versions']);
}









public static function isInstalled($packageName)
{
return isset(self::$installed['versions'][$packageName]);
}














public static function satisfies(VersionParser $parser, $packageName, $constraint)
{
$constraint = $parser->parseConstraints($constraint);
$provided = $parser->parseConstraints(self::getVersionRanges($packageName));

return $provided->matches($constraint);
}










public static function getVersionRanges($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

$ranges = array();
if (isset(self::$installed['versions'][$packageName]['pretty_version'])) {
$ranges[] = self::$installed['versions'][$packageName]['pretty_version'];
}
if (array_key_exists('aliases', self::$installed['versions'][$packageName])) {
$ranges = array_merge($ranges, self::$installed['versions'][$packageName]['aliases']);
}
if (array_key_exists('replaced', self::$installed['versions'][$packageName])) {
$ranges = array_merge($ranges, self::$installed['versions'][$packageName]['replaced']);
}
if (array_key_exists('provided', self::$installed['versions'][$packageName])) {
$ranges = array_merge($ranges, self::$installed['versions'][$packageName]['provided']);
}

return implode(' || ', $ranges);
}





public static function getVersion($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

if (!isset(self::$installed['versions'][$packageName]['version'])) {
return null;
}

return self::$installed['versions'][$packageName]['version'];
}





public static function getPrettyVersion($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

if (!isset(self::$installed['versions'][$packageName]['pretty_version'])) {
return null;
}

return self::$installed['versions'][$packageName]['pretty_version'];
}





public static function getReference($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

if (!isset(self::$installed['versions'][$packageName]['reference'])) {
return null;
}

return self::$installed['versions'][$packageName]['reference'];
}





public static function getRootPackage()
{
return self::$installed['root'];
}







public static function getRawData()
{
return self::$installed;
}



















public static function reload($data)
{
self::$installed = $data;
}
}
