<?php

namespace ManiaControl\Callbacks\Structures\ShootMania\Models;


use ManiaControl\General\UsageInformationAble;
use ManiaControl\General\UsageInformationTrait;

/**
 * Landmark Model
 *
 * @author    ManiaControl Team <mail@maniacontrol.com>
 * @copyright 2014-2017 ManiaControl Team
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class Landmark implements UsageInformationAble {
	use UsageInformationTrait;

	private $tag      = "";
	private $order    = 0;
	private $id       = "";
	private $position = null;

	/**
	 * @return string
	 */
	public function getTag() {
		return $this->tag;
	}

	/**
	 * @param string $tag
	 */
	public function setTag($tag) {
		$this->tag = $tag;
	}

	/**
	 * @return mixed
	 */
	public function getOrder() {
		return $this->order;
	}

	/**
	 * @param mixed $order
	 */
	public function setOrder($order) {
		$this->order = $order;
	}

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @return \ManiaControl\Callbacks\Structures\ShootMania\Models\Position
	 */
	public function getPosition() {
		return $this->position;
	}

	/**
	 * @param \ManiaControl\Callbacks\Structures\ShootMania\Models\Position $position
	 */
	public function setPosition(Position $position) {
		$this->position = $position;
	}
}