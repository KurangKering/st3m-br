<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 13a
 * Rule 13a : mem{rV|V} -> me-m{rV|V}
 */
class DisambiguatorPrefixBrury4 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 13a
     * Rule 13a : mem{rV|V} -> me-m{rV|V}
     */
    public function disambiguate($word)
    {
        $matches  = null;
        $contains = preg_match('/^ng([aiueo])(.*)$/', $word, $matches);

        if ($contains === 1) {
            return 'k' . $matches[1] . $matches[2];
        }
    }
}
