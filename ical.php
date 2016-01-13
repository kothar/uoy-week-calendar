<?php
  $terms = array(
    "11 January 2010" => "Spring",
    "26 April 2010" => "Summer",
    
	"11 October 2010" => "Autumn",
	"10 January 2011" => "Spring",
	"27 April 2011" => "Summer",
	
	"10 October 2011" => "Autumn",
	"9 January 2012" => "Spring",
	"23 April 2012" => "Summer",
	
	"8 October 2012" => "Autumn",
	"7 January 2013" => "Spring",
	"22 April 2013" => "Summer",
	
	"30 September 2013" => "Autumn",
	"6 January 2014" => "Spring",
	"22 April 2014" => "Summer",
	
	"29 September 2014" => "Autumn",
	"5 January 2015" => "Spring",
	"13 April 2015" => "Summer",
	
	"28 September 2015" => "Autumn",
	"4 January 2016" => "Spring",
	"11 April 2016" => "Summer",
	
	"26 September 2016" => "Autumn",
	"9 January 2017" => "Spring",
	"18 April 2017" => "Summer",
	
	"25 September 2017" => "Autumn",
	"8 January 2018" => "Spring",
	"16 April 2018" => "Summer"
	);
	
  //header('Content-type: text/calendar;name="term-dates.ics"');
  header('Content-type: text/plain');
?>
BEGIN:VCALENDAR
PRODID:-//schmeeky.co.uk/York Term Dates//NONSGML v1.0//EN
VERSION:2.0
CALSCALE:GREGORIAN
METHOD:PUBLISH
X-WR-CALNAME:University of York Week Numbers (Monday)
X-WR-TIMEZONE:Europe/London
X-WR-CALDESC:

<?php
  foreach ($terms as $term => $name) {
    $week = 1;
    $date = strtotime($term);
    
    while ($week <= 10) {
?>
BEGIN:VEVENT
DTSTART;VALUE=DATE:<?php echo date("Ymd", $date); ?>

DTEND;VALUE=DATE:<?php echo date("Ymd", strtotime("+ 1 day", $date)); ?>

X-GOOGLE-CALENDAR-CONTENT-ICON:http://www.schmeeky.co.uk/weeks/week<?php echo $week; ?>.png
X-GOOGLE-CALENDAR-CONTENT-WIDTH:205
X-GOOGLE-CALENDAR-CONTENT-HEIGHT:50
X-GOOGLE-CALENDAR-CONTENT-TYPE:text/html
X-GOOGLE-CALENDAR-CONTENT-TITLE:Week <?php echo $week; ?>

SUMMARY:<?php echo $name; ?> Term Week <?php echo $week; ?>

TRANSP:OPAQUE
END:VEVENT

<?php
      $week ++;
      $date = strtotime("next monday", $date);
    }
  }
?>

END:VCALENDAR
