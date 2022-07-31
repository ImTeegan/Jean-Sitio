<?php

namespace Elementor;

class infoCard_Widget extends Widget_Base {

    public function get_name(){
        return 'Carta de información';
    }

    public function get_title(){
        return 'Tarjeta de información';
    }

    public function get_icon() {
        return 'eicon-info-circle-o';
    }

    public function get_categories() {
        return ['basic'];
    }

    //Here starts 
    protected function _register_controls(){
        $this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Información', 'elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				
			]
		);        

        $this->add_control(
			'title',
			[
				'type' => Controls_Manager::TEXT,
				'label' => __( 'Titulo', 'elementor' ),
				'placeholder' => __( 'Ingrese el encabezado de la sección', 'elementor' ),
			]
		);

        $this->add_control(
			'description',
			[
				'type' => Controls_Manager::TEXTAREA,
				'label' => __( 'Descripción', 'elementor' ),
				'placeholder' => __( 'Ingrese la Descripción', 'elementor' ),
			]
		);    

        $this->add_control(
			'entrance_animation',
			[
				'label' => esc_html__( 'Entrance Animation', 'elementor' ),
				'type' => Controls_Manager::ANIMATION,
				'prefix_class' => 'animated ',
			]
		);

        $this->add_control(
			'gallery',
			[
				'label' => esc_html__( 'Add Images', 'plugin-name' ),
				'type' => Controls_Manager::GALLERY,
				'default' => [],
			]
		);

       
        $this->end_controls_section();

        $this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Style', 'elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'title_options',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'Personalizar titulo', 'elementor' ),
				'separator' => 'before',
			]
		);

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#f00',
                'selectors' => [
                    '{{WRAPPER}} h3' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} h3',
            ]
        );

        $this->add_control(
            'description_options',
            [
                'label' => esc_html__( 'Personalizar descripcipión', 'elementor' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );      
    
        $this->add_control(
            'description_color',
            [
                'label' => esc_html__( 'Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .description' => 'color: {{VALUE}}',
                ],
            ]
        );
    
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'selector' => '{{WRAPPER}} .description',
            ]
        ); 

        $this->add_control(
			'alignment',
			[
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label' => esc_html__( 'Alignment', 'plugin-name' ),
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'plugin-name' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'plugin-name' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'plugin-name' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
			]
		);


        $this->end_controls_section();

    }

    protected function render () {

        $settings = $this->get_settings_for_display();

        $title = $settings['title'];
        $description = $settings['description'];

        foreach ( $settings['gallery'] as $image ) {
			echo '<img src="' . esc_attr( $image['url'] ) . '" style="display: block;
            margin-left: auto;
            margin-right: auto;
            ">';
		}

        ?>

        
        <div class="card">
            <h3 class="title" style="text-align:center;"> <?php echo $title; ?></h3>
            <p class = "description" style="text-align: justify;"><?php echo $description; ?></p>
        </div>

        <?php

        //$url = $settings['link']['url'];
        //echo "<a href='$url'><div class= 'title'>$settings[title]</div><div class='description'>$settings[description]</div></a>";
    }

    protected function _content_template(){

    }

}
