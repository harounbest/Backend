<?php

namespace Persona\Hris\Repository\ORM;

use Persona\Hris\Core\Client\Model\ClientInterface;
use Persona\Hris\Core\Client\Model\ClientRepositoryInterface;
use Persona\Hris\Core\Manager\ManagerFactory;
use Persona\Hris\Repository\AbstractRepository;

/**
 * @author Muhamad Surya Iksanudin <surya.iksanudin@personahris.com>
 */
final class ClientRepository extends AbstractRepository implements ClientRepositoryInterface
{
    /**
     * @param ManagerFactory $managerFactory
     * @param string         $class
     */
    public function __construct(ManagerFactory $managerFactory, string  $class)
    {
        parent::__construct($managerFactory, $class);
    }

    /**
     * @param string $apiKey
     *
     * @return ClientInterface|null
     */
    public function findByApiKey(string $apiKey)
    {
        return $this->managerFactory->getReadManager()->getRepository($this->class)->findOneBy(['apiKey' => $apiKey, 'deletedAt' => null]);
    }
}
