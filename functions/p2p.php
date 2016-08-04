<?php

function my_connection_types() {
	if ( !function_exists('p2p_register_connection_type') )
		return;

	p2p_register_connection_type( array('name' => 'd2p', 'from' => 'document', 'to' => 'post' ) );
	p2p_register_connection_type( array('name' => 'd2c', 'from' => 'document', 'to' => 'centre' ) );
	p2p_register_connection_type( array('name' => 'p2p', 'from' => 'page', 'to' => 'post' ) );
	p2p_register_connection_type( array('name' => 'p2e', 'from' => 'page', 'to' => 'tribe_events' ) );
	p2p_register_connection_type( array('name' => 'p2a', 'from' => 'page', 'to' => 'announcement' ) );
	p2p_register_connection_type( array('name' => 'p2d', 'from' => 'page', 'to' => 'document' ) );
	p2p_register_connection_type( array('name' => 'p2c', 'from' => 'page', 'to' => 'centre' ) );
	p2p_register_connection_type( array('name' => 'a2e', 'from' => 'announcement', 'to' => 'tribe_events' ) );
	p2p_register_connection_type( array('name' => 'e2p', 'from' => 'tribe_events', 'to' => 'post' ) );
	p2p_register_connection_type( array('name' => 'e2d', 'from' => 'tribe_events', 'to' => 'document' ) );
	p2p_register_connection_type( array('name' => 'e2c', 'from' => 'tribe_events', 'to' => 'centre' ) );
	p2p_register_connection_type( array('name' => 'n2c', 'from' => 'notice', 'to' => 'centre' ) );

}
  add_action('init', 'my_connection_types', 100);