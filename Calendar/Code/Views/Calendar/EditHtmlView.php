<?php

/**
 * @copyright  Copyright (C) 2012 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Setup\Calendar\Views\Calendar;

defined('KAZIST') or exit('Not Kazist Framework');

use Kazicode\View\Edit\EditHtmlView as GeneralEditHtmlView;

/**
 * News HTML view class for the application
 *
 * @since  1.0
 */
class EditHtmlView extends GeneralEditHtmlView {

    /**
     * The model object.
     *
     * @var    NewsModel
     * @since  1.0
     */
    protected $model;

    /**
     * Method to render the view.
     *
     * @return  string  The rendered view.
     *
     * @since   1.0
     * @throws  \RuntimeException
     */
    public function prepare() {
        parent::prepare();

        $repeated_every = array();
        $repeated_on = array();
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


        $this->renderer->set('repeated_on', $repeated_on);
        $this->renderer->set('repeated_every', $repeated_every);
        $this->renderer->set('how_to_repeat_fields', $how_to_repeat_fields);
    }

}
