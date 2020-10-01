<?php
/**
 * @author Koroph <yjk@outlook.fr | yjkof1596@gmail.com>
 *
 * @website http://koroph.site
 * @link  https://github.com/Koroph
 * @license MIT
 * @copyright Copyright (c) 2020.
 */

namespace PhpRss\Rss\exception;


use Exception;
use Throwable;

class UrlException extends Exception
{
	public function __construct($field="link")
	{
		$message = "URL invalid, check your $field and restart";
		parent::__construct($message, 0, null);
	}
}