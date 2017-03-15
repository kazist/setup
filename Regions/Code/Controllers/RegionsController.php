<?php

/*
 * This file is part of Kazist Framework.
 * (c) Dedan Irungu <irungudedan@gmail.com>
 *  For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 * 
 */

/**
 * Description of RegionsController
 *
 * @author sbc
 */

namespace Setup\Regions\Code\Controllers;

defined('KAZIST') or exit('Not Kazist Framework');

use Kazist\Controller\BaseController;
use Setup\Regions\Code\Models\RegionsModel;

class RegionsController extends BaseController {

    public function ajaxloadregionoptionAction() {

        $country_id = $this->request->request->get('country_id');
        $country_code = $this->request->request->get('country_code');

        $this->model = new RegionsModel();
        echo $this->model->loadRegionOption($country_code);

        exit;
    }

}
