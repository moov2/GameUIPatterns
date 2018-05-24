<?php
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_game-example-fields',
		'title' => 'Game Example Fields',
		'fields' => array (
			array (
				'key' => 'field_593aa7b10a352',
				'label' => 'Display Title',
				'name' => 'display_title',
				'type' => 'text',
				'instructions' => 'This is the title displayed when the example is nested in a UI Component page. It is recommended you only use the game title here, for example, "Zelda: Breath of the Wild - Mini Map" would become "Zelda: Breath of the Wild"',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_595f86ca50d14',
				'label' => 'Focus Image',
				'name' => 'focus_image',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'examples__thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'gameexample',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'custom_fields',
				2 => 'discussion',
				3 => 'comments',
				4 => 'slug',
				5 => 'categories',
				6 => 'tags',
				7 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_page-fields',
		'title' => 'Page Fields',
		'fields' => array (
			array (
				'key' => 'field_595159595de00',
				'label' => 'Show Title',
				'name' => 'show_title',
				'type' => 'radio',
				'instructions' => 'Do you want the title of the page to display on the front end of the website?',
				'required' => 1,
				'choices' => array (
					'yes' => 'Yes',
					'no' => 'No',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'yes',
				'layout' => 'horizontal',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_ui-component-fields',
		'title' => 'UI Component Fields',
		'fields' => array (
			array (
				'key' => 'field_593ac0b01d90c',
				'label' => 'Blueprint SVG Code',
				'name' => 'blueprint_svg_code',
				'type' => 'textarea',
				'instructions' => 'It is recommended that before pasting your code into the WordPress field that you review any of the CSS in the style tag. To avoid any conflicts, it is recommended to remove any font-family styles as these will be applied via the external CSS stylesheet. Font weights and colours may still be included.
	
	For optimal performance, it is recommended that the tool SVGOMG is used to minify the output generated for the SVG.',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => 10,
				'formatting' => 'html',
			),
			array (
				'key' => 'field_5939aab949c83',
				'label' => 'Description',
				'name' => 'description',
				'type' => 'wysiwyg',
				'instructions' => 'The description field will be displayed directly after the title. No classes are required, however, if you wish to modify the text you can do so using text trumps found in the pattern library.',
				'required' => 1,
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'no',
			),
			array (
				'key' => 'field_5939aacb49c84',
				'label' => 'When To Use',
				'name' => 'when_to_use',
				'type' => 'wysiwyg',
				'instructions' => 'When to use is a section to show the need for the component. What type of game benefits from the component? Which games require the component?
	
	I recommend that for the "When To Use" and "Solution" a list is used for each field. This field usually uses the "Divided" and "Bullets" classes. More can be found about the list components over at the list\'s documentation.',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'no',
			),
			array (
				'key' => 'field_5939aaeb49c85',
				'label' => 'Solution',
				'name' => 'solution',
				'type' => 'wysiwyg',
				'instructions' => 'The solution is how the pattern is used. Think about what the component needs to convey, colours often used, iconography and labels that are included.
	
	As mentioned in the "When To Use" description, it is recommended that for the "When To Use" and "Solution" a list is used for each field. This field usually uses the "Divided" and "Bullets" classes. More can be found about the list components over at the list\'s documentation.
	
	If unsure of how to layout the classes, view an existing example to get an understanding of the structure',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'no',
			),
			array (
				'key' => 'field_5939aafa49c86',
				'label' => 'Technical Details',
				'name' => 'technical_details',
				'type' => 'wysiwyg',
				'instructions' => 'This is where any information related to the pattern that hasn\'t already been listed can be included. If there is a geeky fact you have found out about the pattern, or perhaps heavy documentation that wouldn\'t be included in the previous fields, this is the section to include it in.',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_595e4e696d47b',
				'label' => 'Custom Author?',
				'name' => 'custom_author',
				'type' => 'radio',
				'instructions' => 'Does a custom author need to be specified?',
				'required' => 1,
				'choices' => array (
					'yes' => 'Yes',
					'no' => 'No',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'no',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_595e4ec240d98',
				'label' => 'Author Name',
				'name' => 'author_name',
				'type' => 'text',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_595e4e696d47b',
							'operator' => '==',
							'value' => 'yes',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_595e4ea140d97',
				'label' => 'Author Avatar',
				'name' => 'author_avatar',
				'type' => 'image',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_595e4e696d47b',
							'operator' => '==',
							'value' => 'yes',
						),
					),
					'allorany' => 'all',
				),
				'save_format' => 'object',
				'preview_size' => 'small',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'gameui',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
			),
		),
		'menu_order' => 0,
	));
}
?>