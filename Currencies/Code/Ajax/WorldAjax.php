<?php

/**
 * @copyright  Copyright (C) 2012 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Setup\World\Ajax;

defined('KAZIST') or exit('Not Kazist Framework');

use Setup\World\Models\WorldModel;
use Kazist\KazistFactory;

/**
 * Dashboard Controller class for the Application
 *
 * @since  1.0
 */
class WorldAjax {

    /**
     * Save functions
     *
     * @return  void
     *
     * @since   1.0
     * @throws  \RuntimeException
     */
    public function ajaxloadregionoption() {

        $factory = new KazistFactory();
        $input = $factory->getInput();
        $db = $factory->getDbo();
        $country_id = $this->request->request->get('country_id');
        $location_id = $this->request->request->get('location_id');

        $worldModel = new WorldModel($input, $db);
        echo $worldModel->loadRegionOption($country_id, $location_id);

        exit;
    }

}
