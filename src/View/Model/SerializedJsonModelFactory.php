<?php


namespace Aeris\ZendRestModule\View\Model;

use Aeris\ZendRestModule\Service\Serializer\SerializerInterface;
use JMS\Serializer\SerializationContext;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class SerializedJsonModelFactory implements FactoryInterface {

	/**
	 * @param ServiceLocatorInterface $serviceLocator
	 * @return SerializationContext
	 */
	public function createService(ServiceLocatorInterface $serviceLocator) {
		/** @var SerializerInterface $serializer */
		$serializer = $serviceLocator->get('Aeris\ZendRestModule\Service\Serializer');

		/** @var SerializationContext $context */
		$context = $serviceLocator
			->create('Aeris\ZendRestModule\Service\Serializer\SerializationContext');

		$jsonModel = new SerializedJsonModel();
		$jsonModel->setSerializer($serializer);
		$jsonModel->setContext($context);

		return $jsonModel;
	}
}