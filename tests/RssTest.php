<?php
/**
 * @author Koroph <yjk@outlook.fr | yjkof1596@gmail.com>
 *
 * @website http://koroph.site
 * @link  https://github.com/Koroph
 * @license MIT
 * @copyright Copyright (c) 2020.
 */

namespace PhpRss\Rss;


use PhpRss\Rss\type\RssDayType;
use PhpRss\Rss\type\RssImageType;
use PhpRss\Rss\type\RssInputType;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;

class RssTest extends TestCase
{

    public function testRssImage()
    {

        $rssImage = new RssImageType();
        $rssImage->setLink("http://koroph.site");
        $rssImage->setUrl("http://koroph.site/link/image/url");
        $rssImage->setHeight(80);
        $rssImage->setWidth(80);
        var_dump($rssImage);

        self::assertTrue(!is_null($rssImage));
    }

    public function testRssInput()
    {

        $rssInput = new RssInputType();
        $rssInput->setTitle("My application");
        $rssInput->setName("Koroph");
        $rssInput->setLink("http://koroph.site/link");
        $rssInput->setDescription("http://koroph.site");
        var_dump($rssInput);
        self::assertTrue(!is_null($rssInput));
    }

    public function testRssBuilderAdd()
    {

        $builder = new RssBuilder();
        $builder->setTitle("handle blog");
        $builder->setLink("http://koroph.com");
        $builder->setDescription("any articles");
        $builder->setLanguage("en");

        //$builder->setImage($rssImage);

        for ($i = 1; $i < 12; $i++) {
            $rssItem = new RssItem();
            $rssItem->setTitle("Article $i");
            $rssItem->setDescription("Last blog article. $i");
            $rssItem->setAuthor("koroph");
            $rssItem->setEnclosure("http://koroph.site/image/url", "jpg");
            $rssItem->setComments("set my comment");
            $rssItem->setLink("http://koroph.site/link/$i");
            $rssItem->setGuid("http://koroph.site/guid/$i");
            $rssItem->setPubDate("Wed, $i Nov 201$i 13:20:00 GMT");

            $builder->add($rssItem);
        }

        echo $builder->getDocument();


        self::assertTrue(!is_null($builder));
    }
}