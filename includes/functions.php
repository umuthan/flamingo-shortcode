<?php

/**
 * Get inbound messages from flamingo
 * number='-1' form='all' head='no' fields='all' condition='no' order='desc' orderby='date'
 */
function flamingo_shortcode_get_inbound_messages($number, $form, $head, $fields, $condition, $order, $orderby) {
  if($form!="all") {

    $formID = get_term_by('name', get_the_title($form), 'flamingo_inbound_channel');
    $formID = $formID->term_id;

    $form_query = array(
          array(
              'taxonomy' => 'flamingo_inbound_channel',
              'field' => 'term_id',
              'terms' => $formID,
          )
      );

  }

  if($head!='no') {

    $head = explode(',', $head);
    $header = array();

    foreach ($head as $value) {
      $header[] = $value;
    }

  }

  if($fields!='all') {

    $fields = explode(',', $fields);
    $selectedFields = array();

    foreach ($fields as $field) {
      $selectedFields[] = '_field_'.$field;
    }

  }

  if($condition!='no') {

    $condition_query = array();

    $conditions = explode(';', $condition);
    foreach ($conditions as $condition) {
      $condition = explode(':', $condition);

      $condition_query[] = array(
        'key'     => '_field_'.$condition[0],
        'value'   => $condition[2],
        'compare' => $condition[1],
      );
    }

  }

  $args = array(
    'numberposts' => $number,
    'post_type'   => 'flamingo_inbound',
    'order'       => $order,
    'orderby'     => $orderby,
    'tax_query'   => $form_query,
    'meta_query'  => $condition_query
  );

  $flamingoMessages = get_posts($args);

  $output = '<table>';

  if($flamingoMessages) {

    $output .= '<thead>
    <tr>';
    foreach ($header as $value) {
      $output .= '<td>'.$value.'</td>';
    }
    $output .= '</tr>
    </thead>';

    foreach ($flamingoMessages as $message) :
      $output .= '<tr>';

      $formfields = get_post_meta($message->ID);
    	foreach($formfields as $meta_key=>$meta_value) {
        if(stristr($meta_key, '_field_') !== FALSE) {
          $meta_key_value = get_post_meta( $message->ID, $meta_key, true );
    			if(is_array($meta_key_value)) {
    				$meta_key_value = implode(",",$meta_key_value);
    			}
          if($fields=='all') {
            $output .= '<td>';
    				$output .= $meta_key_value;
    				$output .= '</td>';
          } else {
            if(in_array($meta_key, $selectedFields)) {
              $output .= '<td>';
              $output .= $meta_key_value;
					    $output .= '</td>';
            }
          }
        }
    	}

      $output .= '</tr>';

    endforeach;
    wp_reset_postdata();
  }

  $output .= '</table>';

  return $output;
}
