<?php

namespace Rector\Php73\Tests\Rector\FuncCall\SensitiveDefineRector;

function sensitiveDefine()
{
    define('FOO', 42, true);
}

?>
-----
<?php

namespace Rector\Php73\Tests\Rector\FuncCall\SensitiveDefineRector;

function sensitiveDefine()
{
    define('FOO', 42);
}

?>
