<?php
/**
 * Frostnet
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this module to newer
 * versions in the future. If you wish to customize this module for your
 * needs please contact Frostnet for more information.
 *
 * @category    Frostnet
 * @package     mage-attribute-script.local
 * @copyright   Copyright (c) 2016 Frostnet
 * @author      Frostnet
 *
 */

class Frostnet_AttributeResourceScriptGenerator_GenerateController extends Mage_Adminhtml_Controller_Action
{
	public function indexAction()
	{
		return $this->_forward('generate');
	}

	public function scriptAction()
	{
		$attributeId = $this->getRequest()->getParam('attribute_id');

		/** @var Frostnet_AttributeResourceScriptGenerator_Model_Generator $generator */
		$generator = Mage::getModel('frostnet_attributeresourcescriptgenerator/generator');
		$generator->generateCode($attributeId);

		// Add message to session
		$this->_getSession()->addSuccess(
			$this->__('Install script was generated and saved in var folder')
		);

		// Redirect to attribute edit page

		$returnUrlEncoded = $this->getRequest()->getParam('return_url');

		$returnUrl = base64_decode($returnUrlEncoded);

		$this->_redirectUrl($returnUrl);
	}
}