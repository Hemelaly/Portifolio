<?php
/**
 * MembershipRequestDenied.
 * php version 5.6
 *
 * @category MembershipRequestDenied
 * @package  SureTriggers
 * @author   BSF <username@example.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @link     https://www.brainstormforce.com/
 * @since    1.0.0
 */

namespace SureTriggers\Integrations\ProfileGrid\Triggers;

use SureTriggers\Controllers\AutomationController;
use SureTriggers\Traits\SingletonLoader;
use SureTriggers\Integrations\WordPress\WordPress;
use SureTriggers\Integrations\ProfileGrid\ProfileGrid;

if ( ! class_exists( 'MembershipRequestDenied' ) ) :

	/**
	 * MembershipRequestDenied
	 *
	 * @category MembershipRequestDenied
	 * @package  SureTriggers
	 * @author   BSF <username@example.com>
	 * @license  https://www.gnu.org/licenses/gpl-3.0.html GPLv3
	 * @link     https://www.brainstormforce.com/
	 * @since    1.0.0
	 *
	 * @psalm-suppress UndefinedTrait
	 */
	class MembershipRequestDenied {


		/**
		 * Integration type.
		 *
		 * @var string
		 */
		public $integration = 'ProfileGrid';


		/**
		 * Trigger name.
		 *
		 * @var string
		 */
		public $trigger = 'pg_membership_request_denied';

		use SingletonLoader;


		/**
		 * Constructor
		 *
		 * @since  1.0.0
		 */
		public function __construct() {
			add_filter( 'sure_trigger_register_trigger', [ $this, 'register' ] );
		}

		/**
		 * Register action.
		 *
		 * @param array $triggers trigger data.
		 * @return array
		 */
		public function register( $triggers ) {

			$triggers[ $this->integration ][ $this->trigger ] = [
				'label'         => __( 'Membership Request Denied', 'suretriggers' ),
				'action'        => $this->trigger,
				'common_action' => 'pm_user_membership_request_denied',
				'function'      => [ $this, 'trigger_listener' ],
				'priority'      => 10,
				'accepted_args' => 2,
			];

			return $triggers;

		}

		/**
		 * Trigger listener
		 *
		 * @param int $gid Group ID.
		 * @param int $user_id User ID.
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function trigger_listener( $gid, $user_id ) {
			$context             = WordPress::get_user_context( $user_id );
			$context['group_id'] = $gid;
			$context             = array_merge( $context, ProfileGrid::pg_group_details( $gid ) );
			AutomationController::sure_trigger_handle_trigger(
				[
					'trigger' => $this->trigger,
					'context' => $context,
				]
			);
		}
	}

	/**
	 * Ignore false positive
	 *
	 * @psalm-suppress UndefinedMethod
	 */
	MembershipRequestDenied::get_instance();

endif;
