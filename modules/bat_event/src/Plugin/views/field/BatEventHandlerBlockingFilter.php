<?php

/**
 * @file
 */

namespace Drupal\bat_event\Plugin\views\field;

class BatEventHandlerBlockingFilter extends views_handler_filter_boolean_operator {
  function construct() {
    parent::construct();

    $this->value_value = t('State');
  }

  function get_value_options() {
    $options = array(
      'blocking' => t('Blocking'),
      'not_blocking' => t('Not blocking'),
    );

    $this->value_options = $options;
  }

  function query() {
    $this->ensure_my_table();

    if ($this->value == 'not_blocking' || $this->value == 'blocking') {
      $state_reference_join = new views_join();
      $state_reference_join->table = 'field_data_event_state_reference';
      $state_reference_join->field = 'entity_id';
      $state_reference_join->left_table = 'bat_events';
      $state_reference_join->left_field = 'event_id';
      $state_reference_join->type = 'left';

      $this->query->add_relationship('field_data_event_state_reference', $state_reference_join, 'bat_events');

      $state_join = new views_join();
      $state_join->table = 'bat_event_state';
      $state_join->field = 'id';
      $state_join->left_table = 'field_data_event_state_reference';
      $state_join->left_field = 'event_state_reference_state_id';
      $state_join->type = 'left';

      $this->query->add_relationship('bat_event_state', $state_join, 'field_data_event_state_reference');

      if ($this->value == 'not_blocking') {
        $this->query->add_where(1, 'bat_event_state.blocking', '0', '=');
      }
      elseif ($this->value == 'blocking') {
        $this->query->add_where(1, 'bat_event_state.blocking', '1', '=');
      }
    }
  }

  function admin_summary() {
    if ($this->is_a_group()) {
      return t('grouped');
    }
    if (!empty($this->options['exposed'])) {
      return t('exposed');
    }
    if (empty($this->value_options)) {
      $this->get_value_options();
    }

    return $this->value_options[$this->value];
  }
}
