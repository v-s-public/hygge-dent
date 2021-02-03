<?php

namespace App\Services\Frontend;

use App\Models\Content\Article;

class Articles
{
    /**
     * Get article title markup by article short code
     *
     * @param string $shortCode
     * @param string $htmlTag
     * @param string $cssClass
     * @return string
     */
    public static function getArticleTitleByShortCode(string $shortCode, string $htmlTag, string $cssClass) : string
    {
        $article = Article::where('short_code', $shortCode)->first();
        if (!$article || !$article->title) return '';

        return "<{$htmlTag} class='{$cssClass}'>{$article->title}</{$htmlTag}>";
    }

    /**
     * Get article text markup by article short code
     *
     * @param string $shortCode
     * @param string $htmlTag
     * @param string $cssClass
     * @return string
     */
    public static function getArticleTextByShortCode(string $shortCode, string $htmlTag, string $cssClass) : string
    {
        $article = Article::where('short_code', $shortCode)->first();
        if (!$article || !$article->text) return '';

        return "<{$htmlTag} class='{$cssClass}'>{$article->text}</{$htmlTag}>";
    }
}
