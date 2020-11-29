<?php
declare(strict_types=1);

namespace Plaisio\Form\Control;

use Plaisio\Form\Control\Traits\InputElement;
use Plaisio\Form\Control\Traits\LoadPlainText;

/**
 * Class for form controls of type [input:hidden](http://www.w3schools.com/tags/tag_input.asp).
 */
class HiddenControl extends SimpleControl
{
  //--------------------------------------------------------------------------------------------------------------------
  use InputElement;
  use LoadPlainText;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the HTML code for this form control.
   *
   * @return string
   *
   * @since 1.0.0
   * @api
   */
  public function getHtml(): string
  {
    return $this->generateInputElement();
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * @inheritDoc
   */
  protected function prepare(string $parentSubmitName): void
  {
    parent::prepare($parentSubmitName);

    $this->prepareInputElement('hidden');
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * A hidden control must never be shown in a table.
   *
   * @return string An empty string.
   */
  public function getHtmlTableCell(): string
  {
    return '';
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns true.
   *
   * @since 1.0.0
   * @api
   */
  public function isHidden(): bool
  {
    return true;
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
