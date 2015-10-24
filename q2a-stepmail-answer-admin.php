<?php
class q2a_stepmail_answer_admin {
	function init_queries($tableslc) {
		return null;
	}
	function option_default($option) {
		switch($option) {
			case 'q2a-stepmail-answer-round-1':
				return 3; 
			case 'q2a-stepmail-answer-round-2':
				return 10; 
			case 'q2a-stepmail-answer-round-3':
				return 20; 
			case 'q2a-stepmail-answer-round-4':
				return 30; 
			default:
				return null;
		}
	}
		
	function allow_template($template) {
		return ($template!='admin');
	}       
		
	function admin_form(&$qa_content){                       
		// process the admin form if admin hit Save-Changes-button
		$ok = null;
		if (qa_clicked('q2a-stepmail-answer-save')) {
			qa_opt('q2a-stepmail-answer-1', qa_post_text('q2a-stepmail-answer-1'));
			qa_opt('q2a-stepmail-answer-title-1', qa_post_text('q2a-stepmail-answer-title-1'));
			qa_opt('q2a-stepmail-answer-round-1', (int)qa_post_text('q2a-stepmail-answer-round-1'));
			qa_opt('q2a-stepmail-answer-2', qa_post_text('q2a-stepmail-answer-2'));
			qa_opt('q2a-stepmail-answer-title-2', qa_post_text('q2a-stepmail-answer-title-2'));
			qa_opt('q2a-stepmail-answer-round-2', (int)qa_post_text('q2a-stepmail-answer-round-2'));
			qa_opt('q2a-stepmail-answer-3', qa_post_text('q2a-stepmail-answer-3'));
			qa_opt('q2a-stepmail-answer-title-3', qa_post_text('q2a-stepmail-answer-title-3'));
			qa_opt('q2a-stepmail-answer-round-3', (int)qa_post_text('q2a-stepmail-answer-round-3'));
			qa_opt('q2a-stepmail-answer-4', qa_post_text('q2a-stepmail-answer-4'));
			qa_opt('q2a-stepmail-answer-title-4', qa_post_text('q2a-stepmail-answer-title-4'));
			qa_opt('q2a-stepmail-answer-round-4', (int)qa_post_text('q2a-stepmail-answer-round-4'));

			$ok = qa_lang('admin/options_saved');
		}
		
		// form fields to display frontend for admin
		$fields = array();
		
		$fields[] = array(
			'type' => 'text',
			'label' => 'mail 1 title',
			'tags' => 'name="q2a-stepmail-answer-title-1"',
			'value' => qa_opt('q2a-stepmail-answer-title-1'),
		);


		$fields[] = array(
			'type' => 'textarea',
			'label' => 'mail 1',
			'tags' => 'name="q2a-stepmail-answer-1"',
			'value' => qa_opt('q2a-stepmail-answer-1'),
		);
		
		$fields[] = array(
			'type' => 'number',
			'label' => 'mail 1 round',
			'tags' => 'name="q2a-stepmail-answer-round-1"',
			'value' => qa_opt('q2a-stepmail-answer-round-1'),
		);


		$fields[] = array(
			'type' => 'text',
			'label' => 'mail 2 title',
			'tags' => 'name="q2a-stepmail-answer-title-2"',
			'value' => qa_opt('q2a-stepmail-answer-title-2'),
		);

		$fields[] = array(
			'type' => 'textarea',
			'label' => 'mail 2',
			'tags' => 'name="q2a-stepmail-answer-2"',
			'value' => qa_opt('q2a-stepmail-answer-2'),
		);

		$fields[] = array(
			'type' => 'number',
			'label' => 'mail 2 round',
			'tags' => 'name="q2a-stepmail-answer-round-2"',
			'value' => qa_opt('q2a-stepmail-answer-round-2'),
		);

		$fields[] = array(
			'type' => 'text',
			'label' => 'mail 3 title',
			'tags' => 'name="q2a-stepmail-answer-title-3"',
			'value' => qa_opt('q2a-stepmail-answer-title-3'),
		);

		$fields[] = array(
			'type' => 'textarea',
			'label' => 'mail 3',
			'tags' => 'name="q2a-stepmail-answer-3"',
			'value' => qa_opt('q2a-stepmail-answer-3'),
		);

		$fields[] = array(
			'type' => 'number',
			'label' => 'mail 3 round',
			'tags' => 'name="q2a-stepmail-answer-round-3"',
			'value' => qa_opt('q2a-stepmail-answer-round-3'),
		);

		$fields[] = array(
			'type' => 'text',
			'label' => 'mail 4 title',
			'tags' => 'name="q2a-stepmail-answer-title-4"',
			'value' => qa_opt('q2a-stepmail-answer-title-4'),
		);

		$fields[] = array(
			'type' => 'textarea',
			'label' => 'mail 4',
			'tags' => 'name="q2a-stepmail-answer-4"',
			'value' => qa_opt('q2a-stepmail-answer-4'),
		);

		$fields[] = array(
			'type' => 'number',
			'label' => 'mail 4 round',
			'tags' => 'name="q2a-stepmail-answer-round-4"',
			'value' => qa_opt('q2a-stepmail-answer-round-4'),
		);

		return array(     
			'ok' => ($ok && !isset($error)) ? $ok : null,
			'fields' => $fields,
			'buttons' => array(
				array(
					'label' => qa_lang_html('main/save_button'),
					'tags' => 'name="q2a-stepmail-answer-save"',
				),
			),
		);
	}
}

