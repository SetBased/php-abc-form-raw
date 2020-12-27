<?php
declare(strict_types=1);

namespace Plaisio\Form\Test\Control;

use Plaisio\Form\Control\FieldSet;
use Plaisio\Form\Control\ForceSubmitControl;
use Plaisio\Form\Control\InvisibleControl;
use Plaisio\Form\Control\SimpleControl;
use Plaisio\Form\RawForm;
use Plaisio\Form\Test\Control\Traits\TestInputElement;
use Plaisio\Form\Test\PlaisioTestCase;

/**
 * Unit tests for class InvisibleControl.
 */
class InvisibleControlTest extends PlaisioTestCase
{
  //--------------------------------------------------------------------------------------------------------------------
  use TestInputElement;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test submitted value is not loaded.
   */
  public function testForm1(): void
  {
    $_POST['name'] = '2';

    $form     = new RawForm();
    $fieldset = new FieldSet();
    $form->addFieldSet($fieldset);

    $input = new InvisibleControl('name');
    $input->setValue('1');
    $fieldset->addFormControl($input);

    $input = new ForceSubmitControl('submit', true);
    $input->setMethod('handleSubmit');
    $fieldset->addFormControl($input);

    $method  = $form->execute();
    $values  = $form->getValues();
    $changed = $form->getChangedControls();

    self::assertTrue($form->isValid());
    self::assertSame('handleSubmit', $method);
    self::assertEquals('1', $values['name']);
    self::assertArrayNotHasKey('name', $changed);
  }
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test control is hidden.
   */
  public function testIsHidden(): void
  {
    $control = new InvisibleControl('hidden');

    self::assertSame(true, $control->isHidden());
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Tests for methods setPrefix() and setPostfix().
   */
  public function testPrefixAndPostfix(): void
  {
    $form     = new RawForm();
    $fieldset = new FieldSet();
    $form->addFieldSet($fieldset);

    $input = new InvisibleControl('name');
    $input->setPrefix('Hello')
          ->setPostfix('World');
    $fieldset->addFormControl($input);

    $html = $form->getHtml();

    $pos = strpos($html, 'Hello<input');
    self::assertNotEquals(false, $pos);

    $pos = strpos($html, '/>World');
    self::assertNotEquals(false, $pos);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns an instance of the form control to be tested.
   *
   * @param string $name the name of the form control.
   *
   * @return SimpleControl
   */
  protected function createControl(string $name): SimpleControl
  {
    return new InvisibleControl($name);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the type of form control.
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


