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


use PhpRss\Rss\exception\UrlException;
use PhpRss\Rss\partial\OptionalItem;
use PhpRss\Rss\template\RssTemplate;

class RssItem extends RssTemplate
{
    use OptionalItem;

    private $_title;
    private $_link;
    private $_description;
    private $_pubDate;
    private $_enclosure;
    private $_guid;


    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->_title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->_title = $this->addTitle($title);
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->_link;
    }

    /**
     * @param string $link
     *
     * @throws UrlException
     */
    public function setLink(string $link): void
    {
        if (filter_var($link, FILTER_VALIDATE_URL))
            $this->_link = $this->addLink($link);
        else throw new UrlException();
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->_description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->_description = $this->addDescription($description);
    }


    /**
     * @return string
     */
    public function getPubDate(): string
    {
        return $this->_pubDate;
    }

    /**
     * @param string $pubDate
     */
    public function setPubDate(string $pubDate): void
    {
        $this->_pubDate = $this->addPubDate($pubDate);
    }


    /**
     * @return string
     */
    public function getEnclosure()
    {
        return $this->_enclosure;
    }

    /**
     * @param string $url
     * @param string $length
     */
    public function setEnclosure(string $url, string $length = "0"): void
    {
        $this->_enclosure = $this->addEnclosure($url, $this->getUrl($url), $length);
    }

    /**
     * get file extension
     * @param string $url
     * @return false|string
     */
    private function getUrl(string $url)
    {
        try {
            $extension = substr($url, strrpos($url, '.') + 1);
        } catch (\Exception $exception) {
            $extension = "jpg";
        }
        return $extension;
    }

    /**
     * @return string
     */
    public function getGuid()
    {
        return $this->_guid;
    }

    /**
     * @param string $value
     * @param bool $isPermaLink
     */
    public function setGuid(string $value, bool $isPermaLink = false): void
    {
        $this->_guid = $this->addGuid($value, $isPermaLink);
    }

}