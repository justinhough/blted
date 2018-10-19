<?php

namespace Drupal\field_visibility\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Entity\EntityFieldManagerInterface;
use Drupal\Core\Entity\EntityManagerInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;

/**
 * Class FieldVisibilitySettings.
 */
class FieldVisibilitySettings extends ConfigFormBase {

  /**
   * Drupal\Core\Entity\EntityFieldManagerInterface definition.
   *
   * @var \Drupal\Core\Entity\EntityFieldManagerInterface
   */
  protected $entityFieldManager;
  /**
   * Drupal\Core\Entity\EntityManagerInterface definition.
   *
   * @var \Drupal\Core\Entity\EntityManagerInterface
   */
  protected $entityManager;
  /**
   * Drupal\Core\Entity\EntityTypeManagerInterface definition.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;
  /**
   * Constructs a new FieldVisibilitySettings object.
   */
  public function __construct(
    ConfigFactoryInterface $config_factory,
      EntityFieldManagerInterface $entity_field_manager,
    EntityManagerInterface $entity_manager,
    EntityTypeManagerInterface $entity_type_manager
    ) {
    parent::__construct($config_factory);
        $this->entityFieldManager = $entity_field_manager;
    $this->entityManager = $entity_manager;
    $this->entityTypeManager = $entity_type_manager;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory'),
            $container->get('entity_field.manager'),
      $container->get('entity.manager'),
      $container->get('entity_type.manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'field_visibility.fieldvisibilitysettings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'field_visibility_settings';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('field_visibility.fieldvisibilitysettings');
    $form['field_name'] = [
      '#type' => 'checkboxes',
      '#title' => $this->t('Field'),
      '#options' => ['1' => $this->t('1'), '2' => $this->t('2'), '3' => $this->t('3')],
      '#default_value' => $config->get('field_name'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('field_visibility.fieldvisibilitysettings')
      ->set('field_name', $form_state->getValue('field_name'))
      ->save();
  }

}
