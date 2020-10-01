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

class RssInputType extends RssTemplate
{
	private $_description;
	private $_title;
	private $_name;
	private $_link;

	/**
	 * @return string
	 */
	public function getDescription():string
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
	public function getTitle():string
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
	public function getName():string
	{
		return $this->_name;
	}

    /**
     * @param string $name
     */
	public function setName(string $name): void
	{
		$this->_name = $this->addName($name);
	}

	/**
	 * @return string
	 */
	public function getLink():string
	{
		return $this->_link;
	}

	/**
	 * @param mixed $link
	 *
	 * @throws UrlException
	 */
	public function setLink($link): void
	{
		if (filter_var($link, FILTER_VALIDATE_URL))
			$this->_link = $this->addLink($link);
		else throw new UrlException();

	}

}