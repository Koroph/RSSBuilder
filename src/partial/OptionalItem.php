<?php
/**
 * @author Koroph <yjk@outlook.fr | yjkof1596@gmail.com>
 *
 * @website http://koroph.site
 * @link  https://github.com/Koroph
 * @license MIT
 * @copyright Copyright (c) 2020.
 */

namespace PhpRss\Rss\partial;


use PhpRss\Rss\exception\UrlException;

trait OptionalItem
{

	private $_guid;
	private $_author;
	private $_category;
	private $_comments;
	private $_enclosure;
	private $_source;



	/**
	 * @return string
	 */
	public function getGuid(): string
	{
		return $this->_guid;
	}

	/**
	 * @param string $guid
	 * @param bool $isPermaLink
	 */
	public function setGuid(string $guid,bool $isPermaLink=true): void
	{
		$this->_guid = $this->addGuid($guid,$isPermaLink);
	}

	/**
	 * @return string
	 */
	public function getAuthor():string
	{
		return $this->_author;
	}

	/**
	 * @param string $author
	 */
	public function setAuthor(string $author): void
	{
		$this->_author = $this->addAuthor($author);
	}

	/**
	 * @return string
	 */
	public function getCategory():string
	{
		return $this->_category;
	}

	/**
	 * @param string[] $category
	 */
	public function setCategory(string... $category): void
	{
		$this->_category = $this->addCategory($category);
	}

	/**
	 * @return string
	 */
	public function getComments():string
	{
		return $this->_comments;
	}

	/**
	 * @param string $comments
	 */
	public function setComments(string $comments): void
	{
		$this->_comments = $this->addComments($comments);
	}

	/**
	 * @return string
	 */
	public function getEnclosure():string
	{
		return $this->_enclosure;
	}

	/**
	 * @param string $url
	 * @param string $length
	 * @param string $type
	 *
	 * @throws UrlException
	 */
	public function setEnclosure(string $url,string $length="78645" ,string $type="video/mp4"): void
	{
		if (filter_var($url, FILTER_VALIDATE_URL))
			$this->_enclosure = $this->addEnclosure($url,$length,$type);
		else throw new UrlException();
	}

	/**
	 * @return string
	 */
	public function getSource():string
	{
		return $this->_source;
	}

	/**
	 * @param string $url
	 * @param string $domain
	 *
	 * @throws UrlException
	 */
	public function setSource(string $url,string $domain): void
	{
		if (filter_var($url, FILTER_VALIDATE_URL))
			$this->_source = $this->addSource($url,$domain);
		else throw new UrlException("url");

	}
}