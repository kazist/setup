<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Setup\ Countries\Code\Models;

defined('KAZIST') or exit('Not Kazist Framework');

use Kazist\Model\BaseModel;
use Kazist\KazistFactory;
use Kazist\Service\Database\Query;

/**
 * Description of QuestionModel
 *
 * @author sbc
 */
class CountriesModel extends BaseModel {

    public $limit = 10;

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx Countries 

    public function getCountries() {

        $query = new Query();
        $query->select('sc.*');
        $query->from('#__setup_countries', 'sc');
        $query->orderBy('sc.name');

        $records = $query->loadObjectList();

        return $records;
    }

    public function getCountriesInput() {

        $tmp_array = array();

        $records = $this->getCountries();

        if (!empty($records)) {
            foreach ($records as $record) {
                $tmp_array[] = array('value' => $record->id, 'text' => $record->name);
            }
        }

        return $tmp_array;
    }

    public function getCountriesCode() {

        $tmp_array = array();

        $query = new Query();
        $query->select('sc.*');
        $query->from('#__setup_countries', 'sc');
        $query->orderBy('sc.code');

        $records = $query->loadObjectList();

        if (!empty($records)) {
            foreach ($records as $record) {
                $tmp_array[$record->id] = $record->code;
            }
        }

        return $tmp_array;
    }

}
