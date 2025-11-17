<?php

require_once($modx->config['base_path'].'assets/snippets/star_rating/starrating.class.php');
require_once($modx->config['base_path'].'assets/lib/document.class.inc.php');

$e = $modx->Event;

if ($e->name=="OnDocFormPrerender") {
    $starRating = new StarRating($modx);
    $rating = $starRating->getRating($id);

    if ( !empty($rating) ) {

        $doc = new Document( $id );
        // if ( $doc->GetTV( 'ratingVotes' ) && $doc->GetTV( 'rating' ) ) {
            $doc->setTV( 'ratingVotes', $rating['votes'] );
            $doc->setTV( 'rating', $rating['rating'] );
            $doc->Save();
            // echo "<pre>";print_r($rating);echo "</pre>";die;
        // }
    }
}

if ($modx->Event->name=="OnDocFormSave") {
    $tv_vote = $modx->getTemplateVar('ratingVotes', '*', $id);
    $tv_rating = $modx->getTemplateVar('rating', '*', $id);

    $starRating = new StarRating( $modx );
    $rating = $starRating->getRating($id);
    // if ( !$rating ) {
        if ( ! empty( $tv_vote['value'] ) && ! empty( $tv_rating['value'] ) ) {

            $result = $starRating->setVote( $tv_rating['value'], $id, $tv_vote['value'] );
            // echo "<pre>";print_r( $result );echo "</pre>";die();
        }
    // }
}