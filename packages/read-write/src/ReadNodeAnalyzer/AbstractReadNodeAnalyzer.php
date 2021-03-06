<?php

declare(strict_types=1);

namespace Rector\ReadWrite\ReadNodeAnalyzer;

use PhpParser\Node\Expr;
use PhpParser\Node\Stmt\Return_;
use Rector\Core\Exception\NotImplementedYetException;
use Rector\Core\NodeFinder\NodeUsageFinder;
use Rector\NodeNestingScope\ParentScopeFinder;
use Rector\NodeTypeResolver\Node\AttributeKey;

abstract class AbstractReadNodeAnalyzer
{
    /**
     * @var ParentScopeFinder
     */
    protected $parentScopeFinder;

    /**
     * @var NodeUsageFinder
     */
    protected $nodeUsageFinder;

    /**
     * @required
     */
    public function autowireAbstractReadNodeAnalyzer(
        ParentScopeFinder $parentScopeFinder,
        NodeUsageFinder $nodeUsageFinder
    ): void {
        $this->parentScopeFinder = $parentScopeFinder;
        $this->nodeUsageFinder = $nodeUsageFinder;
    }

    protected function isCurrentContextRead(Expr $expr): bool
    {
        $parent = $expr->getAttribute(AttributeKey::PARENT_NODE);
        if ($parent instanceof Return_) {
            return true;
        }

        throw new NotImplementedYetException();
    }
}
