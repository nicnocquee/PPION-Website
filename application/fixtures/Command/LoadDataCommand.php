<?php
namespace Doctrine\ORM\Tools\Console\Command;
 
use Symfony\Component\Console\Input\InputArgument,
    Symfony\Component\Console\Input\InputOption,
    Symfony\Component\Console,
    Doctrine\ORM\Tools\Console\MetadataFilter,
    Doctrine\ORM\Tools\EntityGenerator,
    Doctrine\ORM\Tools\DisconnectedClassMetadataFactory;
 
class LoadDataCommand extends Console\Command\Command
{
    /**
     * @see Console\Command\Command
     */
    protected function configure()
    {
        $this
        ->setName('load-data')
        ->setDescription(
            'Find and run all SQL files in the fixtures directory.'
        )
        ->setDefinition(array(
            new InputArgument(
                'fixtures-path', InputArgument::OPTIONAL,
                'The path to the fixtures directory. If none is provided, the default (application/fixtures) will be used.'
            )
        ))
        ->setHelp(<<<EOT
Processes the schema and either create it directly on EntityManager Storage Connection or generate the SQL output.
EOT
        );
    }
 
    /**
     * @see Console\Command\Command
     */
    protected function execute(Console\Input\InputInterface $input, Console\Output\OutputInterface $output)
    {
        $em = $this->getHelper('em')->getEntityManager();
 
        // Process destination directory
        if (($fixtures_path = $input->getArgument('fixtures-path')) === null) {
            $fixtures_path = dirname(getcwd()) . '/fixtures';
        }
        $fixtures_path = realpath($fixtures_path);
 
        if ( ! is_dir($fixtures_path)) {
            throw new \InvalidArgumentException(
                sprintf("Fixtures directory '<info>%s</info>' does not exist.", $fixtures_path)
            );
        }
 
        $counter = 0;
        $rsm = new \Doctrine\ORM\Query\ResultSetMapping;
 
        foreach (glob("{$fixtures_path}/*.sql") as $filename)
        {
            $output->write('Found file ' . basename($filename) . '.' . PHP_EOL);
            $sql = file_get_contents($filename);
            $output->write('Loading ' . basename($filename) . '... ' . PHP_EOL);
 
            try
            {
                $errors = FALSE;
                $em->createNativeQuery($sql, $rsm)->execute();
            }
            catch (\PDOException $e)
            {
                $output->write(PHP_EOL . "\t \tError!\t");
                $output->write('Caught a PDOException. (' . $e->getMessage() . ')' . PHP_EOL);
                $output->write("\t \tAttempting to recover... ");
 
                if (is_numeric($e->getCode()))
                {
                    $errors = TRUE;
                    $output->write('Unable to recover. ' . basename($filename) . ' was not fully loaded.');
                }
                else
                {
                    $output->write('Recovery successful!');
                }
 
                $output->write(PHP_EOL . PHP_EOL);
            }
 
            if (! $errors)
            {
                $output->write('Successfully loaded ' . basename($filename) . '!' . PHP_EOL . PHP_EOL);
                $counter++;
            }
        }
 
        $output->write("Finished loading data ({$counter} files processed)" . PHP_EOL);
 
    }
}
