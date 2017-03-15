<?php

/*
 * This file is part of Kazist Framework.
 * (c) Dedan Irungu <irungudedan@gmail.com>
 *  For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 * 
 */

/**
 * Description of CalendarController
 *
 * @author sbc
 */

namespace Setup\Calendar\Code\Controllers\Admin;

defined('KAZIST') or exit('Not Kazist Framework');

use Kazist\Controller\BaseController;
use Setup\Calendar\Code\Models\CalendarModel;

class CalendarController extends BaseController {

    public function editAction() {

        $repeated_every = array();
        $repeated_on = array();

        $this->model = new CalendarModel();

        $item = $this->model->getRecord();

        $how_to_repeat_fields = array(
            array('value' => 'daily', 'text' => 'Daily'),
            array('value' => 'weekday', 'text' => 'Weekday'),
            array('value' => 'weekend', 'text' => 'Weekend'),
            array('value' => 'weekly', 'text' => 'Weekly'),
            array('value' => 'monthly', 'text' => 'Monthly'),
            array('value' => 'yearly', 'text' => 'Yearly'),
        );

        for ($x = 1; $x <= 30; $x++) {
            $repeated_every[] = array('value' => $x, 'text' => $x);
        }

        $repeated_on[] = array('value' => '1', 'text' => 'M');
        $repeated_on[] = array('value' => '2', 'text' => 'T');
        $repeated_on[] = array('value' => '3', 'text' => 'W');
        $repeated_on[] = array('value' => '4', 'text' => 'T');
        $repeated_on[] = array('value' => '5', 'text' => 'F');
        $repeated_on[] = array('value' => '6', 'text' => 'S');
        $repeated_on[] = array('value' => '0', 'text' => 'S');


        $data_arr['item'] = $item;
        $data_arr['repeated_on'] = $repeated_on;
        $data_arr['repeated_every'] = $repeated_every;
        $data_arr['how_to_repeat_fields'] = $how_to_repeat_fields;

        $this->html = $this->render('Setup:Calendar:Code:views:admin:edit.index.twig', $data_arr);

        $response = $this->response($this->html);



        return $response;
    }

    public function calendarjsonAction() {
        $this->model = new CalendarModel();
        $calendar_json = $this->model->getCalendarJson();
        echo $calendar_json;
        exit;
    }

}
