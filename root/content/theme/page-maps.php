<?php get_header(); ?>

<div id="ourMap"></div>
<script src="http://www.openlayers.org/api/OpenLayers.js"></script>
<script>
	map = new 
	OpenLayers.Map("ourMap");
	map.addLayer(new 
		OpenLayers.Layer.OSM()
	);
	map.zoomToMaxExtent();
</script>

<?php get_footer(); ?>