<?php
/**
 * @author Koroph <yjk@outlook.fr | yjkof1596@gmail.com>
 *
 * @website http://koroph.site
 * @link  https://github.com/Koroph
 * @license MIT
 * @copyright Copyright (c) 2020.
 */

namespace PhpRss\Rss\type;


use PhpRss\Rss\exception\UrlException;
use PhpRss\Rss\template\RssTemplate;

class RssImageType extends RssTemplate
{
    private $_link;
    private $_url;
    private $_width;
    private $_height;

    public function __construct()
    {
        $this->_width=$this->addWidth(31);
        $this->_height=$this->addWidth(88);
    }

    /**
     * @return string
     */
    public function getLink():string
    {
        return $this->_link;
    }

    /**
     * @param string $link
     *
     * @throws UrlException
     */
    public function setLink(string $link=""): void
    {
		if (filter_var($link, FILTER_VALIDATE_URL))
			$this->_link = $this->addLink($link);
		else throw new UrlException();
    }

    /**
     * @return string
     */
    public function getUrl():string
    {
        return $this->_url;
    }

	/**
	 * @param string $url
	 *
	 * @throws UrlException
	 */
    public function setUrl($url): void
    {
		if (filter_var($url, FILTER_VALIDATE_URL))
			$this->_url = $this->addUrl($url);
		else throw new UrlException("url");
    }

    /**
     * @return string
     */
    public function getWidth(): string
    {
        return $this->_width;
    }

    /**
     * @param int $width
     */
    public function setWidth(int $width): void
    {
        $this->_width = $this->addWidth($width);
    }

    /**
     * @return string
     */
    public function getHeight(): string
    {
        return $this->_height;
    }

    /**
     * @param int $height
     */
    public function setHeight(int $height): void
    {
        $this->_height = $this->addHeight($height);
    }


}