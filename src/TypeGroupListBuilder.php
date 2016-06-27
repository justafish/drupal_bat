<?php

/**
 * @file
 * Contains \Drupal\bat\TypeGroupListBuilder.
 */

namespace Drupal\bat;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Routing\LinkGeneratorTrait;
use Drupal\Core\Url;

/**
 * Defines a class to build a listing of Type Group entities.
 *
 * @ingroup bat
 */
class TypeGroupListBuilder extends EntityListBuilder {
  use LinkGeneratorTrait;
  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Type Group ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    $row['id'] = $entity->id();
    $row['name'] = $this->l(
      $this->getLabel($entity),
      new Url(
        'entity.bat_type_group.edit_form', array(
          'bat_type_group' => $entity->id(),
        )
      )
    );
    return $row + parent::buildRow($entity);
  }

}