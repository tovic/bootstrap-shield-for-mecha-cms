<?php

Filter::add('chunk:output', function($content, $path) use($config, $speak) {
    $name = File::N($path);
    // Add an icon to the older and newer link text
    if($name === 'pager') {
        $content = str_replace('>' . $speak->newer . '</a>', '><i class="fa fa-angle-left"></i> ' . trim(strip_tags($speak->newer)) . '</a>', $content);
        $content = str_replace('>' . $speak->older . '</a>', '>' . trim(strip_tags($speak->older)) . ' <i class="fa fa-angle-right"></i></a>', $content);
    }
    if($name === 'block.header') {
        $content = str_replace('<p class="blog-slogan">', '<p class="blog-slogan lead">', $content);
    }
    if($name === 'comment.form') {
        $content = str_replace('>' . $speak->publish . '</button>', '><i class="fa fa-send"></i> ' . trim(strip_tags($speak->publish)) . '</button>', $content);
    }
    return $content;
});

Config::set($config->page_type . '_fields_exclude', array('content', 'content_raw'));

Menu::$config['classes']['child'] = 'navbar-nav-submenu navbar-nav-submenu-%d';

Filter::add('navigation:trunk', function($content) {
    return str_replace(' class="parent"', ' class="nav navbar-nav parent"', $content);
});

Filter::add('navigation:twig', function($content) {
    $content = str_replace(' class="current"', ' class="active"', $content);
    $content = str_replace(' class="current ', ' class="active ', $content);
    return $content;
});