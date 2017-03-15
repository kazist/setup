/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var day_of_week_no = '';
var start_date_year = '';
var start_date_month = '';
var start_date_date = '';
var start_date_day_of_week = '';
var start_date_month_name = '';

var days = [
    'Sunday', //Sunday starts at 0
    'Monday',
    'Tuesday',
    'Wednesday',
    'Thursday',
    'Friday',
    'Saturday'
];
var months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December"
];

jQuery(document).ready(function () {
    calendarform.setDatesParameters();
    calendarform.hideAllNonRequired();
    calendarform.changeAdvanceSetting();
    jQuery('#how_to_repeat').change(function () {
        calendarform.hideAllNonRequired();
        calendarform.changeAdvanceSetting();
    });
    jQuery('#start_date').blur(function () {
        calendarform.setDatesParameters();
        calendarform.changeAdvanceSetting();
    });
    jQuery('#repeated_every').change(function () {
        calendarform.changeAdvanceSetting();
    });

    jQuery('form').submit(function () {
        calendarform.changeAdvanceSetting();
    });
    jQuery(".repeated_on-group input[type='checkbox']").on('ifClicked', function () {
        calendarform.changeAdvanceSetting();
    });
});
calendarform = function () {
    return{
        setDatesParameters: function () {
            var start_date = jQuery('#start_date').val().split(" ");
            var date = start_date[0].split("-");

            start_date_year = date[0];
            start_date_month = date[1];
            start_date_date = date[2];

            d = new Date(start_date_year, start_date_month - 1, start_date_date); //This returns Wed Apr 02 2014 17:28:55 GMT+0800 (Malay Peninsula Standard Time)
            day_of_week_no = d.getDay();
            month_no = d.getMonth();

            start_date_day_of_week = days[day_of_week_no];
            start_date_month_name = months[month_no];

            if (!jQuery(".repeated_on-group input").is(':checked')) {
                jQuery(".repeated_on-group input[value=\'" + day_of_week_no + '\']')
                        .attr('checked', 'checked')
                        .closest('div.icheckbox_minimal').addClass('checked')
                        ;
            }
        },
        changeAdvanceSetting: function () {
            var html = '';
            var days_of_week = '';
            var how_to_value = jQuery('#how_to_repeat').val();
            var repeated_every = parseInt(jQuery('#repeated_every').val());

            switch (how_to_value) {
                case 'weekday':
                    html = 'Every Weekday(Monday - Friday)';
                    calendarform.modifyTextInputValues('0', '0', '*', '*', '1-5', '*');
                    break;
                case 'weekend':
                    html = 'Every Weekend(Saturday - Sunday)';
                    calendarform.modifyTextInputValues('0', '0', '*', '*', '0,6,7', '*');
                    break;
                case 'weekly':
                    // jQuery('.repeated_every-group').show();
                    jQuery('.repeated_on-group').show();

                    html = (repeated_every > 1) ? 'Every ' + repeated_every + ' Weeks' : 'Every Week';
                    html += ' On ';

                    jQuery('.repeated_on-group input').each(function () {

                        var day = jQuery(this).val();

                        if (jQuery(this).is(':checked')) {
                            html += (days_of_week == '') ? days[day] : ', ' + days[day];
                            days_of_week += (days_of_week == '') ? day : ', ' + day;
                        }
                    });
                    calendarform.modifyTextInputValues('0', '0', '*', '*', days_of_week, '*');
                    break;
                case 'monthly':
                    jQuery('.repeated_every-group').show();
                    html = (repeated_every > 1) ? 'Every ' + repeated_every + ' Months' : 'Every Month';
                    html += ' On Date ' + start_date_date;
                    month_repeated = (repeated_every > 1) ? '*/' + repeated_every : '*';
                    calendarform.modifyTextInputValues('0', '0', start_date_date, month_repeated, '*', '*');
                    break;
                case 'yearly':
                    jQuery('.repeated_every-group').show();

                    html = (repeated_every > 1) ? 'Every ' + repeated_every + ' Years' : 'Every Year';
                    html += ' On ' + start_date_month_name + ' ' + start_date_date;

                    year_repeated = (repeated_every > 1) ? '*/' + repeated_every : '*';

                    calendarform.modifyTextInputValues('0', '0', start_date_date, start_date_month, '*', year_repeated);
                    break;
                case 'daily':
                default:
                    jQuery('.repeated_every-group').show();
                    html = (repeated_every > 1) ? 'Every ' + repeated_every + ' Days' : 'Every Day';
                    day_repeated = (repeated_every > 1) ? repeated_every + '/3' : '*';
                    calendarform.modifyTextInputValues('0', '0', day_repeated, '*', '*', '*');
                    break;
            }
            jQuery('.summary-group b').html(html);
        }, modifyTextInputValues: function (minute, hour, day_of_month, month, day_of_week, year) {
            jQuery('#repeated_minute').val(minute);
            jQuery('#repeated_hour').val(hour);
            jQuery('#repeated_day_of_month').val(day_of_month);
            jQuery('#repeated_month').val(month);
            jQuery('#repeated_day_of_week').val(day_of_week);
            jQuery('#repeated_year').val(year);
        },
        hideAllNonRequired: function () {
            jQuery('.repeated_every-group').hide().find('select').val('1');
            jQuery('.repeated_on-group').hide();
        }
    };
}();
