<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Modified using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace KadenceWP\KadenceBlocks\Symfony\Component\HttpClient\Internal;

use Amp\Dns;
use Amp\Dns\Record;
use Amp\Promise;
use Amp\Success;

/**
 * Handles local overrides for the DNS resolver.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 *
 * @internal
 */
class AmpResolver implements Dns\Resolver
{
    private $dnsMap;

    public function __construct(array &$dnsMap)
    {
        $this->dnsMap = &$dnsMap;
    }

    public function resolve(string $name, ?int $typeRestriction = null): Promise
    {
        $recordType = Record::A;
        $ip = $this->dnsMap[$name] ?? null;

        if (null !== $ip && str_contains($ip, ':')) {
            $recordType = Record::AAAA;
        }
        if (null === $ip || $recordType !== ($typeRestriction ?? $recordType)) {
            return Dns\resolver()->resolve($name, $typeRestriction);
        }

        return new Success([new Record($ip, $recordType, null)]);
    }

    public function query(string $name, int $type): Promise
    {
        $recordType = Record::A;
        $ip = $this->dnsMap[$name] ?? null;

        if (null !== $ip && str_contains($ip, ':')) {
            $recordType = Record::AAAA;
        }
        if (null === $ip || $recordType !== $type) {
            return Dns\resolver()->query($name, $type);
        }

        return new Success([new Record($ip, $recordType, null)]);
    }
}
