<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Setup\Calendar\Code\Models;

defined('KAZIST') or exit('Not Kazist Framework');

use Kazist\Model\BaseModel;
use Cron\CronExpression;
use Kazist\Service\Session\Session;
use Kazist\Service\System\Callback;
use Kazist\KazistFactory;
use Kazist\Service\Database\Query;

/**
 * Model to get data for the issue list view
 *
 * @since  1.0
 */
class CalendarModel extends BaseModel {

    public $time_object_arr = array();
    public $startDate = '';
    public $from_callback = false;
    public $allDay = false;
    public $endDate = '';
    public $show_link = '';
    public $description = '';
    public $page_url = 'setup.calendar.calendar.edit&id=';
    public $tip_prefix = "Holiday:  \n \n";
    public $color = "#000000";
    public $textColor = "#FFFFFF";

    public function getCalendarJson() {
        $tmparray = array();
        $callback = new Callback();
        $factory = new KazistFactory();


        $a_date = date('Y-m-d');
        $today_date = strtotime(date('Y-m-d'));

        $this->color = '#F56954';
        $this->startDate = $this->request->request->get('start');
        $this->endDate = $this->request->request->get('end');
        $this->description = $this->request->request->get('description');
        $this->show_link = $this->request->request->get('show_link');
        $show_holiday = $this->request->request->get('show_holiday');

        $this->startDate = ($this->startDate <> '') ? date("Y-m-d", $this->startDate) : date("Y-m-1", strtotime($a_date));
        $this->endDate = ($this->endDate <> '') ? date("Y-m-d", $this->endDate) : date("Y-m-t", strtotime($a_date));

        if ($show_holiday <> 'false') {
            $records = $this->getSetupList($this->startDate, $this->endDate);
            $this->getSetupCalendar($records);
        }
        $time_object_arr = $this->time_object_arr;

        $callback->dispatch('onFetchCalendar', 'setup.calendar.calendar', $time_object_arr);
// print_r($this->time_object_arr); exit;

        return json_encode($time_object_arr);
    }

    public function getSetupCalendar($records) {

        if (!empty($records)) { //Monday == 1
            foreach ($records as $item) {

                $start_date = date('Y-m-d', strtotime($item->start_date));
                $start_time = $item->start_time;
                $end_date = date('Y-m-d', strtotime($item->end_date));
                $end_time = $item->end_time;
                $title = $item->title;
                $id = $item->id;
                $this->allDay = (isset($item->allDay)) ? $item->allDay : $this->allDay;
                $this->color = (isset($item->color)) ? $item->color : $this->color;

                if (!isset($item->how_to_repeat) || $item->how_to_repeat == '') {

                    if (!$this->allDay) {
                        $begin = new \DateTime($start_date);
                        $end = new \DateTime($end_date);
                        $interval = \DateInterval::createFromDateString('1 day');
                        $period = new \DatePeriod($begin, $interval, $end);

                        foreach ($period as $dt) {
                            $start_date = $dt->format("Y-m-d");
                            $end_date = $dt->format("Y-m-d");
                            $this->prepareTimeObject($start_date, $start_time, $end_date, $end_time, $title, $id);
                        }
                    } else {
                        $this->prepareTimeObject($start_date, $start_time, $end_date, $end_time, $title, $id);
                    }
                } else {
                    $cron_str = $item->repeated_minute
                            . ' ' . $item->repeated_hour
                            . ' ' . $item->repeated_day_of_month
                            . ' ' . $item->repeated_month
                            . ' ' . $item->repeated_day_of_week
                            . ' ' . $item->repeated_year
                    ;

                    $this->processAllCronMatchingdates($cron_str, $this->startDate, $start_date, $start_time, $end_date, $end_time, $title, $id);
                }
            }
        }

        return $this->time_object_arr;
    }

    public function processAllCronMatchingdates($cron_str, $startDate, $start_date, $start_time, $end_date, $end_time, $title, $id) {
        $cron = CronExpression::factory($cron_str);

        $start_date = $cron->getNextRunDate($startDate)->format('Y-m-d');
        $startDate = $start_date;
        $end_date = $start_date;

        if (strtotime($start_date) > strtotime($this->endDate)) {
            return;
        }

        $this->prepareTimeObject($start_date, $start_time, $end_date, $end_time, $title, $id);
        $this->processAllCronMatchingdates($cron_str, $startDate, $start_date, $start_time, $end_date, $end_time, $title, $id);
    }

    public function prepareTimeObject($start_date, $start_time, $end_date, $end_time, $title, $id) {
        $session = new Session();
        $tmpobject = new \stdClass;
        $kazi_url = $session->get('kazi_url');

        if ($end_date <> '0000-00-00' && $end_date <> '') {
            $tmpobject->start = $start_date . 'T' . $start_time;
            $tmpobject->end = $end_date . 'T' . $end_time;
        } else {
            $tmpobject->start = $start_date . 'T' . $start_time;
            $tmpobject->end = $start_date . 'T' . $end_time;
        }
        $tmpobject->color = $this->color;
        $tmpobject->textColor = $this->textColor;
        $tmpobject->title = $title;
        $tmpobject->tip = $this->tip_prefix . $title;
        $tmpobject->url = $kazi_url->url . $this->page_url . $id;
        $tmpobject->is_active = true;
        $tmpobject->allDay = $this->allDay;

        $this->time_object_arr[] = $tmpobject;
    }

    public function getSetupList($startDate, $endDate) {

        $factory = new KazistFactory();


        $query = new Query();
        $query->select('sc.*');
        $query->from('#__setup_calendar', 'sc');
        $query->where('sc.forever = 1');
        $query->orWhere('sc.start_date >=' . $startDate);
        $query->orWhere('sc.end_date <=' . $endDate);
        $query->setParameter('start_date', $startDate);
        $query->setParameter('end_date', $endDate);

//  print_r((string)$query); exit;
        $records = $query->loadObjectList();

        return $records;
    }

}
