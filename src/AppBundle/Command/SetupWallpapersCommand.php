<?php

namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManagerInterface;
use AppBundle\Entity\Wallpaper;

class SetupWallpapersCommand extends Command
{
    private $rootDir;
    private $em;

    public function __construct(string $rootDir, EntityManagerInterface $em)
    {
        parent::__construct();

        $this->rootDir = $rootDir;
        $this->em = $em;
    }

    protected function configure()
    {
        $this
            ->setName('app:setup-wallpapers')
            ->setDescription('Grabs all the local wallpapers and creates a Wallpaper entity for each one.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $wallpapers = glob($this->rootDir . '/../web/images/*.*');
        
        foreach ($wallpapers as $wallpaper) {
            [
                'basename' => $filename,
                'filename' => $slug
            ] = pathinfo($wallpaper);
            [
                0 => $width,
                1 => $height
            ] = getimagesize($wallpaper);

            $wp = (new Wallpaper())
                ->setFilename($filename)
                ->setSlug($slug)
                ->setHeight($height)
                ->setWidth($width);
            
            $this->em->persist($wp);
        }

        $this->em->flush();

        $output->writeln('Command result.');
    }

}
