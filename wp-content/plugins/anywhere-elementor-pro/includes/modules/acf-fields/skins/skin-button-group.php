<?php

namespace Aepro\Modules\AcfFields\Skins;

use Aepro\Modules\AcfFields;
use Aepro\Classes\AcfMaster;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Scheme_Color;
use Aepro\Base\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;


class Skin_Button_Group extends Skin_Select {

	public function get_id() {
		return 'button_group';
	}

	public function get_title() {
		return __( 'Button Group', 'ae-pro' );
	}


	public function register_controls( Widget_Base $widget){

		$this->parent = $widget;

		parent::register_select_controls();

	}

}
