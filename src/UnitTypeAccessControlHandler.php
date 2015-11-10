<?php

/**
 * @file
 * Contains \Drupal\bat\UnitTypeAccessControlHandler.
 */

namespace Drupal\bat;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Unit type entity.
 *
 * @see \Drupal\bat\Entity\UnitType.
 */
class UnitTypeAccessControlHandler extends EntityAccessControlHandler {
  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {

    switch ($operation) {
      case 'view':
        return AccessResult::allowedIfHasPermission($account, 'view unit type entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit unit type entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete unit type entities');
    }

    return AccessResult::allowed();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add unit type entities');
  }

}
