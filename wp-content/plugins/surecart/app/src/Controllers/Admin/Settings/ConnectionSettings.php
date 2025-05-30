<?php

namespace SureCart\Controllers\Admin\Settings;

use SureCart\Models\ApiToken;

/**
 * Controls the settings page.
 */
class ConnectionSettings extends BaseSettings {
	/**
	 * Script handles for pages
	 *
	 * @var array
	 */
	protected $scripts = [
		'show' => [ 'surecart/scripts/admin/connection', 'admin/settings/connection' ],
	];

	/**
	 * Save the page.
	 *
	 * @param \SureCartCore\Requests\RequestInterface $request Request.
	 * @return function
	 */
	public function save( \SureCartCore\Requests\RequestInterface $request ) {
		$url = $request->getHeaderLine( 'Referer' );
		// save token.
		ApiToken::save( $request->body( 'api_token' ) );
		// redirect.
		return \SureCart::redirect()->to( esc_url_raw( add_query_arg( 'status', 'saved', $url ) ) );
	}
}
