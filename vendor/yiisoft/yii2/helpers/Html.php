<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yii\helpers;

use Yii;

/**
 * Html provides a set of static methods for generating commonly used HTML tags.
 *
 * Nearly all of the methods in this class allow setting additional html attributes for the html
 * tags they generate. You can specify for example. 'class', 'style'  or 'id' for an html element
 * using the `$options` parameter. See the documentation of the [[tag()]] method for more details.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Html extends BaseHtml
{

    /**
     * @return string
     * I'm going to use this to loop through all existing flash messages that have accumulated in any
     * controller action
     */
    public static function showFlashMessages()
    {
        $msg = "";
        foreach (Yii::$app->session->getAllFlashesNormalized() as $flash) {
            $msg .= "<div class='alert alert-" . $flash['key'] . " fade in' role='alert'>";
            $msg .= "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
            $msg .= $flash['message'];
            $msg .= "</div>";
        }
        return $msg;
    }

}
