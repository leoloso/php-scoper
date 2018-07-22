<?php

declare(strict_types=1);

/*
 * This file is part of the humbug/php-scoper package.
 *
 * Copyright (c) 2017 Théo FIDRY <theo.fidry@gmail.com>,
 *                    Pádraic Brady <padraic.brady@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [
    'meta' => [
        'title' => 'Static method call statement in the global scope',
        // Default values. If not specified will be the one used
        'prefix' => 'Humbug',
        'whitelist' => [],
        'whitelist-global-constants' => true,
        'whitelist-global-functions' => true,
    ],

    'Static method call statement of a class belonging to the global namespace' => <<<'PHP'
<?php

class Command {}

Command::main();
----
<?php

namespace Humbug;

class Command
{
}
\Humbug\Command::main();

PHP
    ,

    'FQ static method call statement of a class belonging to the global namespace' => <<<'PHP'
<?php

class Command {}

\Command::main();
----
<?php

namespace Humbug;

class Command
{
}
\Humbug\Command::main();

PHP
    ,

    'Static method call statement of an internal class' => <<<'PHP'
<?php

Closure::bind();
----
<?php

namespace Humbug;

\Closure::bind();

PHP
    ,

    'FQ static method call statement of an internal class' => <<<'PHP'
<?php

\Closure::bind();
----
<?php

namespace Humbug;

\Closure::bind();

PHP
    ,
];
