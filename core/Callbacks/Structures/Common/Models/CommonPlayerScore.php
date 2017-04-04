<?php

namespace ManiaControl\Callbacks\Structures\Common\Models;


use ManiaControl\General\JsonSerializable;
use ManiaControl\General\JsonSerializeTrait;
use ManiaControl\General\UsageInformationAble;
use ManiaControl\General\UsageInformationTrait;
use ManiaControl\Players\Player;

/**
 * Common PlayerStructure Model
 *
 * @author    ManiaControl Team <mail@maniacontrol.com>
 * @copyright 2014-2017 ManiaControl Team
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class CommonPlayerScore implements UsageInformationAble, JsonSerializable {
	use UsageInformationTrait, JsonSerializeTrait;

	protected $player;
	protected $rank;
	protected $roundPoints;
	protected $mapPoints;

	/**
	 * Returns the Player
	 *
	 * @return \ManiaControl\Players\Player
	 */
	public function getPlayer() {
		return $this->player;
	}

	/**
	 * @param \ManiaControl\Players\Player $player
	 */
	public function setPlayer(Player $player) {
		$this->player = $player;
	}

	/**
	 * Returns the Rank
	 *
	 * @return int
	 */
	public function getRank() {
		return $this->rank;
	}

	/**
	 * Sets the Rank
	 *
	 * @param int $rank
	 */
	public function setRank($rank) {
		$this->rank = $rank;
	}

	/**
	 * Gets the Round Points
	 *
	 * @return int
	 */
	public function getRoundPoints() {
		return $this->roundPoints;
	}

	/**
	 * Sets the RoundPoints
	 *
	 * @param int $roundPoints
	 */
	public function setRoundPoints($roundPoints) {
		$this->roundPoints = $roundPoints;
	}

	/**
	 * Gets the Map Points
	 *
	 * @return int
	 */
	public function getMapPoints() {
		return $this->mapPoints;
	}

	/**
	 * Sets the Map Points
	 *
	 * @param int $mapPoints
	 */
	public function setMapPoints($mapPoints) {
		$this->mapPoints = $mapPoints;
	}

}