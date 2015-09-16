<?php

function dcpunk_get_curated_content() {
	$query = new EntityFieldQuery();
	
	$query->entityCondition('entity_type', 'node')
	  ->entityCondition('bundle', 'curated_collection')
	  ->propertyCondition('status', 1)
	  ->range(0, 30);
	
	$result = $query->execute();
	
	if (isset($result['node'])) {
	  	$news_items_nids = array_keys($result['node']);
	  	$news_items = entity_load('node', $news_items_nids);
	  
	  	$arr = array();
	  	foreach ($news_items as $value) {
		    array_push($arr, $value);
		}
		
		return $arr;
	}
	
	return null;
}

function dcpunk_taxonomy_term_load($tid) {
  	if (!is_numeric($tid)) {
	    return FALSE;
	}
  	$term = taxonomy_term_load_multiple(array($tid), array());
  	return $term ? $term[$tid]->name : '';
}

function dcpunk_get_all_of_type($content_type) {
	$query = new EntityFieldQuery();
	
	$query->entityCondition('entity_type', 'node')
	  ->entityCondition('bundle', 'object')
	  ->propertyCondition('status', 1);
	
	$result = $query->execute();
	if (isset($result['node'])) {
	  	$news_items_nids = array_keys($result['node']);
	  	$news_items = entity_load('node', $news_items_nids);
	  
	  	$arr = array();
	  	foreach ($news_items as $value) {
		    array_push($arr, $value);
		}
		
		return $arr;
	}
	
	return null;
}

function dcpunk_current_url() {
	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	
	$pageURL .= "://";
	
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	
	return $pageURL;
}

function dcpunk_preprocess_page(&$vars) {
    $header = drupal_get_http_header('status'); 
    if ($header == '404 Not Found') {     
        $vars['theme_hook_suggestions'][] = 'page__404';
    }
}