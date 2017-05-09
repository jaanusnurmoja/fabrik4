<?php

namespace Sabberworm\CSS\Rule;

use Sabberworm\CSS\Value\RuleValueList;
use Sabberworm\CSS\Value\Value;

/**
 * RuleSets contains Rule objects which always have a key and a value.
 * In CSS, Rules are expressed as follows: “key: value[0][0] value[0][1], value[1][0] value[1][1];”
 */
class Rule {

	private $sRule;
	private $mValue;
	private $bIsImportant;

	public function __construct($sRule) {
		$this->sRule = $sRule;
		$this->mValue = null;
		$this->bIsImportant = false;
	}

	public function setRule($sRule) {
		$this->sRule = $sRule;
	}

	public function getRule() {
		return $this->sRule;
	}

	public function getValue() {
		return $this->mValue;
	}

	public function setValue($mValue) {
		$this->mValue = $mValue;
	}

	/**
	 *	@deprecated Old-Style 2-dimensional array given. Retained for (some) backwards-compatibility. Use setValue() instead and wrapp the value inside a RuleValueList if necessary.
	 */
	public function setValues($aSpaceSeparatedValues) {
		$oSpaceSeparatedList = null;
		if (count($aSpaceSeparatedValues) > 1) {
			$oSpaceSeparatedList = new RuleValueList(' ');
		}
		foreach ($aSpaceSeparatedValues as $aCommaSeparatedValues) {
			$oCommaSeparatedList = null;
			if (count($aCommaSeparatedValues) > 1) {
				$oCommaSeparatedList = new RuleValueList(',');
			}
			foreach ($aCommaSeparatedValues as $mValue) {
				if (!$oSpaceSeparatedList && !$oCommaSeparatedList) {
					$this->mValue = $mValue;
					return $mValue;
				}
				if ($oCommaSeparatedList) {
					$oCommaSeparatedList->addListComponent($mValue);
				} else {
					$oSpaceSeparatedList->addListComponent($mValue);
				}
			}
			if (!$oSpaceSeparatedList) {
				$this->mValue = $oCommaSeparatedList;
				return $oCommaSeparatedList;
			} else {
				$oSpaceSeparatedList->addListComponent($oCommaSeparatedList);
			}
		}
		$this->mValue = $oSpaceSeparatedList;
		return $oSpaceSeparatedList;
	}

	/**
	 *	@deprecated Old-Style 2-dimensional array returned. Retained for (some) backwards-compatibility. Use getValue() instead and check for the existance of a (nested set of) ValueList object(s).
	 */
	public function getValues() {
		if (!$this->mValue instanceof RuleValueList) {
			return array(array($this->mValue));
		}
		if ($this->mValue->getListSeparator() === ',') {
			return array($this->mValue->getListComponents());
		}
		$aResult = array();
		foreach ($this->mValue->getListComponents() as $mValue) {
			if (!$mValue instanceof RuleValueList || $mValue->getListSeparator() !== ',') {
				$aResult[] = array($mValue);
				continue;
			}
			if ($this->mValue->getListSeparator() === ' ' || count($aResult) === 0) {
				$aResult[] = array();
			}
			foreach ($mValue->getListComponents() as $mValue) {
				$aResult[count($aResult) - 1][] = $mValue;
			}
		}
		return $aResult;
	}

	/**
	 * Adds a value to the existing value. Value will be appended if a RuleValueList exists of the given type. Otherwise, the existing value will be wrapped by one.
	 */
	public function addValue($mValue, $sType = ' ') {
		if (!is_array($mValue)) {
			$mValue = array($mValue);
		}
		if (!$this->mValue instanceof RuleValueList || $this->mValue->getListSeparator() !== $sType) {
			$mCurrentValue = $this->mValue;
			$this->mValue = new RuleValueList($sType);
			if ($mCurrentValue) {
				$this->mValue->addListComponent($mCurrentValue);
			}
		}
		foreach ($mValue as $mValueItem) {
			$this->mValue->addListComponent($mValueItem);
		}
	}

	public function setIsImportant($bIsImportant) {
		$this->bIsImportant = $bIsImportant;
	}

	public function getIsImportant() {
		return $this->bIsImportant;
	}

	public function __toString() {
		return $this->render(new \Sabberworm\CSS\OutputFormat());
	}

	public function render(\Sabberworm\CSS\OutputFormat $oOutputFormat) {
		$sResult = "{$this->sRule}:{$oOutputFormat->spaceAfterRuleName()}";
		if ($this->mValue instanceof Value) { //Can also be a ValueList
			$sResult .= $this->mValue->render($oOutputFormat);
		} else {
			$sResult .= $this->mValue;
		}
		if ($this->bIsImportant) {
			$sResult .= ' !important';
		}
		$sResult .= ';';
		return $sResult;
	}

}
