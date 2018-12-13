<?php

namespace App\Command;

    use Symfony\Component\Console\Command\Command;
    use Symfony\Component\Console\Input\InputInterface;
    use Symfony\Component\Console\Output\OutputInterface;
    use Symfony\Component\Console\Input\InputArgument;
    use Symfony\Component\Console\Input\InputOption;
    use Symfony\Component\Console\Helper\ProgressBar;

class GenerateUsersCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected $db;
    protected $faker;

    public function __construct($db, $faker)
    {
        parent::__construct();
        $this->db = $db;
        $this->faker = $faker;
    }

    protected function configure()
    {
        // command create
        $this->setName('seed:users')
            ->setDescription("Be polite. Say hello.")
            ->setHelp('This command will say hello.')
            ->addOption('count', 'c', InputOption::VALUE_REQUIRED, 'How many times do you want to input the repeat', 1);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $progressBar = new ProgressBar($output, $input->getOption('count'));
        $progressBar->start();
        //
        for ($i = 0; $i < $input->getOption('count'); $i++) {
            $output->writeln($this->faker->firstName);
            $progressBar->advance();
        }
        $progressBar->finish();
    }
}