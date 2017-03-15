<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Setup\Regions\Code\Models;

defined('KAZIST') or exit('Not Kazist Framework');

use Kazist\Model\BaseModel;
use Kazist\KazistFactory;
use Kazist\Service\Database\Query;

/**
 * Description of QuestionModel
 *
 * @author sbc
 */
class RegionsModel extends BaseModel {

    public $limit = 10;

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx Regions 

    public function getRegions($country_code) {

        $query = new Query();
        $query->select('sr.*');
        $query->from('#__setup_regions', 'sr');
        if ($country_code) {
            $query->where('sr.country=:country');
            $query->setParameter('country', strtoupper($country_code));
        } else {
            $query->where('1=-1');
        }

        $query->orderBy('sr.name');

        $records = $query->loadObjectList();

        return $records;
    }

    public function getRegionsInput($country_id) {

        $tmp_array = array();

        $records = $this->getRegions($country_id);

        if (!empty($records)) {
            foreach ($records as $record) {
                $tmp_array[] = array('value' => $record->id, 'text' => $record->name);
            }
        }

        return $tmp_array;
    }

    public function loadRegionOption($country_code, $location_id) {

        $tmp_array = array();

        $records = $this->getRegions($country_code);

        if (!empty($records)) {
            $tmp_array[] = '<option value=""> -- Select -- </option>';
            foreach ($records as $record) {
                $selected = ($record->id == $location_id) ? 'selected="selected"' : '';
                $tmp_array[] = '<option value="' . $record->id . '" ' . $selected . '>' . $record->name . '</option>';
            }
        }

        return implode('', $tmp_array);
    }

}
