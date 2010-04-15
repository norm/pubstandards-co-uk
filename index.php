<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

  <title>Pub Standards: Where beer and web people collide.</title>
  
  <link rel="stylesheet" media="screen" href="screen.css" />
  <link rel="stylesheet" media="print" href="print.css" />
  <meta name="gmapkey" content="ABQIAAAAsa6HaqyPU7-oYY90AGa_PRSjtOhOUsNMrJeAtFim7jFDIZ4JPxSlWfn83-hasU53TTFFKI_a4jz12w" />
    <script
      src="http://n01se.net/gmapez/gmapez-2.js"
      type="text/javascript"></script>
    
</head>

<body>

<div id="container">

<h1><img src="images/mat2.jpg" alt="Pub Standards" /></h1>

<p id="intro">The infamous <em>beer-infused</em>, casual, social, warm, raucous, fine, dandy, monthly <em>London</em> meet-up for <em>web folk</em>.</p>

<p id="intro2">The history of Pub Standards is shrouded in mystery, mythology, folklore, and alcohol-induced amnesia but some say that it was founded in 2005 by a merry band of web pranksters in a scene not too dissimilar from the opening of Kubrick&#8217;s 2001: A Space Odyssey.</p>

<p>Since then, liver-abusing <em>web professionals</em> from every corner of <em>London Towne</em>, and beyond, have descended on the Mecca of web development that is <em>The Bricklayer&#8217;s Arms</em> every <em>middle-Thursday</em> of the month.</p>

<h2>When?</h2>
<p>The <em>middle Thursday</em> of every month. From <em>6.30/7pm</em>. Ish.</p>

<p id="next">Next Pub Standards: Thursday <?

date_default_timezone_set('Europe/London');

function getMiddleDay($day, $month, $year) {
    $thisMonth = mktime(0, 0, 0, $month, 1, $year);

    $daysInMonth = date('t', $thisMonth);
    $middleTimestamp = mktime(0, 0, 0, $month, floor($daysInMonth/2), $year);

    $potentials = array();
    foreach (array(2,3) as $i) {
        $timestamp = strtotime("{$i} {$day}", $thisMonth);
        $potentials[abs($timestamp - $middleTimestamp)] = $timestamp;
    }

    ksort($potentials);
    return array_shift($potentials);
}


$timestamp = getMiddleDay('thursday', date('n'), date('Y'));

if (time() > strtotime('10pm', $timestamp)) {

    // Strtotime is dumb when the number of days in the current month is
    // larger than the next, so drop back to the 28th to avoid this
    $currentTime = time();
    if (date('j') > 28) {
        $currentTime = mktime(date('H'), date('i'), date('s'), date('n'), 28);
    }

    $nextMonth = strtotime('next month', $currentTime);
    $timestamp = getMiddleDay(
        'thursday', 
        date('n', $nextMonth), 
        date('Y', $nextMonth)
    );
}

print date('jS F', $timestamp);

?> <em><span>(</span><?

  $startTime = strtotime('7pm', $timestamp);
  $remaining = $startTime - time();
  if ($remaining <= 0) {
      print "Currently in progress!\n";
  } else {
      $days = floor($remaining / 86400);
      $remaining -= $days * 86400;

      $hours = floor($remaining / 3600);
      $remaining -= $hours * 3600;

      $minutes = ceil($remaining / 60);

    if ($days > 1) { $d_s="s"; }
    if ($hours > 1) { $h_s="s"; }
    
    if ($hours == 0) {
        print "{$days} day".$d_s." until beer!";
    } elseif ($days == 0) {
        print "Only {$hours} hour".$h_s." until beer!";
    } else {
        print "{$days} day".$d_s.", {$hours} hour".$h_s." until beer!";
    }
  }

  
  
  
  
?><span>)</span></em></p>

<h2>Where?</h2>
<p><a href="http://www.fancyapint.com/pubs/pub1292.html">The Bricklayer&#8217;s Arms</a>, Gresse Street, London W1 (just off Tottenham Court Road).</p>

<div class="GMapEZ"><a href="http://maps.google.co.uk/?ie=UTF8&amp;ll=51.517703,-0.133252&amp;spn=0.004066,0.012285&amp;z=17">Map</a></div>

<p>Weather permitting, you&#8217;ll find us loitering outside. Failing that, upstairs is a favourite rally point.</p>

<h2>Who&#8217;s It For?</h2>

<p>Unlike some savagely bigoted groups madly intent on ripping the web community apart, Pub Standards is open to <em>any- and everyone</em> and is as welcoming as a suicide cult recruitment camp.</p>

<p>Loosely aimed at <em>web design/development/programming</em> dogsbodies, that doesn’t mean chitchat need necessarily be web-related. Don&#8217;t expect structure, don&#8217;t expect presentations, just relax with likeminded people. This is the post-conference piss-up without the conference.</p>

<h2>Upcoming, Mailing List and IRC</h2>
<p>The day this web site regularly updates is the day Elvis is seen taking Shergar ice skating in Hell. To keep abreast of the latest events, fun facts, and inane ramblings, sign up to <a href="http://lists.pubstandards.co.uk/listinfo.cgi/beer-pubstandards.co.uk">the mailing list</a> or head over to the IRC channel (<a href="irc://irc.freenode.org/pubstandards">#pubstandards on irc.freenode.net</a>). When someone can be arsed, meet-ups will be thrown <a href="http://upcoming.yahoo.com/group/2997/">on Upcoming</a>.</p>

<p>You can also subscribe to <a href='/calendar.ics'>a list of future Pub Standards dates</a> in your favourite calendar if you want to ensure keeping the day free.</p>

<h2>Substandards</h2>
<p><em>The mid-Pub Standards non-Pub Standards Pub Standards.</em> For the more hardcore, Substandards takes place on the middle Thursday between regular Pub Standards&#8217;.</p>

<p>The rules are that, instead of having a number (like regular Pub Standards) it <em>must have a name</em> (such as Substandards Cervix) and must always be in a <em>different pub</em>. Keep an eye on Upcoming or the mailing list for details, or to add suggestions for names or locations.</p>

</div>

</body>
</html>
