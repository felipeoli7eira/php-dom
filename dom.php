<?php

function createSelfCloseTag(string $tagName, array $props): string {

    $tag = "<{$tagName}";

    if ( array_key_exists('attributes', $props) && !empty($props['attributes']) ) {
        foreach ($props['attributes'] as $attrName => $attrValue) {
            $tag .= " {$attrName}=\"{$attrValue}\"";
        }
    }

    $tag .= " />";

    return $tag;
}

function tag(string $tagName, array $props): string {
    $tag = "<{$tagName}";

    if ( array_key_exists('attributes', $props) && !empty($props['attributes']) ) {
        foreach ($props['attributes'] as $attrName => $attrValue) {
            $tag .= " {$attrName}=\"{$attrValue}\"";
        }
    }

    $tag .= ">";

    foreach ($props['inner'] as $content) {
        $tag .= $content;
    }

    $tag .= "</{$tagName}>";

    return $tag;
}

function createHtmlTag(string $tagName, array $tagConfigs): string {

    if ( array_key_exists('selfClose', $tagConfigs) && $tagConfigs['selfClose'] === true ) {
        return createSelfCloseTag($tagName, $tagConfigs);
    }

    return tag($tagName, $tagConfigs);
}

function view(string $viewName, array $data) {
    $viewFile = file_get_contents("./{$viewName}");

    foreach ($data as $varName => $varContent) {
        $viewFile = str_replace('{{' . $varName . '}}', $varContent, $viewFile);
    }

    return $viewFile;
}