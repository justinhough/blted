<?php

namespace Drupal\field_visibility\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\node\Entity\NodeType;
use Drupal\Core\Url;
use Drupal\Core\Link;

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

    foreach ($content_types as $mach_name => $type) {
      $url = Url::fromRoute('field_visibility.field_visibility_settings', ['content_type' => $mach_name]);
      $types[] = [Link::fromTextAndUrl($type->get('name'), $url)->toString()];
    }
    $build["header"] = array(
      "#markup" => "<h1>Node Field Visibility Settings - Select Content Type</h1>",
    );
    $build['table'] = [
      '#type' => 'table',
      '#rows' => $types,
    ];

    return $build;
  }

}
