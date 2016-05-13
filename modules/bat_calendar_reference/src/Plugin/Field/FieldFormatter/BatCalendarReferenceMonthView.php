<?php

namespace Drupal\bat_calendar_reference\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * @FieldFormatter(
 *   id = "bat_calendar_reference_month_view",
 *   label = @Translation("Month View"),
 *   field_types = {
 *     "bat_calendar_unit_reference",
 *     "bat_calendar_unit_type_reference",
 *   }
 * )
 */
class BatCalendarReferenceMonthView extends FormatterBase {

	/**
	 * {@inheritdoc}
	 */
	public function viewElements(FieldItemListInterface $items, $langcode) {
		/*if ($field['type'] == 'bat_calendar_unit_type_reference') {
      $unit_type_names = array();
      $unit_type_ids = array();

      foreach ($items as $delta => $item) {
        if ($unit_type = bat_type_load($item['unit_type_id'])) {
          $unit_type_names[] = $unit_type->name;
          $unit_type_ids[] = $unit_type->type_id;
        }

        if ($type = bat_event_type_load($item['event_type_id'])) {
          $event_type = $type->type;

          $event_granularity = $type->event_granularity;
        }
      }

      if (!empty($unit_type_ids)) {
        $header = '<div class="calendar-title"><h2>' . implode(', ', $unit_type_names) . '</h2></div>';

        // Inject settings in javascript that we will use.
        $fc_user_settings[$calendar_id] = array(
          'unitTypes' => $unit_type_ids,
          'unitIDs' => '',
          'eventType' => $event_type,
          'calendar_id' => 'fullcalendar-scheduler',
          'modal_style' => 'default',
          'eventGranularity' => $event_granularity,
          'editable' => FALSE,
          'selectable' => FALSE,
          'background' => '1',
        );

        if ($display['type'] == 'bat_calendar_reference_month_view') {
          $fc_user_settings[$calendar_id]['defaultView'] = 'month';
          $fc_user_settings[$calendar_id]['views'] = 'month';
          $fc_user_settings[$calendar_id]['background'] = '0';
          $fc_user_settings[$calendar_id]['headerLeft'] = 'today';
          $fc_user_settings[$calendar_id]['headerCenter'] = 'title';
          $fc_user_settings[$calendar_id]['headerRight'] = 'prev, next';
        }
      }
    }
    elseif ($field['type'] == 'bat_calendar_unit_reference') {
      $unit_names = array();
      $unit_ids = array();

      foreach ($items as $delta => $item) {
        if ($unit = bat_unit_load($item['unit_id'])) {
          $unit_names[] = $unit->name;
          $unit_ids[] = $unit->unit_id;
        }

        if ($type = bat_event_type_load($item['event_type_id'])) {
          $event_type = $type->type;

          $event_granularity = $type->event_granularity;
        }
      }

      if (!empty($unit_ids)) {
        $header = '<div class="calendar-title"><h2>' . implode(', ', $unit_names) . '</h2></div>';

        // Inject settings in javascript that we will use.
        $fc_user_settings[$calendar_id] = array(
          'unitTypes' => 'all',
          'unitIDs' => $unit_ids,
          'eventType' => $event_type,
          'calendar_id' => 'fullcalendar-scheduler',
          'modal_style' => 'default',
          'eventGranularity' => $event_granularity,
          'editable' => FALSE,
          'selectable' => FALSE,
          'background' => '1',
        );

        if ($display['type'] == 'bat_calendar_reference_month_view') {
          $fc_user_settings[$calendar_id]['defaultView'] = 'month';
          $fc_user_settings[$calendar_id]['views'] = 'month';
          $fc_user_settings[$calendar_id]['background'] = '0';
          $fc_user_settings[$calendar_id]['headerLeft'] = 'today';
          $fc_user_settings[$calendar_id]['headerCenter'] = 'title';
          $fc_user_settings[$calendar_id]['headerRight'] = 'prev, next';
        }
      }
    }*/
	}

}
