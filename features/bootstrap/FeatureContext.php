<?php

use Behat\FlexibleMink\Context\SpinnerContext;
use Behat\MinkExtension\Context\MinkContext;

/**
 * Defines step implementations from the context of a Web Page.
 */
class FeatureContext extends MinkContext {

    use SpinnerContext;

    /**
     * {@inheritdoc}
     *
     * Extends the MinkContext::assertPageContainsText so that the assertion does not fail immediately, but instead
     * continually checks for the text as many times as possible during the timeout period. As soon as the text
     * is found, the assertion is passed. If the timeout expires and the assertion has not passed, then the normal
     * ExpectationException is thrown.
     */
    public function assertPageContainsText($text) {
        $this->waitFor(function() use ($text) {
            parent::assertPageContainsText($text);
        });
    }
}
