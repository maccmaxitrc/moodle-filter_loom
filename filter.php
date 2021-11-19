<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 *  Loom Embed Filter
 *
 *  This filter will find Loom embed links and
 *  transform them into embedded video players
 *
 * @package    filter
 * @subpackage loom
 * @author     Max MacCluer
 * @copyright  2021 Idaho State University
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class filter_loom extends moodle_text_filter {
    public function filter($text, array $options = array()) {

        if (!is_string($text) or empty($text)) {
            // Non-string data can not be filtered anyway.
            return $text;
        }

        if (stripos($text, 'loom.com') === false) {
            // Performance shortcut - if there is no Loom URL, nothing can match.
            return $text;
        }

        $callback = function($matches) {
            $match = $matches[0];
            if (stripos($match, "share") > 0) {
                $match = str_replace("share", "embed", $matches[0]);
            }
            if (stripos($match, "https") === false) {
                $match = "https://" . $match;
            }
            $width = get_config('filter_loom', 'width') ?: 400;
            $height = get_config('filter_loom', 'height') ?: 300;
            $hideOwner = get_config('filter_loom', 'hideowner') ? 'hide_owner=true&' : '';
            $hideShare = get_config('filter_loom', 'hideshare') ? 'hide_share=true&' : '';
            $hideTitle = get_config('filter_loom', 'hidetitle') ? 'hide_title=true&' : '';
            $hideEmbedTopBar = get_config('filter_loom', 'hideembedtopbar') ? 'hideEmbedTopBar=true&' : '';
            return "<iframe src=\"{$match}" . "?" . $hideOwner . $hideShare . $hideTitle . $hideEmbedTopBar .
                    '" frameborder="0" width="' .
                    $width . '" height="' . $height .
                    '" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>';
        };

        $pattern = "/(?:https:\/\/)?(?:www\.)?loom\.com\/(?:share|embed)\/\w+/";
        return preg_replace_callback($pattern, $callback, $text);
    }
}
