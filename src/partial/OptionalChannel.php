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


use PhpRss\Rss\type\RssImageType;
use PhpRss\Rss\type\RssInputType;

trait OptionalChannel
{

	private $_copyright;
	private $_image;
	private $_webMaster;
	private $_language;
	private $_generator;
	private $_category;
	private $_textInput;
	private $_managingEditor;
	private $_lastBuildDate;
	private $_skipHours;
	private $_ttl;
	private $_skipDays;
	private $_docs;
	private $_cloud;

	/**
	 * @return string
	 */
	public function getImage(): string
	{
		return $this->_image;
	}

	/**
	 * @param RssImageType $image
	 */
	public function setImage(RssImageType $image): void
	{
		$this->_image = $this->addImage($image);
	}

	/**
	 * @return mixed
	 */
	public function getCopyright(): string
	{
		return $this->_copyright;
	}

	/**
	 * @param mixed $copyright
	 */
	public function setCopyright($copyright): void
	{
		$this->_copyright = $this->addCopyright($copyright);
	}

	/**
	 * @return string
	 */
	public function getWebMaster(): string
	{
		return $this->_webMaster;
	}

	/**
	 * @param string $webMaster
	 */
	public function setWebMaster(string $webMaster): void
	{
		$this->_webMaster = $this->addWebMaster($webMaster);
	}

	/**
	 * @return string
	 */
	public function getLanguage(): string
	{
		return $this->_language;
	}

	/**
	 * @param string $language
	 */
	public function setLanguage(string $language): void
	{
		$this->_language = $this->addLanguage($language);
	}

	/**
	 * @return string
	 */
	public function getGenerator(): string
	{
		return $this->_generator;
	}

	/**
	 * @param string $generator
	 */
	public function setGenerator(string $generator): void
	{
		$this->_generator = $this->addGenerator($generator);
	}

	/**
	 * @return string
	 */
	public function getCategory(): string
	{
		return $this->_category;
	}

	/**
	 * @param string[] $category
	 */
	public function setCategory(string...$category): void
	{
		$this->_category = $this->addCategory($category);
	}

	/**
	 * @return string
	 */
	public function getTextInput(): string
	{
		return $this->_textInput;
	}

	/**
	 * @param RssInputType $textInput
	 */
	public function setTextInput(RssInputType $textInput): void
	{
		$this->_textInput = $this->addTextInput($textInput);
	}

	/**
	 * @return string
	 */
	public function getManagingEditor(): string
	{
		return $this->_managingEditor;
	}

	/**
	 * @param string $managingEditor
	 */
	public function setManagingEditor(string $managingEditor): void
	{
		$this->_managingEditor = $this->addManagingEditor($managingEditor);
	}

	/**
	 * @return string
	 */
	public function getLastBuildDate(): string
	{
		return $this->_lastBuildDate;
	}

	/**
	 * @param string $lastBuildDate
	 */
	public function setLastBuildDate(string $lastBuildDate): void
	{
		$this->_lastBuildDate = $this->addLastBuildDate($lastBuildDate);
	}

	/**
	 * @return string
	 */
	public function getSkipHours(): string
	{
		return $this->_skipHours;
	}

	/**
	 * @param int[] $Hours
	 */
	public function setSkipHours(int...$Hours): void
	{
		$this->_skipHours = $this->addSkipHours($Hours);
	}

	/**
	 * @return string
	 */
	public function getTtl(): string
	{
		return $this->_ttl;
	}

	/**
	 * @param int $ttl
	 */
	public function setTtl(int $ttl): void
	{
		$this->_ttl = $this->addTtl($ttl);
	}

	/**
	 * @return string
	 */
	public function getSkipDays(): string
	{
		return $this->_skipDays;
	}

	/**
	 * @param string[] $skipDays
	 */
	public function setSkipDays(string...$skipDays): void
	{
		$this->_skipDays = $this->addSkipDays($skipDays);
	}

	/**
	 * @return string
	 */
	public function getDocs(): string
	{
		return $this->_docs;
	}

	/**
	 * @param string $url
	 */
	public function setDocs(string $url): void
	{
		$this->_docs = $this->addDocs($url);
	}

	/**
	 * @return string
	 */
	public function getCloud(): string
	{
		return $this->_cloud;
	}

	/**
	 * @param string $domain
	 * @param string $port
	 * @param string $path
	 * @param string $registerProcedure
	 * @param string $protocol
	 */
	public function setCloud(string $domain, string $port = "80", string $path = "/RPC", string $registerProcedure = "NotifyMe", string $protocol = "xml-rpc"): void
	{
		$this->_cloud = $this->addCloud($domain, $port, $path, $registerProcedure, $protocol);
	}

}