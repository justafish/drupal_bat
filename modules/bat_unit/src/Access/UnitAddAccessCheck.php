<?php

namespace Drupal\bat_unit\Access;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Entity\EntityManagerInterface;
use Drupal\Core\Routing\Access\AccessInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\bat_unit\UnitBundleInterface;

/**
 * Determines access to for node add pages.
 */
class UnitAddAccessCheck implements AccessInterface {

  /**
   * The entity manager.
   *
   * @var \Drupal\Core\Entity\EntityManagerInterface
   */
  protected $entityManager;

  /**
   * Constructs a EntityCreateAccessCheck object.
   *
   * @param \Drupal\Core\Entity\EntityManagerInterface $entity_manager
   *   The entity manager.
   */
  public function __construct(EntityManagerInterface $entity_manager) {
    $this->entityManager = $entity_manager;
  }

  /**
   * Checks access to the node add page for the node type.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The currently logged in account.
   * @param \Drupal\bat_unit\UnitBundleInterface $node_type
   *   (optional) The node type. If not specified, access is allowed if there
   *   exists at least one node type for which the user may create a node.
   *
   * @return string
   *   A \Drupal\Core\Access\AccessInterface constant value.
   */
  public function access(AccountInterface $account, UnitBundleInterface $node_type = NULL) {
    $access_control_handler = $this->entityManager->getAccessControlHandler('node');
    // If checking whether a unit of a particular type may be created.
    if ($account->hasPermission('administer bat_unit_bundle entities')) {
      return AccessResult::allowed()->cachePerPermissions();
    }
    if ($node_type) {
      return $access_control_handler->createAccess($node_type->id(), $account, [], TRUE);
    }
    // If checking whether a unit of any type may be created.
    foreach ($this->entityManager->getStorage('bat_unit_bundle')->loadMultiple() as $node_type) {
      if (($access = $access_control_handler->createAccess($node_type->id(), $account, [], TRUE)) && $access->isAllowed()) {
        return $access;
      }
    }

    // No opinion.
    return AccessResult::neutral();
  }

}
