<?php
/**
 * WizardMenu Class file
 *
 * @author    Chris Yates
 * @copyright Copyright &copy; 2015 BeastBytes - All Rights Reserved
 * @license   BSD 3-Clause
 * @package   Wizard
 */

namespace beastbytes\wizard;

use yii\widgets\Menu;

/**
 * WizardMenu class.
 * Creates a menu from the wizard steps.
 */
class WizardMenu extends Menu
{

    /**
     * @var string the template used to render the body of a menu which is a link.
     * In this template, the token `{url}` will be replaced with the corresponding link URL;
     * while `{label}` will be replaced with the link text.
     * This property will be overridden by the `template` option set in individual menu items via [[items]].
     */
    public $linkTemplate = '<a href="{url}" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                {label}
                            </span>
                            </a>';
    //<i class="glyphicon glyphicon-folder-open"></i>


    /**
     * @var string the template used to render the body of a menu which is NOT a link.
     * In this template, the token `{label}` will be replaced with the label of the menu item.
     * This property will be overridden by the `template` option set in individual menu items via [[items]].
     */
    public $labelTemplate = '<a href="" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                {label}
                            </span>
                            </a>';
    //public $labelTemplate = "";
    //public $labelTemplate = '<i class="glyphicon glyphicon-folder-open"></i>';
    //public $labelTemplate = '{label}';


    // <ul class="nav nav-tabs" role="tablist">
    public $options = [
        'class' => 'nav nav-tabs',
        'role' => 'tablist',
    ];


    public $itemOptions = ['role' => 'presentation'];


    /**
     * @var string The CSS class for the current step
     */
    public $currentStepCssClass = 'active';
    /**
     * @var array The item to be shown to indicate completion of the wizard.
     * e.g. ['label' => 'Done', 'url' => null]
     */
    public $finalItem;
    /**
     * @var string The CSS class for future steps
     */
    public $futureStepCssClass = 'disabled';
    /**
     * @var string The CSS class for past steps
     */
    public $pastStepCssClass = 'past-step';
    /**
     * @var string The current step
     */
    public $step;
    /**
     * @var \beastbytes\wizard\WizardBehavior The Wizard
     */
    public $wizard;

    /**
     * Initialise the widget
     */
    public function init()
    {
        $route = ['/' . $this->wizard->owner->route];
        $params = $this->wizard->owner->actionParams;
        $steps = $this->wizard->steps;
        $index = array_search($this->step, $steps);

        foreach ($steps as $step) {
            $stepIndex = array_search($step, $steps);
            $params[$this->wizard->queryParam] = $step;

            if ($stepIndex == $index) {
                $active = true;
                $class = $this->currentStepCssClass;
                $url = array_merge($route, $params);
            } elseif ($stepIndex < $index) {
                $active = false;
                $class = $this->pastStepCssClass;
                $url = ($this->wizard->forwardOnly
                    ? null : array_merge($route, $params)
                );
            } else {
                $active = false;
                $class = $this->futureStepCssClass;
                $url = null;
            }

            $this->items[] = [
                'label' => $this->wizard->stepLabel($step),
                'url' => $url,
                'active' => $active,
                'options' => compact('class')
            ];

            if (!empty($this->finalItem)) {
                $this->items[] = $this->finalItem;
            }
        }
    }


    public static function pre()
    {
        return "
                    <div class='wizard'>
                        <div class='wizard-inner'>
                            <div class='connecting-line'></div>
        ";
    }

    public static function post()
    {
        return "
                        </div>
                    </div>
        ";
    }
}
