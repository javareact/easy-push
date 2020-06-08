<?php
/**
 * @author Nikolai Kordulla
 */

namespace JavaReact\EasyPush\sdk\geTui\protobuf\type;

use JavaReact\EasyPush\sdk\geTui\protobuf\PBMessage;
class PBScalar extends \JavaReact\EasyPush\sdk\geTui\protobuf\PBMessage
{
	/**
	 * Set scalar value
	 */
	public function set_value($value)
	{	
		$this->value = $value;	
	}

	/**
	 * Get the scalar value
	 */
	public function get_value()
	{
		return $this->value;
	}
}
?>
