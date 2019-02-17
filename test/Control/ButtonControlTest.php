<?php
declare(strict_types=1);

namespace SetBased\Abc\Form\Test\Control;

use SetBased\Abc\Form\Control\ButtonControl;
use SetBased\Abc\Form\Control\SimpleControl;

/**
 * Unit tests for class ButtonControl.
 */
class ButtonControlTest extends PushControlTest
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test control is hidden.
   */
  public function testIsHidden(): void
  {
    $control = new ButtonControl('hidden');

    self::assertSame(false, $control->isHidden());
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * @inheritdoc
   */
  protected function getControl(string $name): SimpleControl
  {
    return new ButtonControl($name);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns button type for form control.
   *
   * @return string
   */
  protected function getControlType(): string
  {
    return 'button';
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
