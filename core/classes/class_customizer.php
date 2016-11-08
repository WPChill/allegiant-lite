<?php
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;

class CPO_Customize_Label_Control extends WP_Customize_Control {
	
	public function render_content(){
		$name = $this->id;
		$value = $this->value(); ?>
		
		<?php if(!empty($this->label)): ?>
		<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
		<?php endif; ?>
		
		<?php if(!empty($this->description)): ?>
		<span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
		<?php endif; 
	}
}