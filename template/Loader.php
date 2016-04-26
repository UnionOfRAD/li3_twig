<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2010, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

namespace li3_twig\template;

use lithium\util\StringUtil;
use lithium\core\Libraries;

/**
 * View adapter for Twig templating. http://twig-project.org
 *
 * @see lithium\template\view\Renderer
 */
class Loader extends \lithium\core\Object {

	/**
	 * Returns the template paths.
	 *
	 * @param mixed $type
	 * @param array $params
	 * @return mixed
	 */
	public function template($type, array $params = array()) {
		if (!isset($this->_config['paths'][$type])) {
			return null;
		}

		$library = Libraries::get(isset($params['library']) ? $params['library'] : true);
		$params['library'] = $library['path'];

		return array_map(function ($item) use ($params) {
			return StringUtil::insert($item, $params);
		}, (array) $this->_config['paths'][$type]);
	}
}

?>