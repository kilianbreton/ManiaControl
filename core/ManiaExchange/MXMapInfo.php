<?php

namespace ManiaControl\ManiaExchange;

use ManiaControl\Utils\Formatter;

/**
 * Mania Exchange Map Info Object
 *
 * @author    Xymph
 * @updated   kremsy <kremsy@maniacontrol.com>
 * @copyright 2014-2020 ManiaControl Team
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class MXMapInfo {
	/*
	 * Public properties
	 */
	public $prefix, $id, $uid, $name, $userid, $author, $uploaded, $updated, $type, $maptype;
	public                                                                          $titlepack, $style, $envir, $mood, $dispcost, $lightmap, $modname, $exever;
	public                                                                          $exebld, $routes, $length, $unlimiter, $laps, $difficulty, $lbrating, $trkvalue;
	public                                                                          $replaytyp, $replayid, $replaycnt, $authorComment, $commentCount, $awards;
	public                                                                          $pageurl, $replayurl, $imageurl, $thumburl, $downloadurl, $dir;
	public                                                                          $ratingVoteCount, $ratingVoteAverage, $vehicleName;

	/**
	 * Returns map object with all available data from MX map data
	 *
	 * @param String $prefix MX URL prefix
	 * @param        $mx
	 * @return \ManiaControl\ManiaExchange\MXMapInfo|void
	 */
	public function __construct($prefix, $mx) {
		$this->prefix = $prefix;

		if (!$mx) {
			return;
		}

		if ($this->prefix === 'tm') {
			$this->dir = 'tracks';
		} else {
			$this->dir = 'maps';
		}
		$this->id  = $mx->MapId;
		$this->uid = $mx->MapUid;

		if (!isset($mx->GbxMapName) || $mx->GbxMapName === '?') {
			$this->name = $mx->Name;
		} else {
			$this->name = Formatter::stripDirtyCodes($mx->GbxMapName);
		}

		//Searching for authors can slow down queries, it may be worth using only the uploader as the author ?
		if (isset($mx->Authors[0]->User)) {
			$this->userid      = $mx->Authors[0]->User->UserId;
			$this->author      = $mx->Authors[0]->User->Name;
		} else {
			$this->userid      = $mx->Uploader->UserId;
			$this->author      = $mx->Uploader->Name;
		}

		$this->uploaded    = isset($mx->UploadedAt) ? $mx->UploadedAt : '';
		$this->updated     = isset($mx->UpdatedAt) ? $mx->UpdatedAt : '';
		$this->type        = isset($mx->Type) ? $mx->Type : '';
		$this->maptype     = isset($mx->MapType) ? $mx->MapType : '';
		$this->titlepack   = isset($mx->TitlePack) ? $mx->TitlePack : '';
		$this->style       = isset($mx->Style) ? $mx->Style : ''; //todo: get name
		$this->envir       = $mx->Environment;
		$this->mood        = $mx->Mood;
		$this->dispcost    = isset($mx->DisplayCost) ? $mx->DisplayCost : '';
		$this->modname     = isset($mx->ModName) ? $mx->ModName : '';
		$this->exever      = isset($mx->ExeVersion) ? $mx->ExeVersion : '';
		$this->exebld      = isset($mx->Exebuild) ? $mx->Exebuild : '';
		$this->length      = isset($mx->Length) ? $mx->Length : '';
		$this->laps        = isset($mx->Laps) ? $mx->Laps : 0;
		$this->difficulty  = $mx->Difficulty;
		$this->replaytyp   = isset($mx->ReplayType) ? $mx->ReplayType : '';
		$this->replayid    = isset($mx->ReplayWR->ReplayId) ? $mx->ReplayWR->ReplayId : 0;
		$this->replaycnt   = isset($mx->ReplayCount) ? $mx->ReplayCount : 0;
		$this->awards      = isset($mx->AwardCount) ? $mx->AwardCount : 0;
		$this->vehicleName = isset($mx->VehicleName) ? $mx->VehicleName : '';
		$this->authorComment = isset($mx->Comments) ? $mx->AuthorComments : '';
		$this->commentCount  = isset($mx->CommentCount) ? $mx->CommentCount : 0;


		//This fields are not available in MX API v2 : =========
		$this->trkvalue    			= 0;
		$this->lightmap    			= '';
		$this->routes      			= '';
		$this->unlimiter   			= false;
		$this->lbrating    			= 0;
		$this->ratingVoteCount   	= 0;
		$this->ratingVoteAverage 	= 0;
		//=====================================================


		if (!$this->trkvalue && $this->lbrating > 0) {
			$this->trkvalue = $this->lbrating;
		} elseif (!$this->lbrating && $this->trkvalue > 0) {
			$this->lbrating = $this->trkvalue;
		}

		$this->pageurl     = 'https://' . $this->prefix . '.mania-exchange.com/' . $this->dir . '/view/' . $this->id;
		$this->downloadurl = 'https://' . $this->prefix . '.mania-exchange.com/mapgbx/' . $this->id;

		//No screenshot available in MX API v2
		$this->imageurl = '';


		if ($mx->HasThumbnail) {
			$this->thumburl = 'https://' . $this->prefix . '.mania-exchange.com/' . 'mapthumb/' . $this->id;
		} else {
			$this->thumburl = '';
		}

		if ($this->prefix === 'tm' && $this->replayid > 0) {
			$this->replayurl = 'https://' . $this->prefix . '.mania-exchange.com/replays/download/' . $this->replayid;
		} else {
			$this->replayurl = '';
		}
	}
}
