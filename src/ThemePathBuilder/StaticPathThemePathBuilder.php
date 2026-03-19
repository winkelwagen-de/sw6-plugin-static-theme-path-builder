<?php

declare(strict_types=1);

namespace Winkelwagen\DeployerThemePathBuilder\ThemePathBuilder;

use Shopware\Core\Framework\Plugin\Exception\DecorationPatternException;
use Shopware\Core\Framework\Util\Hasher;
use Shopware\Storefront\Theme\AbstractThemePathBuilder;

class StaticPathThemePathBuilder extends AbstractThemePathBuilder
{

    public function assemblePath(string $salesChannelId, string $themeId): string
    {
        return $this->generateNewPath($salesChannelId, $themeId, 'not used - hopefully');
    }

    public function generateNewPath(string $salesChannelId, string $themeId, string $seed): string
    {
        $seed = realpath(__DIR__);
        return Hasher::hash($themeId . $salesChannelId . $seed);
    }

    public function saveSeed(string $salesChannelId, string $themeId, string $seed): void
    {
        // no need to save a seed, we use the realpath of installation
    }

    public function getDecorated(): AbstractThemePathBuilder
    {
        throw new DecorationPatternException(self::class);
    }
}
