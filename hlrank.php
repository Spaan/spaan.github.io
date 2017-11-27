<?php
// Scrape the web page.
$url = "https://www.hotslogs.com/Player/Profile?PlayerID=8334711";
$url_raw_data = file_get_contents($url);

// Convert to a list so easier to find what we are looking for later.
$url_split_data = preg_split("/\n/", $url_raw_data);

// Go through the lines.
foreach ($url_split_data as &$line)
{
  // Find HL Rank
  if (preg_match("/title=\"Hero League\"/", $line))
  {
    // Extract and display the Hero League Rank.
	
    $rank = array();
    preg_match("/<td class=\"rgSorted\">(\d+\.\d+)/", $line, $rank);
    echo "Hero League Rank: ".$rank[1];
  }
}
?>