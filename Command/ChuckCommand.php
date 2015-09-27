<?php

namespace KK\Labs\ChuckConsoleBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ChuckCommand extends ContainerAwareCommand
{
	protected function configure()
	{
		$this
			->setName('chuck:fact')
			->setDescription("A Chuck Norris Fact everyday keeps the doctor away")
			->addArgument('firstName', InputArgument::OPTIONAL, 'Replace Chuck by this string', 'Chuck')
			->addArgument('lastName', InputArgument::OPTIONAL, 'Replace Norris by this string', 'Norris')
		;
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$fact = $this->getContainer()->get("kk_labs_chuck_console.fact_service")
			->setFirstName($input->getArgument('firstName'))
			->setLastName($input->getArgument('lastName'))
			->getFact()
		;

		if($fact) {
			$output->writeln($fact);
		}
	}
}
