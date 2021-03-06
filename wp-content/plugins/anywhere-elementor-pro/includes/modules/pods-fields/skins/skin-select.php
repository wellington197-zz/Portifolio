<?php

namespace Aepro\Modules\PodsFields\Skins;
use Aepro\Aepro;
use Aepro\Modules\PodsFields;
use Aepro\Classes\PodsMaster;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Scheme_Color;
use Aepro\Base\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;


class Skin_Select extends Skin_Base{

	public function get_id() {
		return 'select';
	}

	public function get_title() {
		return __( 'Select', 'ae-pro' );
	}

	protected function _register_controls_actions() {

		parent::_register_controls_actions();
		add_action('elementor/element/ae-pods/general/after_section_end', [$this, 'register_style_controls']);
	}

	public function register_controls( Widget_Base $widget){

		$this->parent = $widget;

		parent::register_select_controls();

	}

	public function register_style_controls(){

	    $this->start_controls_section(
	        'list_styles',
            [
                'label' => __('List Styles', 'ae-pro'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    $this->get_control_id('divider') => 'yes',
                ],
            ]
        );

		$this->add_responsive_control(
			'space_between',
			[
				'label' => __( 'Space Between', 'ae-pro' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
                'default' => [
                    'unit' => 'px',
                    'size' => 8,
                ],
                'condition' => [
                    $this->get_control_id('divider') => 'yes',
                ],
				'selectors' => [
					'{{WRAPPER}} .ae-icon-list-items:not(.ae-list-horizontal) .ae-icon-list-item:not(:last-child)' => 'padding-bottom: calc({{SIZE}}{{UNIT}}/2); margin-bottom: calc({{SIZE}}{{UNIT}}/2)',
					'{{WRAPPER}} .ae-icon-list-items:not(.ae-list-horizontal) .ae-icon-list-item:not(:first-child)' => 'margin-top: calc({{SIZE}}{{UNIT}}/2)',
                    '{{WRAPPER}} .ae-icon-list-items:not(.ae-list-horizontal) .ae-icon-list-item:after' => 'bottom: calc(-{{SIZE}}{{UNIT}}/2)',
					'{{WRAPPER}} .ae-icon-list-items.ae-list-horizontal .ae-icon-list-item' => 'margin-right: calc({{SIZE}}{{UNIT}}/2); margin-left: calc({{SIZE}}{{UNIT}}/2)',
					'{{WRAPPER}} .ae-icon-list-items.ae-list-horizontal' => 'margin-right: calc(-{{SIZE}}{{UNIT}}/2); margin-left: calc(-{{SIZE}}{{UNIT}}/2)',
					'body.rtl {{WRAPPER}} .ae-icon-list-items.ae-list-horizontal .ae-icon-list-item:after' => 'left: calc(-{{SIZE}}{{UNIT}}/2)',
					'body:not(.rtl) {{WRAPPER}} .ae-icon-list-items.ae-list-horizontal .ae-icon-list-item:after' => 'right: calc(-{{SIZE}}{{UNIT}}/2)',
				],
			]
		);


		$this->add_control(
			'divider_style',
			[
				'label' => __( 'Style', 'ae-pro' ),
				'type' => Controls_Manager::SELECT,
				'separator' => 'before',
				'options' => [
					'solid' => __( 'Solid', 'ae-pro' ),
					'double' => __( 'Double', 'ae-pro' ),
					'dotted' => __( 'Dotted', 'ae-pro' ),
					'dashed' => __( 'Dashed', 'ae-pro' ),
				],
				'default' => 'solid',
				'condition' => [
					$this->get_control_id('divider') => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .ae-icon-list-items:not(.ae-list-horizontal) .ae-icon-list-item:not(:last-child):after' => 'border-top-style: {{VALUE}}',
					'{{WRAPPER}} .ae-icon-list-items.ae-list-horizontal .ae-icon-list-item:not(:last-child):after' => 'border-left-style: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'divider_weight',
			[
				'label' => __( 'Weight', 'ae-pro' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 20,
					],
				],
				'condition' => [
					$this->get_control_id('divider') => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .ae-icon-list-items:not(.ae-list-horizontal) .ae-icon-list-item:not(:last-child):after' => 'border-top-width: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .ae-list-horizontal .ae-icon-list-item:not(:last-child):after' => 'border-left-width: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'divider_width',
			[
				'label' => __( 'Width', 'ae-pro' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
				],
				'condition' => [
					$this->get_control_id('divider') => 'yes',
					$this->get_control_id('layout!') => 'horizontal',
				],
				'selectors' => [
					'{{WRAPPER}} .ae-icon-list-item:not(:last-child):after' => 'width: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'divider_height',
			[
				'label' => __( 'Height', 'ae-pro' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%', 'px' ],
				'default' => [
					'unit' => '%',
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 100,
					],
					'%' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'condition' => [
					$this->get_control_id('divider') => 'yes',
					$this->get_control_id('layout') => 'horizontal',
				],
				'selectors' => [
					'{{WRAPPER}} .ae-icon-list-item:not(:last-child):after' => 'height: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'divider_color',
			[
				'label' => __( 'Color', 'ae-pro' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ddd',
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
				'condition' => [
					$this->get_control_id('divider') => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .ae-icon-list-item:not(:last-child):after' => 'border-color: {{VALUE}}',
				],
			]
		);



	    $this->end_controls_section();

		$this->start_controls_section(
			'general-style',
			[
				'label' => __('General', 'ae-pro'),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} span',
			]
		);

		$this->start_controls_tabs('style');

			$this->start_controls_tab(
				'normal_style',
				[
					'label' => __('Normal')
				]
			);

				$this->add_control(
					'item_color',
					[
						'label' => __('Color'),
						'type'  => Controls_Manager::COLOR,
                        [
                            'type' => Scheme_Color::get_type(),
                            'value' => Scheme_Color::COLOR_3,
                        ],
						'selectors' => [
							'{{WRAPPER}} span' => 'color:{{VALUE}}'
						]
					]
				);

				$this->add_control(
					'item_bg_color',
					[
						'label' => __('Background Color'),
						'type'  => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} span' => 'background:{{VALUE}}'
						]
					]
				);

				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'item_border',
						'label' => __( 'Border', 'ae-pro' ),
						'selector' => '{{WRAPPER}} span',
					]
				);

				$this->add_control(
					'item_border_radius',
					[
						'label' => __( 'Border Radius', 'ae-pro' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} span   ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow:hidden;',
						],
					]
				);

				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'item_box_shadow',
						'label' => __( 'Item Shadow', 'ae-pro' ),
						'selector' => '{{WRAPPER}} span',
					]
				);



			$this->end_controls_tab();


			$this->start_controls_tab(
				'hover_style',
				[
					'label' => __('Hover')
				]
			);

				$this->add_control(
					'item_color_hover',
					[
						'label' => __('Color'),
						'type'  => Controls_Manager::COLOR,
                        [
                            'type' => Scheme_Color::get_type(),
                            'value' => Scheme_Color::COLOR_3,
                        ],
						'selectors' => [
							'{{WRAPPER}} span:hover' => 'color:{{VALUE}}'
						]
					]
				);

				$this->add_control(
					'item_bg_color_hover',
					[
						'label' => __('Background Color'),
						'type'  => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} span:hover' => 'background:{{VALUE}}'
						]
					]
				);

				$this->add_control(
					'item_border_color_hover',
					[
						'label' => __('Border Color'),
						'type'  => Controls_Manager::COLOR,
                        [
                            'type' => Scheme_Color::get_type(),
                            'value' => Scheme_Color::COLOR_3,
                        ],
						'selectors' => [
							'{{WRAPPER}} span:hover' => 'border-color:{{VALUE}}'
						]
					]
				);

				$this->add_responsive_control(
					'border_radius_hover',
					[
						'label' => __('Border Radius', 'ae-pro'),
						'type'  => Controls_Manager::DIMENSIONS,
						'selectors' => [
							'{{WRAPPER}} span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow:hidden;',
						],

					]
				);

				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'item_hover_box_shadow',
						'label' => __( 'Item Shadow', 'ae-pro' ),
						'selector' => '{{WRAPPER}} span:hover',
					]
				);


			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'padding',
			[
				'label' => __('Padding', 'ae-pro'),
				'type'  => Controls_Manager::DIMENSIONS,
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow:hidden;',
				],

			]
		);

		$this->add_responsive_control(
			'margin',
			[
				'label' => __('Margin', 'ae-pro'),
				'type'  => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow:hidden;',
				],

			]
		);



		$this->add_control(
			'non_selected_heading',
			[
				'label' => __('Not Selected Items', 'ae-pro'),
				'type'  => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					$this->get_control_id('show_all_choices') => 'yes'
				]
			]
		);

		$this->add_control(
			'color_non_selected',
			[
				'label' => __('Color'),
				'type'  => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} li.ae-no-select .ae-icon-list-text' => 'color:{{VALUE}}'
				],
				'condition' => [
					$this->get_control_id('show_all_choices') => 'yes'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography_no_select',
				'selector' => '{{WRAPPER}} li.ae-no-select .ae-icon-list-text',
				'condition' => [
					$this->get_control_id('show_all_choices') => 'yes'
				]
			]
		);

		$this->end_controls_section();

	}

	public function render() {

		$list_items       = [];


		$settings         = $this->parent->get_settings();

		$field_args  =  [
			'field_name'    => $settings['field_name'],
			'field_type'    => $settings['field_type'],
            'display_data'  => $settings['select_data_type'],
            '_skin'         => $settings['_skin'],

		];

        if ($settings['pods_option_name'] != ''){
            $field_args['pods_option_name'] = $settings['pods_option_name'];
        }


        if($settings['field_type'] == 'term'){
		    $term           = Aepro::$_helper->get_preview_term_data();
			$field_object   = PodsMaster::instance()->get_field_object_select_field($field_args, $term);
        }elseif($settings['field_type'] == 'post'){
			$post             = Aepro::$_helper->get_demo_post_data();
			$field_object   = PodsMaster::instance()->get_field_object_select_field($field_args, $post->ID);
        }elseif($settings['field_type'] == 'option'){
            $field_object   = PodsMaster::instance()->get_field_object_select_field($field_args, $settings['pods_option_name']);
        }elseif($settings['field_type'] == 'user') {
            $author = Aepro::$_helper->get_preview_author_data();
            $field_object = PodsMaster::instance()->get_field_object_select_field($field_args, 'user_' . $author['prev_author_id']);
        }


        $selected         = PodsMaster::instance()->get_field_value( $field_args );

		$data_type        = $this->get_instance_value('data_type');
		$show_all_choices = $this->get_instance_value('show_all_choices');
		$separator        = $this->get_instance_value('separator');
		$divider          = $this->get_instance_value('divider');
		$layout           = $this->get_instance_value('layout');




		$this->parent->add_render_attribute('wrapper', 'class', 'ae-acf-wrapper');
		$this->parent->add_render_attribute('wrapper', 'class','ae-list-'.$layout);
		$this->parent->add_render_attribute('wrapper', 'class','ae-icon-list-items');

		if($separator != '' && $divider == ''){
			$this->parent->add_render_attribute('wrapper', 'class','ae-custom-sep');
        }


		if($layout == 'vertical'){
			$separator = '';
		}

		if(empty($list_items)){
			//$this->parent->add_render_attribute('wrapper', 'class', 'ae-hide');
		}
		?>
		<ul <?php echo $this->parent->get_render_attribute_string('wrapper'); ?>>
			<?php
                // show key
                if($data_type == 'key'){
                    $this->show_key( $selected, $show_all_choices, $field_object);
                }else{
                    $this->show_label( $selected, $show_all_choices, $field_object);
                }
			?>
		</ul>
		<?php

	}

	protected function show_key($selected, $show_all_choices, $field_object){

	    $icon = $this->get_instance_value('icon');
	    $icon_unchecked = $this->get_instance_value('icon_unchecked');

		$list_items = [];
		if($show_all_choices == 'yes'){
			if(is_array($selected)){
				// multi items are selected

				foreach($field_object as $key => $label){
				    $striked = false;  // just assuming
                    $icon_class = '';
					if(in_array($key, $selected)){
					    // Selected/Checked item
                        $icon_class = $icon;
						$this->parent->set_render_attribute('item_wrapper', 'class', 'ae-icon-list-item' );
					}else{
						$this->parent->set_render_attribute('item_wrapper', 'class', 'ae-no-select ae-icon-list-item' );
						$icon_class = $icon_unchecked;
					}

					?>

                    <li <?php echo $this->parent->get_render_attribute_string('item_wrapper') ?>>
                        <div class="ae-icon-list-item-inner">
                        <?php
                            if($icon_class != ''){
                                ?>
                                <span class="ae-icon-list-icon">
                                    <i class="<?php echo $icon_class; ?>"></i>
                                </span>
                                <?php
                            }
                        ?>

                        <span class="ae-icon-list-text">
                            <?php echo $key; ?>
                        </span>
                        </div>
                    </li>

                    <?php

				}

			}else{

				foreach($field_object as $key => $label){

                    if($key === $selected){
                    // Selected/Checked item
                        $icon_class = $icon;
                        $this->parent->set_render_attribute('item_wrapper', 'class', 'ae-icon-list-item' );
                    }else{
                        $this->parent->set_render_attribute('item_wrapper', 'class', 'ae-no-select ae-icon-list-item' );
                        $icon_class = $icon_unchecked;
                    }

                    ?>

                    <li <?php echo $this->parent->get_render_attribute_string('item_wrapper') ?>>
                        <div class="ae-icon-list-item-inner">
						<?php
						if($icon_class != ''){
							?>
                            <span class="ae-icon-list-icon">
                                    <i class="<?php echo $icon_class; ?>"></i>
                                </span>
							<?php
						}
						?>

                        <span class="ae-icon-list-text">
                            <?php echo $key; ?>
                        </span>
                        </div>
                    </li>

                    <?php
					if($key == $selected){
						$list_items[] = '<span>'.$key.'</span>';
					}else{
						$list_items[] = '<span class="ae-no-select">'.$label.'</span>';
					}
				}

			}

		}else{

			if(is_array($selected)){
				// multi items are selected

				$icon_class = $icon;
				$this->parent->set_render_attribute('item_wrapper', 'class', 'ae-icon-list-item' );

				foreach($selected as $key => $label){

				    ?>

                    <li <?php echo $this->parent->get_render_attribute_string('item_wrapper') ?>>
                        <div class="ae-icon-list-item-inner">
						<?php
						if($icon_class != ''){
							?>
                            <span class="ae-icon-list-icon">
                                    <i class="<?php echo $icon_class; ?>"></i>
                                </span>
							<?php
						}
						?>

                        <span class="ae-icon-list-text">
                            <?php echo $label; ?>
                        </span>
                        </div>
                    </li>

                    <?php

				}

			}else{

				$icon_class = $icon;
				$this->parent->set_render_attribute('item_wrapper', 'class', 'ae-icon-list-item' );

				?>

                <li <?php echo $this->parent->get_render_attribute_string('item_wrapper') ?>>
                    <div class="ae-icon-list-item-inner">
	                <?php
	                if($icon_class != ''){
		                ?>
                        <span class="ae-icon-list-icon">
                                    <i class="<?php echo $icon_class; ?>"></i>
                                </span>
		                <?php
	                }
	                ?>

                    <span class="ae-icon-list-text">
                            <?php echo $selected; ?>
                    </span>
                    </div>
                </li>

                <?php

			}

		}

		return $list_items;

	}

	protected function show_label($selected, $show_all_choices, $field_object){

		$icon = $this->get_instance_value('icon');
		$icon_unchecked = $this->get_instance_value('icon_unchecked');

		$list_items = [];

		if($show_all_choices == 'yes'){

			if(is_array($selected)){
				// multi items are selected

				foreach($field_object as $key => $label){

					$striked = false;  // just assuming
					$icon_class = '';
					if(in_array($key, $selected)){
						// Selected/Checked item
						$icon_class = $icon;
						$this->parent->set_render_attribute('item_wrapper', 'class', 'ae-icon-list-item' );
					}else{
						$this->parent->set_render_attribute('item_wrapper', 'class', 'ae-no-select ae-icon-list-item' );
						$icon_class = $icon_unchecked;
					}


					?>

                    <li <?php echo $this->parent->get_render_attribute_string('item_wrapper') ?>>
                        <div class="ae-icon-list-item-inner">
						<?php
						if($icon_class != ''){
							?>
                            <span class="ae-icon-list-icon">
                                    <i class="<?php echo $icon_class; ?>"></i>
                                </span>
							<?php
						}
						?>

                        <span class="ae-icon-list-text">
                            <?php echo $label; ?>
                        </span>
                        </div>
                    </li>

                    <?php

				}

			}else{

				foreach($field_object as $key => $label){

					$icon_class = '';
					if( $key === $selected){
						// Selected/Checked item
						$icon_class = $icon;
						$this->parent->set_render_attribute('item_wrapper', 'class', 'ae-icon-list-item' );
					}else{
						$this->parent->set_render_attribute('item_wrapper', 'class', 'ae-no-select ae-icon-list-item' );
						$icon_class = $icon_unchecked;
					}


					?>

                    <li <?php echo $this->parent->get_render_attribute_string('item_wrapper') ?>>
                        <div class="ae-icon-list-item-inner">
						<?php
						if($icon_class != ''){
							?>
                            <span class="ae-icon-list-icon">
                                    <i class="<?php echo $icon_class; ?>"></i>
                                </span>
							<?php
						}
						?>

                        <span class="ae-icon-list-text">
                            <?php echo $field_object[$key]; ?>
                        </span>
                        </div>
                    </li>

                    <?php

				}

			}

		}else{

			if(is_array($selected)){
				// multi items are selected

				$icon_class = $icon;
				$this->parent->set_render_attribute('item_wrapper', 'class', 'ae-icon-list-item' );

				foreach($selected as $key){

				    ?>

                    <li <?php echo $this->parent->get_render_attribute_string('item_wrapper') ?>>
                        <div class="ae-icon-list-item-inner">
						<?php
						if($icon_class != ''){
							?>
                            <span class="ae-icon-list-icon">
                                    <i class="<?php echo $icon_class; ?>"></i>
                                </span>
							<?php
						}
						?>

                        <span class="ae-icon-list-text">
                            <?php echo $field_object[$key]; ?>
                        </span>
                        </div>
                    </li>

                    <?php
				}

			}else{

                $icon_class = $icon;
                $this->parent->set_render_attribute('item_wrapper', 'class', 'ae-icon-list-item' );

                ?>

                <li <?php echo $this->parent->get_render_attribute_string('item_wrapper') ?>>
                    <div class="ae-icon-list-item-inner">
					<?php
					if($icon_class != ''){
						?>
                        <span class="ae-icon-list-icon">
                                    <i class="<?php echo $icon_class; ?>"></i>
                                </span>
						<?php
					}
					?>

                    <span class="ae-icon-list-text">
                            <?php echo $field_object[$selected]; ?>
                    </span>
                    </div>
                </li>

                <?php

			}

		}

		return $list_items;

	}

}
