<?php

namespace Drupal\devjobs\Controller;


use Drupal\Core\Controller\ControllerBase;
use Drupal\file\Entity\File;
use Drupal\image\Entity\ImageStyle;
use Drupal\node\Entity\Node;
use Drupal\Core\Routing;
use Symfony\Component\HttpFoundation;


/**
// * {@inheritDoc}
 */
class JobsController extends ControllerBase {

  public function content() {
//    et query parameters
    $title = \Drupal::request()->request->get('title'); //mariami
    $location = \Drupal::request()->request->get('location'); //dato
    $checkbox = \Drupal::request()->request->get('checkbox'); //box
//    nodes
    $node_storage= \Drupal::entityTypeManager()->getStorage('node');
//      filter
//    dump($checkbox);
    if(strlen($checkbox)===0){
      $nids = $node_storage->getQuery()
        ->condition('type', 'Jobs')
        ->execute();
    }else{
          $nids = $node_storage->getQuery()
            ->condition('type', 'Jobs')
//            ->condition('title.value', $title)
//            ->condition('field_location.value', $location)
            ->condition('field_job_type.value', $checkbox)
            ->execute();

    }

    $jobs = [];
    foreach ($nids as $nid){
      $node = Node::load($nid);
      $fid = $node -> field_job_logo -> getValue()[0]['target_id'];
        $file = File::load($fid);
        // Get origin image URI
        $image_uri = $file -> getFileUri();
        // Load image style "thumbnail"
        $style = ImageStyle::load('thumbnail');
        // Get URL
        $url = $style -> buildUrl($image_uri);


      $jobs[$nid] = [
        'nid' => $nid,
        'style' => $image_uri,
        'thumbnail' => $url,
        'activity' => $node->field_activity->getValue()[0]['value'],
        'location' => $node->field_location->getValue()[0]['value'],
        'company' => $node->field_company_name->getValue()[0]['value'],
        'type' => $node->field_job_type->getValue()[0]['value'],
        'title' => $node->getTitle(),
      ];
    }
    return [
      // Your theme hook name.
      '#theme' => 'module_name_theme_hook',
      // Your variables.
      '#jobs' => $jobs,
    ];
  }
}
