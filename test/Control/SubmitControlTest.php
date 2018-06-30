<?php

namespace SetBased\Abc\Form\Test\Control;

use SetBased\Abc\Form\Control\SubmitControl;

/**
 * Unit tests for class SubmitControl.
 */
class SubmitControlTest extends PushControlTest
{
  //--------------------------------------------------------------------------------------------------------------------
  public function testAttributes()
  {
    $attributes = ['formaction'  => 'setAttrFormAction',
                   'formenctype' => 'setAttrFormEncType',
                   'formmethod'  => 'setAttrFormMethod',
                   'formtarget'  => 'setAttrFormTarget'];

    $input = $this->getControl('button');

    $this->htmlAttributesTest($input, $attributes);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * @inheritdoc
   */
  protected function getControl($name)
  {
    return new SubmitControl($name);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Return submit type for form control.
   *
   * @return string
   */
  protected function getControlType()
  {
    return 'submit';
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
