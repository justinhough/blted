<?php

namespace Drupal\field_visibility\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\node\Entity\NodeType;
use Drupal\Core\Url;

/**
 * Class FieldVisibilityController.
 */
class FieldVisibilityController extends ControllerBase {

  /**
   * Drupal\Core\Entity\EntityTypeManagerInterface definition.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Constructs a new FieldVisibilityController object.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager) {
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity_type.manager')
    );
  }

  /**
   * Select Content Types.
   *
   * @return array
   *   Return render array.
   */
  public function selectTypes() {
    $build = [];
    $content_types = NodeType::loadMultiple();
    $types = [];

    $output = '<h1>Node Field Visibility Settings - Select Content Type</h1>';
    foreach ($content_types as $mach_name => $type) {
      $url = Url::fromRoute();
      $types[] = array(l($type->name, "/admin/structure/field_visibility/$mach_name"));// TODO: create form and route
    }

    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: hello')
    ];
  }

}
