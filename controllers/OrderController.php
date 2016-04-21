<?php

namespace app\controllers;

use beastbytes\wizard\WizardBehavior;
use Yii;
use yii\web\Controller;


class OrderController extends Controller
{

    public function beforeAction($action)
    {
        $config = [];
        switch ($action->id) {
            case 'form':
                $config = [
                    'steps' => ['step1', 'step2', 'step3', 'step4'],
                    'events' => [
                        WizardBehavior::EVENT_WIZARD_STEP => [$this, $action->id . 'WizardStep'],
                        WizardBehavior::EVENT_AFTER_WIZARD => [$this, $action->id . 'AfterWizard'],
                        WizardBehavior::EVENT_INVALID_STEP => [$this, 'invalidStep']
                    ]
                ];
                break;
            case 'resume':
                $config = ['steps' => []]; // force attachment of WizardBehavior
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


    public function actionForm($step = null)
    {
        //if ($step===null) $this->resetWizard();
        return $this->step($step);
    }


    /**
     * Process wizard steps.
     * The event handler must set $event->handled=true for the wizard to continue
     * @param WizardEvent The event
     */
    public function formWizardStep($event)
    {
        if (empty($event->stepData)) {
            //$modelName = 'models\\order\\' . ucfirst($event->step);
            $modelName = 'app\models\\' . ucfirst($event->step);
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
            $event->data = $this->render('form/' . $event->step, compact('event', 'model'));
        }
    }

    /**
     * @param WizardEvent The event
     */
    public function invalidStep($event)
    {
        $event->data = $this->render('form/invalidStep', compact('event'));
        $event->continue = false;
    }

    /**
     * Form wizard has ended; the reason can be determined by the
     * step parameter: TRUE = wizard completed, FALSE = wizard did not start,
     * <string> = the step the wizard stopped at
     * @param WizardEvent The event
     */
    public function formAfterWizard($event)
    {
        if (is_string($event->step)) {
            $uuid = sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                mt_rand(0, 0xffff), mt_rand(0, 0xffff),
                mt_rand(0, 0xffff),
                mt_rand(0, 0x0fff) | 0x4000,
                mt_rand(0, 0x3fff) | 0x8000,
                mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
            );

            $registrationDir = Yii::getAlias('@runtime/order');
            $registrationDirReady = true;
            if (!file_exists($registrationDir)) {
                if (!mkdir($registrationDir) || !chmod($registrationDir, 0775)) {
                    $registrationDirReady = false;
                }
            }
            if ($registrationDirReady && file_put_contents(
                    $registrationDir . DIRECTORY_SEPARATOR . $uuid,
                    $event->sender->pauseWizard()
                )
            ) {
                $event->data = $this->render('form/paused', compact('uuid'));
            } else {
                $event->data = $this->render('form/notPaused');
            }
        } elseif ($event->step === null) {
            $event->data = $this->render('form/cancelled');
        } elseif ($event->step) {
            $event->data = $this->render('form/complete', [
                'data' => $event->stepData
            ]);
        } else {
            $event->data = $this->render('order/notStarted');
        }
    }

    /**
     * Method description
     *
     * @return mixed The return value
     */
    public function actionResume($uuid)
    {
        $registrationFile = Yii::getAlias('@runtime/form') . DIRECTORY_SEPARATOR . $uuid;
        if (file_exists($registrationFile)) {
            $this->resumeWizard(@file_get_contents($registrationFile));
            unlink($registrationFile);
            $this->redirect(['order']);
        } else {
            return $this->render('form/notResumed');
        }
    }


}
