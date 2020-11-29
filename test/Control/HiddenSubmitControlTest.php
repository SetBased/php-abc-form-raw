<?php
declare(strict_types=1);

namespace Plaisio\Form\Test\Control;

use Plaisio\Form\Control\FieldSet;
use Plaisio\Form\Control\HiddenSubmitControl;
use Plaisio\Form\Control\SimpleControl;
use Plaisio\Form\RawForm;

/**
 * Unit tests for class HiddenSubmitControl.
 */
class HiddenSubmitControlTest extends PushControlTest
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test HTML generated by element.
   */
  public function testHtml(): void
  {
    $input = new HiddenSubmitControl('myInput');

    $fieldSet = new FieldSet('myFieldSet');
    $fieldSet->addFormControl($input);

    $form = new RawForm('myForm');
    $form->addFieldSet($fieldSet);

    $html     = $form->getHtml();
    $expected = '<form method="post" action="/"><fieldset><input type="hidden" name="myForm[myFieldSet][myInput]"/></fieldset></form>';
    self::assertSame($expected, $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test control is hidden.
   */
  public function testIsHidden(): void
  {
    $control = new HiddenSubmitControl('hidden-button');

    self::assertSame(true, $control->isHidden());
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * @inheritdoc
   */
  protected function getControl(string $name): SimpleControl
  {
    return new HiddenSubmitControl($name);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns input type for form control.
   *
   * @return string
   */
  protected function getControlType(): string
  {
    return 'hidden';
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
