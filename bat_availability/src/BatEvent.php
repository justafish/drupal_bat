<?php

/**
 * @file
 * Contains \Drupal\bat_availability\BatEvent.
 */

namespace Drupal\bat_availability;

use Drupal\bat_availability\BatEventInterface;

/**
 *
 */
class BatEvent implements BatEventInterface {
  /**
   *
   */
  private $start_date;

  /**
   *
   */
  private $end_date;

  /**
   *
   */
  private $state;

  /**
   *
   */
  private $event_id;

  /**
   *
   */
  public function __construct($start_date, $end_date, $state) {
    $this->start_date = $start_date;
    $this->end_date = $end_date;
    $this->state = $state;
  }

  /**
   *
   */
  public function getStartDate() {
    return clone($this->start_date);
  }

  /**
   *
   */
  public function getEndDate() {
    return clone($this->end_date);
  }

  /**
   *
   */
  public function setStartDate(\DateTime $start_date) {
    $this->start_date = clone($start_date);
  }

  /**
   *
   */
  public function setEndDate(\DateTime $end_date) {
    $this->end_date = clone($end_date);
  }

  /**
   *
   */
  public function getState() {
    return $this->state;
  }

  /**
   *
   */
  public function setState($state) {
    $this->state = $state;
  }

  /**
   *
   */
  public function getStateInteger() {
    db_merge('availability_states_map')
      ->keys(array('state_id' => $this->state))
      ->fields(array('state_id' => $this->state))
      ->execute();

    return db_select('availability_states_map', 'm')
            ->fields('m', array('id'))
            ->condition('state_id', $this->state)
            ->execute()
            ->fetchField();
  }

  /**
   *
   */
  public function getEventId() {
    return $event_id;
  }
}
