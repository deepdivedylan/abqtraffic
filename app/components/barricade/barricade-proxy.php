<?php
// cleanse outSR to 4326 or blank (strictly)
// @see http://spatialreference.org/ref/epsg/wgs-84/ Spatial Reference 4326.
$outSR = filter_input(INPUT_GET, "outSR", FILTER_VALIDATE_INT);
if($outSR !== 4326) {
	$outSR = "";
}

$url = "http://coagisweb.cabq.gov/arcgis/rest/services/public/trafficbarricades/MapServer/1/query?where=1+%3D+1&text=&objectIds=&time=&geometry=&geometryType=esriGeometryEnvelope&inSR=&spatialRel=esriSpatialRelIntersects&relationParam=&outFields=*&returnGeometry=true&maxAllowableOffset=&geometryPrecision=&outSR=$outSR&returnIdsOnly=false&returnCountOnly=false&orderByFields=&groupByFieldsForStatistics=&outStatistics=&returnZ=true&returnM=true&gdbVersion=&returnDistinctValues=false&f=pjson";
header("Content-type: text/json");
echo file_get_contents($url);