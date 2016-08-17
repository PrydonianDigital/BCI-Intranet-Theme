<?php

function my_connection_types() {
	if ( !function_exists('p2p_register_connection_type') )
		return;

	p2p_register_connection_type( array('name' => 'd2p', 'from' => 'doc', 'to' => 'page' ) );
	p2p_register_connection_type( array('name' => 'd2p2', 'from' => 'doc', 'to' => 'post' ) );
	p2p_register_connection_type( array('name' => 'd2e', 'from' => 'doc', 'to' => 'tribe_events' ) );
	p2p_register_connection_type( array('name' => 'p2l', 'from' => 'page', 'to' => 'link' ) );
	p2p_register_connection_type( array('name' => 'p2l2', 'from' => 'post', 'to' => 'link' ) );
	p2p_register_connection_type( array('name' => 'n2l', 'from' => 'notice', 'to' => 'link' ) );
	p2p_register_connection_type( array('name' => 'e2l', 'from' => 'tribe_events', 'to' => 'link' ) );
	p2p_register_connection_type( array('name' => 'p2p', 'from' => 'tribe_events', 'to' => 'post' ) );
	p2p_register_connection_type( array('name' => 'p2e', 'from' => 'page', 'to' => 'tribe_events' ) );
	p2p_register_connection_type( array('name' => 'p2a', 'from' => 'page', 'to' => 'announcement' ) );
	p2p_register_connection_type( array('name' => 'p2c', 'from' => 'page', 'to' => 'centre' ) );
	p2p_register_connection_type( array('name' => 'a2e', 'from' => 'announcement', 'to' => 'tribe_events' ) );
	p2p_register_connection_type( array('name' => 'e2p', 'from' => 'tribe_events', 'to' => 'post' ) );
	p2p_register_connection_type( array('name' => 'e2c', 'from' => 'tribe_events', 'to' => 'centre' ) );
	p2p_register_connection_type( array('name' => 'n2c', 'from' => 'notice', 'to' => 'centre' ) );

}
  add_action('init', 'my_connection_types', 100);