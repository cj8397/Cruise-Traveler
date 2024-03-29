<?php

namespace Proengsoft\JsValidation\Support;

trait RuleListTrait
{
    /**
     *  Rules validated with Javascript.
     *
     * @var array
     */
    protected $clientRules = ['Accepted', 'After', 'Alpha', 'AlphaDash',
        'AlphaNum', 'Array', 'Before', 'Between', 'Boolean', 'Confirmed', 'Date',
        'DateFormat', 'Different', 'Digits', 'DigitsBetween', 'Email', 'Image',
        'In', 'Integer', 'Ip', 'Json', 'Max', 'Mimes', 'Min', 'NotIn', 'Numeric',
        'Regex', 'Required', 'RequiredIf', 'RequiredWith', 'RequiredWithAll',
        'RequiredWithout', 'RequiredWithoutAll', 'Same', 'Size', 'Sometimes',
        'String', 'Timezone', 'Url',];

    /**
     * Rules validated in Server-Side.
     *
     * @var array
     */
    protected $serverRules = ['ActiveUrl', 'Exists', 'Unique'];

    /**
     * Rules applyed to files.
     *
     * @var array
     */
    protected $fileRules = ['Image', 'Mimes'];

    /**
     * Rule used to disable validations.
     *
     * @var string
     */
    private $disableJsValidationRule = 'NoJsValidation';

    /**
     * Returns if rule is validated using Javascript.
     *
     * @param $rule
     *
     * @return bool
     */
    protected function isImplemented($rule)
    {
        return in_array($rule, $this->clientRules) || in_array($rule, $this->serverRules);
    }

    /**
     * Check if rule must be validated in server-side.
     *
     * @param $rule
     *
     * @return bool
     */
    protected function isRemoteRule($rule)
    {
        return in_array($rule, $this->serverRules) ||
        !in_array($rule, $this->clientRules);
    }

    /**
     * Check if rule disables rule processing.
     *
     * @param $rule
     *
     * @return bool
     */
    protected function isDisableRule($rule)
    {
        return $rule === $this->disableJsValidationRule;
    }

    /**
     * Check if rules should be validated.
     *
     * @param $rules
     *
     * @return bool
     */
    protected function validationDisabled($rules)
    {
        $rules = (array)$rules;

        return in_array($this->disableJsValidationRule, $rules);
    }

    /**
     * Check if rules is for input file type.
     *
     * @param $rule
     * @return bool
     */
    protected function isFileRule($rule)
    {
        return in_array($rule, $this->fileRules);
    }
}
