<?php
/*
 * Plugin Name:       RONE Plugin
 * Description:       This is a basic Plugin
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Razel Ahmed
 * Author URI:        https://razelahmed.com
 */


 class Rone_plugin {
    public function __construct() {
        // Add the init hook
        add_action('init', array($this, 'initialize'));
    }

    function initialize(){
        add_filter('the_title', array($this,'rOne_title_change_func'));
        add_filter('the_content', array($this,'rOne_change_content'));
    }

    // All title Uppercase
    function rOne_title_change_func($postTitle){
        return strtoupper($postTitle);
    }

    // word count & reading time
    function rOne_change_content($contentCnt){
        $content = strip_tags($contentCnt);
        $wordCount = str_word_count($content);
        $readingTime = ceil($wordCount / 200);
        // Check if reading time is singular or plural
        $timeCheck = ($readingTime == 1) ?'Minute':'Minutes';
        return $contentCnt . "<p> $wordCount Words. Approximate reading time $readingTime $timeCheck </p> ";
     }

}

// Initialize the plugin
new Rone_plugin();



//  add_filter( 'the_title', 'rOne_title_change_func' );

//  function rOne_title_change_func($postTitle){
//     return strtoupper($postTitle);
//  }

//  add_filter('the_content','rOne_change_content');

//  function rOne_change_content($contentCnt){
//     $content = strip_tags($contentCnt);
//     $wordCount = str_word_count($content);
//     $readingTime = ceil($wordCount / 200);
//     // Check if reading time is singular or plural
//     $timeCheck = ($readingTime == 1) ?'Minute':'Minutes';
//     return $contentCnt . $wordCount . " Words. Approximate reading time " . $readingTime . $timeCheck;
//  }