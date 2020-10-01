<?php
/**
 * @author Koroph <yjk@outlook.fr | yjkof1596@gmail.com>
 *
 * @website http://koroph.site
 * @link  https://github.com/Koroph
 * @license MIT
 * @copyright Copyright (c) 2020.
 */

namespace PhpRss\Rss\template;


use PhpRss\Rss\type\RssImageType;
use PhpRss\Rss\type\RssInputType;

abstract class RssTemplate
{
    protected function addLink(string $value): string
    {
        return "<link>$value</link>\n";
    }

    protected function addTitle(string $value): string
    {
        return "<title>$value</title>\n";
    }

    protected function addName(string $value): string
    {
        return "<name>$value</name>\n";
    }

    protected function addGuid(string $value, bool $isPermaLink=false): string
    {
        $isPerma = "$isPermaLink";
        return "<guid isPermaLink=\"$isPerma\">$value</guid>\n";
    }

    protected function addPubDate(string $value): string
    {
        return "<pubDate>$value</pubDate>\n";
    }

    protected function addDescription(string $value): string
    {
        return "<description>$value</description>\n";
    }

    protected function addCopyright(string $value): string
    {
        return "<copyright>$value</copyright>\n";
    }

    protected function addLanguage(string $value): string
    {
        return "<language>$value</language>\n";
    }

    protected function addWebMaster(string $value): string
    {
        return "<webMaster>$value</webMaster>\n";
    }

    protected function addGenerator(string $value): string
    {
        return "<generator>$value</generator>\n";
    }

    protected function addCloud(string $domain, string $port, string $path, string $registerProcedure, string $protocol): string
    {
        return "<cloud domain=\"$domain\" port=\"$port\" path=\"$path\" registerProcedure=\"$registerProcedure\" protocol=\"$protocol\"/>\n";
    }

    protected function addDocs(string $url): string
    {
        return "<generator>$url</generator>\n";
    }

    protected function addTtl(int $value): string
    {
        return "<ttl>$value</ttl>\n";
    }

    protected function addSkipDays(string...$days): string
    {
        $content = "";
        foreach ($days as $day) $content .= "<hour>$day</hour>\n";
        return "<skipDays>\n$content</skipDays>\n";
    }

    protected function addSkipHours(int...$hours): string
    {
        $content = "";
        foreach ($hours as $hour) $content .= "<hour>$hour</hour>\n";

        return "<skipHours>\n$content</skipHours>\n";
    }

    protected function addEnclosure(string $url, string $type, string $length = "0"): string
    {
        return "<enclosure url=\"$url\" length=\"$length\" type=\"$type\" />\n";
    }

    protected function addImage(RssImageType $value): string
    {
        $content = "";
        foreach (((array)$value) as $item) if (!empty($item) && !is_null($item)) $content .= $item;
        return "<image>\n$content</image>\n";
    }

    protected function addTextInput(RssInputType $value): string
    {
        $content = "";
        foreach (((array)$value) as $item) if (!empty($item)) $content .= $item;


        return "<textinput>\n$content</textinput>\n";
    }

    protected function addUrl(string $value): string
    {
        return "<url>$value</url>\n";
    }

    protected function addCategory(string...$value): string
    {
        $content = "";
        foreach ($value as $item) if (!empty($item) && is_null($item)) $content = "<category>$item</category>\n";
        return $content;
    }

    protected function addAuthor(string $value): string
    {
        return "<author>$value</author>\n";
    }

    protected function addComments(string $value): string
    {
        return "<comments>$value</comments>\n";
    }

    protected function addManagingEditor(string $value): string
    {
        return "<managingEditor>$value</managingEditor>\n";
    }

    protected function addLastBuildDate(string $value): string
    {
        return "<lastBuildDate>$value</lastBuildDate>\n";
    }

    protected function addWidth(string $value): string
    {
        return "<width>$value</width>\n";
    }

    protected function addHeight(string $value): string
    {
        return "<height>$value</height>\n";
    }

    protected function addSource(string $url, string $domain): string
    {
        return "<source url=\"$url\">$domain</source>\n";
    }

    protected function addAtomLink(string $url){

      return "<atom:link href=\"$url\" rel=\"self\" type=\"application/rss+xml\"/>\n";
    }

    protected function addItem($value): string
    {
        $content = "";
        foreach (((array)$value) as $item) if (!empty($item)) $content .= $item;

        return "<item>\n$content</item>\n";
    }

    protected function structure(string $header, string $items): string
    {
        return "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<rss version=\"2.0\">\n<channel>\n$header\n$items\n</channel>\n</rss>";
    }
}