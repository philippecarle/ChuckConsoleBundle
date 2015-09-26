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
			->addArgument('firstname', InputArgument::OPTIONAL, 'Replace Chuck by this string', 'Chuck')
			->addArgument('lastname', InputArgument::OPTIONAL, 'Replace Norris by this string', 'Norris')
		;
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$fact = $this->getContainer()->get("kk_labs_chuck_console.api_query")
			->setFirstName($input->getArgument('firstname'))
			->setLastName($input->getArgument('lastname'))
			->getFact()
		;

		if($fact) {
			$output->writeln($fact);
		}
	}
}
