<?php

namespace Witty\LaravelTableView\Presenters;

use Witty\LaravelTableView\LaravelTableView;
use Witty\LaravelTableView\Presenters\RoutePresenter;

use Request;

class PerPageDropdownPresenter
{
	/**
     * Options for table view row count
     *
     * @var array
     */
	private static $pageLimitOptions = [10, 25, 50, 100];

	/**
     * Returns <option> tag with appropriate value and select attribute for the specified limit amount
     *
     * @return string
     */
	public static function pageLimitOptions()
	{
		return self::$pageLimitOptions;
	}

	/**
     * Returns <option> tag with appropriate value and select attribute for the specified limit amount
     *
     * @param string $currentPath
     * @param int $optionTagLimit
     * @param int $perPage
     * @return string
     */
	public static function optionTag($currentPath, $optionTagLimit, $perPage)
	{
		$routeParameters = array_merge([
				'page'  => 1,
				'limit' => $optionTagLimit
			], Request::except('page', 'limit') 
		);

		$htmlTag = '<option value="' . RoutePresenter::withParam($currentPath, $routeParameters) . '" ';

		if ( $optionTagLimit == $perPage )
		{
			$htmlTag .= 'selected ';
		}

		return $htmlTag . '>' .  $optionTagLimit . '</option>';
	}
}