<?php
// This file is part of Moodle Course Rollover Plugin
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * @package     local_tawkto
 * @author      Stefan Schoch
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */



// call each time at: _before_footer
function local_tawkto_before_footer() {
    global $USER;
	$fname = $USER->firstname;
	$lname = $USER->lastname;
	$email = $USER->email;
	$tawkto = 'https://embed.tawk.to/';
	$widgetlink = '';
	
// get widget-Link 
	$widgetlink = get_config('local_tawkto', 'widgetlink');
	
// print debug messages to console?
    if (get_config('local_tawkto', 'debug')) {
		echo '<script type="text/javascript">
			console.log ("Link: '.$tawkto.$widgetlink.'");
			console.log ("Name: '.$fname.' '.$lname.'");
			console.log ("Email: '.$email.'");
			</script>';
	}

	
// enable widget?
    if (!get_config('local_tawkto', 'enabled')) {
        return;
    }
	
	
// create the Tawk.to JS code
echo '<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
Tawk_API.visitor = {
name : "'.$fname.' '.$lname.'",
email : "'.$email.'"
};
var Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src="'.$tawkto.$widgetlink.'";
s1.charset="UTF-8";
s1.setAttribute("crossorigin","*");
s0.parentNode.insertBefore(s1,s0);
})();
</script>';
}
