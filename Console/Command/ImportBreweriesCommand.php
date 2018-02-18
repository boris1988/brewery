<?php

namespace Borisperevyazko\Brewery\Console\Command;

use Borisperevyazko\Brewery\Api\ImportProductManagerInterface;
use Borisperevyazko\Brewery\Api\RequestManagerInterface;
use Borisperevyazko\Brewery\Api\ResponseInterface;

use Magento\Framework\App\State;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ImportBreweriesCommand
 *
 * @package Borisperevyazko\Brewery\Console\Command
 * @author  Boris Perevyazko <borisperevyazko@gmail.com>
 */
class ImportBreweriesCommand extends Command
{
    const COMMAND_NAME = "brewery:import:products";
    const COMMAND_DESCRIPTION = "Import brewery items from brewerydb.com";

    /**
     * @var RequestManagerInterface
     */
    protected $requestManager;

    /**
     * @var ResponseInterface
     */
    protected $response;

    /**
     * @var ImportProductManagerInterface
     */
    protected $importProductManager;

    /**
     * @var State
     */
    protected $state;

    public function __construct(
        RequestManagerInterface $requestManager,
        ResponseInterface $response,
        ImportProductManagerInterface $importProductManager,
        State $state
    ) {
        $this->requestManager = $requestManager;
        $this->response = $response;
        $this->importProductManager = $importProductManager;
        $this->state = $state;
        parent::__construct();
    }
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->state->setAreaCode('adminhtml');

        $this->setName(static::COMMAND_NAME);
        $this->setDescription(static::COMMAND_DESCRIPTION);

        parent::configure();
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Start Import");
        $p = 1;
        /**
         * @TODO - extend logic according to pagination
         */
        $response = $this->requestManager->send('beers',[
            'availableId' => 1,
            'p' => $p
        ])->getResponse();

        if ($response['status'] == 'failure') {
            $output->writeln($response['errorMessage']);
            return false;
        }
        /**
         * @TODO: my api key dont approved so I tested with static data
         */
        $data = [
            'status' => 'success',
            'items' => [
                [
                    'id' => 1,
                    'name' => 'Mobile Phone',
                    'sku' => 'SHK4656',
                    'description' => 'This is good phone'
                ],
                [
                    'id' => 2,
                    'name' => 'Mobile Phone1',
                    'sku' => 'SHK4654',
                    'description' => 'This is good phone1'
                ]
            ]
        ];
        $this->response->setResponse($data);
        $this->importProductManager->import($this->response);
        $output->writeln("Finish Import");
    }
}