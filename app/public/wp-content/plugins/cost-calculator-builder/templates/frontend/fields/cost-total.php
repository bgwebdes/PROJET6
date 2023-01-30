<?php
/**
 * @file
 * Cost-total component's template
 */
?>


<div :style="[ field.hidden ? { display: 'none' } : 'flex' ]" :class="[totalField.additionalStyles, 'sub-list-item total']" :id="field.alias">
	<span class="sub-item-title">{{ field.label }}</span>
	<span class="sub-item-value">{{ field.converted }}</span>
</div>
