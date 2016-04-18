<?php
namespace beastbytes\wizard\controllers;

use beastbytes\wizard\WizardBehavior;
use Yii;
use yii\web\Controller;

class WizardController extends Controller
{

    public function beforeAction($action)
    {
        $config = [];
        switch ($action->id) {
            case 'orderForm':
                $config = [
                    'steps' => ['orderformStep1', 'orderformStep2', 'orderformStep3', 'orderformStep4'],
                    'events' => [
                        WizardBehavior::EVENT_WIZARD_STEP => [$this, $action->id . 'WizardStep'],
                        WizardBehavior::EVENT_AFTER_WIZARD => [$this, $action->id . 'AfterWizard'],
                        WizardBehavior::EVENT_INVALID_STEP => [$this, 'invalidStep']
                    ]
                ];
                break;

            case 'resume':
                $config = ['steps' => []]; // force attachment of WizardBehavior
                break;

            default:
                break;
        }

        if (!empty($config)) {
            $config['class'] = WizardBehavior::className();
            $this->attachBehavior('wizard', $config);
        }

        return parent::beforeAction($action);
    }


    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionOrderForm($step = null)
    {
        //if ($step===null) $this->resetWizard();
        return $this->step($step);
    }


    /**
     * Process wizard steps.
     * The event handler must set $event->handled=true for the wizard to continue
     * @param WizardEvent The event
     */
    public function orderFormWizardStep($event)
    {
        if (empty($event->stepData)) {
            $modelName = 'backend\\models\\wizard\\orderForm\\' . ucfirst($event->step);
            $model = new $modelName();
        } else {
            $model = $event->stepData;
        }

        $post = Yii::$app->request->post();
        if (isset($post['cancel'])) {
            $event->continue = false;
        } elseif (isset($post['prev'])) {
            $event->nextStep = WizardBehavior::DIRECTION_BACKWARD;
            $event->handled = true;
        } elseif ($model->load($post) && $model->validate()) {
            $event->data = $model;
            $event->handled = true;

            if (isset($post['pause'])) {
                $event->continue = false;
            } elseif ($event->n < 2 && isset($post['add'])) {
                $event->nextStep = WizardBehavior::DIRECTION_REPEAT;
            }
        } else {
            $event->data = $this->render('orderForm\\' . $event->step, compact('event', 'model'));
        }
    }

    /**
     * @param WizardEvent The event
     */
    public function invalidStep($event)
    {
        $event->data = $this->render('invalidStep', compact('event'));
        $event->continue = false;
    }

    /**
     * OrderForm wizard has ended; the reason can be determined by the
     * step parameter: TRUE = wizard completed, FALSE = wizard did not start,
     * <string> = the step the wizard stopped at
     * @param WizardEvent The event
     */
    public function orderFormAfterWizard($event)
    {
        if (is_string($event->step)) {
            $uuid = sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                mt_rand(0, 0xffff), mt_rand(0, 0xffff),
                mt_rand(0, 0xffff),
                mt_rand(0, 0x0fff) | 0x4000,
                mt_rand(0, 0x3fff) | 0x8000,
                mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
            );

            $orderFormDir = Yii::getAlias('@runtime/orderForm');
            $orderFormDirReady = true;
            if (!file_exists($orderFormDir)) {
                if (!mkdir($orderFormDir) || !chmod($orderFormDir, 0775)) {
                    $orderFormDirReady = false;
                }
            }
            if ($orderFormDirReady && file_put_contents(
                    $orderFormDir . DIRECTORY_SEPARATOR . $uuid,
                    $event->sender->pauseWizard()
                )
            ) {
                $event->data = $this->render('orderForm\\paused', compact('uuid'));
            } else {
                $event->data = $this->render('orderForm\\notPaused');
            }
        } elseif ($event->step === null) {
            $event->data = $this->render('orderForm\\cancelled');
        } elseif ($event->step) {
            $event->data = $this->render('orderForm\\complete', [
                'data' => $event->stepData
            ]);
        } else {
            $event->data = $this->render('orderForm\\notStarted');
        }
    }

    /**
     * Method description
     *
     * @return mixed The return value
     */
    public function actionResume($uuid)
    {
        $orderFormFile = Yii::getAlias('@runtime/orderForm') . DIRECTORY_SEPARATOR . $uuid;
        if (file_exists($orderFormFile)) {
            $this->resumeWizard(@file_get_contents($orderFormFile));
            unlink($orderFormFile);
            $this->redirect(['orderForm']);
        } else {
            return $this->render('orderForm\\notResumed');
        }
    }

}
