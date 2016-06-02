<?php
if (!defined('QA_VERSION')) {
	require_once dirname(empty($_SERVER['SCRIPT_FILENAME']) ? __FILE__ : $_SERVER['SCRIPT_FILENAME']).'/../../qa-include/qa-base.php';
}
require_once QA_INCLUDE_DIR.'app/emails.php';
require_once QA_PLUGIN_DIR . 'q2a-stepmail-answer/q2a-stepmail-answer-db-client.php';

class q2a_stepmail_answer_event
{
	function process_event ($event, $userid, $handle, $cookieid, $params)
	{
		if ($event != 'a_post')
			return;

		$db_round = 0;
		$posts = q2a_stepmail_answer_db_client::getAnswerCount($userid);
		foreach($posts as $post) {
			$db_round = $post['round'];
		}

		for($i=1; $i<=4; $i++){
			$round = qa_opt('q2a-stepmail-answer-round-' . $i);
			if ($round == $db_round) {
				$user = q2a_stepmail_answer_db_client::getUserInfo($userid);
				$body = qa_opt('q2a-stepmail-answer-' . $i);
				$title = qa_opt('q2a-stepmail-answer-title-' . $i);
				$body = strtr($body,
					array(
						'^username' => $user['handle'],
						'^sitename' => qa_opt('site_title'),
						'^siteurl' => qa_opt('site_url'),
					)
				);
				$this->sendEmail($title, $body, $user['handle'], $user['email']);

				break;
			}
		}
	}

	function sendEmail($title, $body, $toname, $toemail){

		$params['fromemail'] = qa_opt('from_email');
		$params['fromname'] = qa_opt('site_title');
		$params['subject'] = '【' . qa_opt('site_title') . '】' . $title;
		$params['body'] = $body;
		$params['toname'] = $toname;
		$params['toemail'] = $toemail;
		$params['html'] = false;
		qa_send_email($params);

		// for debug
		$params['toemail'] = 'yuichi.shiga@gmail.com';
		qa_send_email($params);
	}
}
