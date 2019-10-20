<?php

/* Flamingo shortcode inbound messages */
function flamingo_shortcode_inbound_messages_shortcode($atts) {
  /* Shortcode Attributes:
      number: number of messages to show (default: -1)
      form: which fields to display (default: all)
      head: table header (default: no)
      fields: which fields to display (default: all)
      condition: do you have any condition about fields (default: no)
      order: messages order (default: desc)
      orderby: messages order by (default: date)
  */
  $attributes = shortcode_atts( array(
    'number'        => -1,
    'form'          => 'all',
    'head'          => 'no',
    'fields'        => 'all',
    'condition'     => 'no',
    'order'         => 'desc',
    'orderby'       => 'date'
  ), $atts, 'flamingo-inbound-messages' );

  /* Get messages */
  $output = flamingo_shortcode_get_inbound_messages(
              $attributes['number'],
              $attributes['form'],
              $attributes['head'],
              $attributes['fields'],
              $attributes['condition'],
              $attributes['order'],
              $attributes['orderby']);

  return $output;
}
add_shortcode('flamingo-inbound-messages', 'flamingo_shortcode_inbound_messages_shortcode');
/* Flamingo shortcode inbound messages */
