<?php

/**
 * Apply Visit Request Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'visits-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'apply-visit-request';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
if( $is_preview ) {
    $className .= ' is-admin';
}
$group_apply = get_field('apply');
$group_visit = get_field('visit');
$group_request = get_field('request');
$group_popup = get_field('popup');


?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php if( $group_apply ): ?>
    
    <?php if( get_field('template') == 'Block' ): ?>
	
	<div class="apply-visit-request block">
            <div class="page-frame">
                <div class="avr-row">
                                            <div class="avr-col apply">
                                                            <div class="avr-col__title"><?php echo $group_apply['apply_title']; ?></div>
                            
                                                            <div class="avr-col__description"><?php echo $group_apply['apply_description']; ?></div>
                            
                                                            <div class="avr-col__cta">
                                    <a href="<?php echo $group_apply['apply_link']['url']; ?>"><?php echo $group_apply['apply_link']['title']; ?></a>
                                </div>
                                                    </div>
                    
                                            <div class="avr-col visit">
                                                            <div class="avr-col__title"><?php echo $group_visit['visit_title']; ?></div>
                            
                                                            <div class="avr-col__description"><?php echo $group_visit['visit_description']; ?></div>
                            
                                                            <div class="avr-col__cta">
                                    <a href="<?php echo $group_visit['visit_link']['url']; ?>"><?php echo $group_visit['visit_link']['title']; ?></a>
                                </div>
                                                    </div>
                    
                                            <div class="avr-col request">
                                                            <div class="avr-col__title"><?php echo $group_request['request_title']; ?></div>
                            
                                                            <div class="avr-col__description"><?php echo $group_request['request_description']; ?></div>
                            
                                                            <div class="avr-col__cta">
                                    <a href="<?php echo $group_request['request_link']['url']; ?>" target="_blank"><?php echo $group_request['request_link']['title']; ?></a>
                                </div>
                                                    </div>
                                    </div>
            </div>
        </div>
        <?php endif; ?>
	<?php if( get_field('template') == 'Popup' ): ?>
	<?php if( $group_popup ): ?>
	Modal
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Some text in the Modal..</p>
  </div>

</div>
	<?php endif; ?>
	<?php endif; ?>
	<?php else: ?>
		<p>Please add some content to the Apply, Visit, Request Block.</p>
	<?php endif; ?>
</div>