<?php
use App\Models\Page;
use App\Models\Block;

/**
 * Write code on Method
 * 
 */
if (! function_exists('block')) {
    function block($block)
    {
        $block = Block::where("block", $block)->first();
        return $block->description;
    }
}

if (! function_exists('block')) {
    function block($title)
    {
        $page = Page::where("title", $title)->first();
        return $block->description;
    }
}