<?php

function my_connection_types() {
	if ( !function_exists('p2p_register_connection_type') )
		return;

	p2p_register_connection_type( array('name' => 'p22p2', 'from' => 'page', 'to' => 'page', 'sortable' => 'any' ) );
	p2p_register_connection_type( array('name' => 'd2p', 'from' => 'doc', 'to' => 'page', 'sortable' => 'any' ) );
	p2p_register_connection_type( array('name' => 'd2p2', 'from' => 'doc', 'to' => 'post', 'sortable' => 'any' ) );
	p2p_register_connection_type( array('name' => 'd2e', 'from' => 'doc', 'to' => 'tribe_events', 'sortable' => 'any' ) );
	p2p_register_connection_type( array('name' => 'p2l', 'from' => 'page', 'to' => 'link', 'sortable' => 'any' ) );
	p2p_register_connection_type( array('name' => 'p2l2', 'from' => 'post', 'to' => 'link', 'sortable' => 'any' ) );
	p2p_register_connection_type( array('name' => 'n2l', 'from' => 'notice', 'to' => 'link', 'sortable' => 'any' ) );
	p2p_register_connection_type( array('name' => 'e2l', 'from' => 'tribe_events', 'to' => 'link', 'sortable' => 'any' ) );
	p2p_register_connection_type( array('name' => 'p2p', 'from' => 'tribe_events', 'to' => 'post', 'sortable' => 'any' ) );
	p2p_register_connection_type( array('name' => 'p2e', 'from' => 'page', 'to' => 'tribe_events', 'sortable' => 'any' ) );
	p2p_register_connection_type( array('name' => 'p2a', 'from' => 'page', 'to' => 'announcement', 'sortable' => 'any' ) );
	p2p_register_connection_type( array('name' => 'p2c', 'from' => 'page', 'to' => 'centre', 'sortable' => 'any' ) );
	p2p_register_connection_type( array('name' => 'a2e', 'from' => 'announcement', 'to' => 'tribe_events', 'sortable' => 'any' ) );
	p2p_register_connection_type( array('name' => 'e2p', 'from' => 'tribe_events', 'to' => 'post', 'sortable' => 'any' ) );
	p2p_register_connection_type( array('name' => 'e2c', 'from' => 'tribe_events', 'to' => 'centre', 'sortable' => 'any' ) );
	p2p_register_connection_type( array('name' => 'n2c', 'from' => 'notice', 'to' => 'centre', 'sortable' => 'any' ) );

}
  add_action('init', 'my_connection_types', 100);