<?php

/*
 * This file is part of Mandango.
 *
 * (c) Pablo Díez <pablodip@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Mandango\Tests\Extension;

use Mandango\Tests\TestCase;

class DocumentArrayAccessTest extends TestCase
{
    /**
     * @expectedException \LogicException
     */
    public function testOffsetExists()
    {
        $article = new \Model\Article();
        isset($article['title']);
    }

    public function testOffsetSet()
    {
        $article = new \Model\Article();
        $article['title'] = 'foo';
        $this->assertSame('foo', $article->getTitle());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testOffsetSetNameNotExists()
    {
        $article = new \Model\Article();
        $article['no'] = 'foo';
    }

    public function testOffsetGet()
    {
        $article = new \Model\Article();
        $article->setTitle('bar');
        $this->assertSame('bar', $article['title']);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testOffsetGetNameNotExists()
    {
        $article = new \Model\Article();
        $article['no'];
    }

    /**
     * @expectedException \LogicException
     */
    public function testOffsetUnset()
    {
        $article = new \Model\Article();
        unset($article['title']);
    }
}
