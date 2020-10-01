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
use PhpRss\Rss\partial\OptionalChannel;
use PhpRss\Rss\template\RssTemplate;

class RssBuilder extends RssTemplate
{
    use OptionalChannel;

    private $_title;
    private $_link;
    private $_description;
    private $_data = [];

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
        if (filter_var($link, FILTER_VALIDATE_URL)) {
            $this->_link = $this->addLink($link);
        } else throw new UrlException();
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
    public function getDocument(): string
    {
        return $this->structure($this->getHeader(), $this->getItems());
    }

    /**
     * @return string
     */
    private function getHeader(): string
    {
        $data = [
            $this->_webMaster,
            $this->_textInput,
            $this->_skipDays,
            $this->_skipHours,
            $this->_category,
            $this->_cloud,
            $this->_copyright,
            $this->_description,
            $this->_docs,
            $this->_generator,
            $this->_image,
            $this->_language,
            $this->_lastBuildDate,
            $this->_managingEditor,
            $this->_link,
            $this->_ttl,
            $this->_title

        ];
        $content = "";
        foreach ($data as $item) if (!empty($item)) $content .= $item;
        return $content;
    }

    /**
     * @return string
     */
    private function getItems(): string
    {
        $items = "";
        foreach ($this->_data as $item) $items .= $this->addItem($item);
        return $items;
    }

    /**
     *
     * @param int $index
     *
     * @return RssItem
     */
    public function get(int $index): RssItem
    {
        return $this->_data[$index];
    }

    /**
     * this method let to add items
     *
     * @param RssItem $data
     */
    public function add(RssItem $data): void
    {
        array_push($this->_data, $data);
    }

    /**
     * this method let to add items
     *
     * @param array $data
     */
    public function addAll(RssItem...$data): void
    {
        array_push($this->_data, $data);
    }

    /**
     * clear all data
     * @return void
     */
    public function clear(): void
    {
        $this->_data = [];
    }


}