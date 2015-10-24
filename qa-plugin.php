<?php
/*
	Plugin Name: Step mail of Answer
	Plugin URI: 
	Plugin Description: send mail to new user step by step of answer
	Plugin Version: 0.3
	Plugin Date: 2015-10-19
	Plugin Author:
	Plugin Author URI:
	Plugin License: GPLv2
	Plugin Minimum Question2Answer Version: 1.7
	Plugin Update Check URI: 
*/
if (!defined('QA_VERSION')) {
	header('Location: ../../');
	exit;
}

qa_register_plugin_module('module', 'q2a-stepmail-answer-admin.php', 'q2a_stepmail_answer_admin', 'step mail A');
qa_register_plugin_module('event', 'q2a-stepmail-answer-event.php', 'q2a_stepmail_answer_event', 'step mail A');

/*
	Omit PHP closing tag to help avoid accidental output
*/
