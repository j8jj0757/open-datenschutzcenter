<?php
/**
 * Created by PhpStorm.
 * User: andreas.holzmann
 * Date: 06.06.2020
 * Time: 19:01
 */

namespace App\Service;


use App\Entity\AuditTomZiele;
use App\Entity\DatenweitergabeStand;
use App\Entity\Produkte;
use App\Entity\Team;
use App\Entity\VVTDatenkategorie;
use App\Entity\VVTGrundlage;
use App\Entity\VVTPersonen;
use App\Entity\VVTRisiken;
use App\Entity\VVTStatus;
use Doctrine\ORM\EntityManagerInterface;
use Proxies\__CG__\App\Entity\DatenweitergabeGrundlagen;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Contracts\Translation\TranslatorInterface;


class TeamService
{
    private $em;
    private $router;
    private $translator;

    public function __construct(EntityManagerInterface $entityManager, UrlGeneratorInterface $urlGenerator, TranslatorInterface $translator)
    {
        $this->em = $entityManager;
        $this->router = $urlGenerator;
        $this->translator = $translator;
    }

    function show(Team $team)
    {

        $data = array();

        $id = 1;
        $data1 = $this->em->getRepository(VVTPersonen::class)->findBy(array('activ' => true));
        $data[$id]['title'] = $this->translator->trans('Personengruppen');
        $data[$id]['titleNew'] = $this->translator->trans('Neues Personengruppe hinzufügen');
        $data[$id]['titleEdit'] = $this->translator->trans('Personengruppe bearbeiten');
        $data[$id]['newLink'] = $this->router->generate('team_custom_create', ['title' => $data[$id]['titleNew'], 'type' => $id]);
        $data[$id]['type'] = $id;
        foreach ($data1 as $item) {
            if ($item->getTeam() === $team || $item->getTeam() === null) {
                $data[$id]['data'][$item->getId()]['id'] = $item->getId();
                $data[$id]['data'][$item->getId()]['name'] = $item->getName();
                $data[$id]['data'][$item->getId()]['deactivate'] = $this->router->generate('team_custom_deativate', ['id' => $item->getId(), 'type' => $id]);
                $data[$id]['data'][$item->getId()]['edit'] = $this->router->generate('team_custom_create', ['id' => $item->getId(), 'title' => $data[$id]['titleEdit'], 'type' => $id]);
                $data[$id]['data'][$item->getId()]['default'] = false;
                if ($item->getTeam() === null) {
                    $data[$id]['data'][$item->getId()]['default'] = true;
                }
            }
        }

        $id = 3;
        $data1 = $this->em->getRepository(VVTRisiken::class)->findBy(array('activ' => true));
        $data[$id]['title'] = $this->translator->trans('Risiken der Verarbeitung');
        $data[$id]['titleNew'] = $this->translator->trans('Neues Risiko hinzufügen');
        $data[$id]['titleEdit'] = $this->translator->trans('Risiko bearbeiten');
        $data[$id]['newLink'] = $this->router->generate('team_custom_create', ['title' => $data[$id]['titleNew'], 'type' => $id]);
        foreach ($data1 as $item) {
            if ($item->getTeam() === $team || $item->getTeam() === null) {
                $data[$id]['data'][$item->getId()]['id'] = $item->getId();
                $data[$id]['data'][$item->getId()]['name'] = $item->getName();
                $data[$id]['data'][$item->getId()]['deactivate'] = $this->router->generate('team_custom_deativate', ['id' => $item->getId(), 'type' => $id]);
                $data[$id]['data'][$item->getId()]['edit'] = $this->router->generate('team_custom_create', ['id' => $item->getId(), 'title' => $data[$id]['titleEdit'], 'type' => $id]);
                $data[$id]['data'][$item->getId()]['default'] = false;
                if ($item->getTeam() === null) {
                    $data[$id]['data'][$item->getId()]['default'] = true;
                }
            }
        }

        $id = 4;
        $data1 = $this->em->getRepository(VVTGrundlage::class)->findBy(array('activ' => true));
        $data[$id]['title'] = $this->translator->trans('Gesetzliche Grundlagen für die Verarbeitungen');
        $data[$id]['titleNew'] = $this->translator->trans('Gesetzliche Grundlage hinzufügen');
        $data[$id]['titleEdit'] = $this->translator->trans('Gesetzliche Grundlage bearbeiten');
        $data[$id]['newLink'] = $this->router->generate('team_custom_create', ['title' => $data[$id]['titleNew'], 'type' => $id]);
        foreach ($data1 as $item) {
            if ($item->getTeam() === $team || $item->getTeam() === null) {
                $data[$id]['data'][$item->getId()]['id'] = $item->getId();
                $data[$id]['data'][$item->getId()]['name'] = $item->getName();
                $data[$id]['data'][$item->getId()]['deactivate'] = $this->router->generate('team_custom_deativate', ['id' => $item->getId(), 'type' => $id]);
                $data[$id]['data'][$item->getId()]['edit'] = $this->router->generate('team_custom_create', ['id' => $item->getId(), 'title' => $data[$id]['titleEdit'], 'type' => $id]);
                $data[$id]['data'][$item->getId()]['default'] = false;
                if ($item->getTeam() === null) {
                    $data[$id]['data'][$item->getId()]['default'] = true;
                }
            }
        }

        $id = 5;
        $data1 = $this->em->getRepository(Produkte::class)->findBy(array('activ' => true));
        $data[$id]['title'] = $this->translator->trans('Produkte /Projekte');
        $data[$id]['titleNew'] = $this->translator->trans('Produkt /Projekt hinzufügen');
        $data[$id]['titleEdit'] = $this->translator->trans('Produkt /Projekt bearbeiten');
        $data[$id]['newLink'] = $this->router->generate('team_custom_create', ['title' => $data[$id]['titleNew'], 'type' => $id]);
        foreach ($data1 as $item) {
            if ($item->getTeam() === $team || $item->getTeam() === null) {
                $data[$id]['data'][$item->getId()]['id'] = $item->getId();
                $data[$id]['data'][$item->getId()]['name'] = $item->getName();
                $data[$id]['data'][$item->getId()]['deactivate'] = $this->router->generate('team_custom_deativate', ['id' => $item->getId(), 'type' => $id]);
                $data[$id]['data'][$item->getId()]['edit'] = $this->router->generate('team_custom_create', ['id' => $item->getId(), 'title' => $data[$id]['titleEdit'], 'type' => $id]);
                $data[$id]['data'][$item->getId()]['default'] = false;
                if ($item->getTeam() === null) {
                    $data[$id]['data'][$item->getId()]['default'] = true;
                }
            }
        }


        $id = 6;
        $data1 = $this->em->getRepository(VVTStatus::class)->findBy(array('activ' => true));
        $data[$id]['title'] = $this->translator->trans('VVT Status');
        $data[$id]['titleNew'] = $this->translator->trans('VVT Status hinzufügen');
        $data[$id]['titleEdit'] = $this->translator->trans('VVT Status bearbeiten');
        $data[$id]['newLink'] = $this->router->generate('team_custom_create', ['title' => $data[$id]['titleNew'], 'type' => $id]);
        foreach ($data1 as $item) {
            if ($item->getTeam() === $team || $item->getTeam() === null) {
                $data[$id]['data'][$item->getId()]['id'] = $item->getId();
                $data[$id]['data'][$item->getId()]['name'] = $item->getName();
                $data[$id]['data'][$item->getId()]['deactivate'] = $this->router->generate('team_custom_deativate', ['id' => $item->getId(), 'type' => $id]);
                $data[$id]['data'][$item->getId()]['edit'] = $this->router->generate('team_custom_create', ['id' => $item->getId(), 'title' => $data[$id]['titleEdit'], 'type' => $id]);
                $data[$id]['data'][$item->getId()]['default'] = false;
                if ($item->getTeam() === null) {
                    $data[$id]['data'][$item->getId()]['default'] = true;
                }
            }
        }

        $id = 11;
        $data1 = $this->em->getRepository(DatenweitergabeGrundlagen::class)->findBy(array('activ' => true));
        $data[$id]['title'] = $this->translator->trans('Grundlage für Datenweitergaben');
        $data[$id]['titleNew'] = $this->translator->trans('Grundlage hinzufügen');
        $data[$id]['titleEdit'] = $this->translator->trans('Grundlage bearbeiten');
        $data[$id]['newLink'] = $this->router->generate('team_custom_create', ['title' => $data[$id]['titleNew'], 'type' => $id]);
        foreach ($data1 as $item) {
            if ($item->getTeam() === $team || $item->getTeam() === null) {
                $data[$id]['data'][$item->getId()]['id'] = $item->getId();
                $data[$id]['data'][$item->getId()]['name'] = $item->getName();
                $data[$id]['data'][$item->getId()]['deactivate'] = $this->router->generate('team_custom_deativate', ['id' => $item->getId(), 'type' => $id]);
                $data[$id]['data'][$item->getId()]['edit'] = $this->router->generate('team_custom_create', ['id' => $item->getId(), 'title' => $data[$id]['titleEdit'], 'type' => $id]);
                $data[$id]['data'][$item->getId()]['default'] = false;
                if ($item->getTeam() === null) {
                    $data[$id]['data'][$item->getId()]['default'] = true;
                }
            }
        }

        $id = 12;
        $data1 = $this->em->getRepository(DatenweitergabeStand::class)->findBy(array('activ' => true));
        $data[$id]['title'] = $this->translator->trans('Stände in Datenweitergaben');
        $data[$id]['titleNew'] = $this->translator->trans('Stand hinzufügen');
        $data[$id]['titleEdit'] = $this->translator->trans('Stand bearbeiten');
        $data[$id]['newLink'] = $this->router->generate('team_custom_create', ['title' => $data[$id]['titleNew'], 'type' => $id]);
        foreach ($data1 as $item) {
            if ($item->getTeam() === $team || $item->getTeam() === null) {
                $data[$id]['data'][$item->getId()]['id'] = $item->getId();
                $data[$id]['data'][$item->getId()]['name'] = $item->getName();
                $data[$id]['data'][$item->getId()]['deactivate'] = $this->router->generate('team_custom_deativate', ['id' => $item->getId(), 'type' => $id]);
                $data[$id]['data'][$item->getId()]['edit'] = $this->router->generate('team_custom_create', ['id' => $item->getId(), 'title' => $data[$id]['titleEdit'], 'type' => $id]);
                $data[$id]['data'][$item->getId()]['default'] = false;
                if ($item->getTeam() === null) {
                    $data[$id]['data'][$item->getId()]['default'] = true;
                }
            }
        }


        $id = 21;
        $data1 = $this->em->getRepository(AuditTomZiele::class)->findBy(array('activ' => true));
        $data[$id]['title'] = $this->translator->trans('Schutzziele für Audits');
        $data[$id]['titleNew'] = $this->translator->trans('Schutzziel hinzufügen');
        $data[$id]['titleEdit'] = $this->translator->trans('Schutzziel bearbeiten');
        $data[$id]['newLink'] = $this->router->generate('team_custom_create', ['title' => $data[$id]['titleNew'], 'type' => $id]);
        foreach ($data1 as $item) {
            if ($item->getTeam() === $team || $item->getTeam() === null) {
                $data[$id]['data'][$item->getId()]['id'] = $item->getId();
                $data[$id]['data'][$item->getId()]['name'] = $item->getName();
                $data[$id]['data'][$item->getId()]['deactivate'] = $this->router->generate('team_custom_deativate', ['id' => $item->getId(), 'type' => $id]);
                $data[$id]['data'][$item->getId()]['edit'] = $this->router->generate('team_custom_create', ['id' => $item->getId(), 'title' => $data[$id]['titleEdit'], 'type' => $id]);
                $data[$id]['data'][$item->getId()]['default'] = false;
                if ($item->getTeam() === null) {
                    $data[$id]['data'][$item->getId()]['default'] = true;
                }
            }
        }


        return $data;
    }

    function create($type, $id, Team $team)
    {
        switch ($type) {
            case 1:
                if ($id) {
                    $data1 = $this->em->getRepository(VVTPersonen::class)->find($id);
                } else {
                    $data1 = new VVTPersonen();
                }
                break;
            case 2:
                if ($id) {
                    $data1 = $this->em->getRepository(VVTDatenkategorie::class)->find($id);
                } else {
                    $data1 = new VVTDatenkategorie();
                }
                break;
            case 3:
                if ($id) {
                    $data1 = $this->em->getRepository(VVTRisiken::class)->find($id);
                } else {
                    $data1 = new VVTRisiken();
                }
                break;
            case 4:
                if ($id) {
                    $data1 = $this->em->getRepository(VVTGrundlage::class)->find($id);
                } else {
                    $data1 = new VVTGrundlage();
                }
                break;
            case 5:
                if ($id) {
                    $data1 = $this->em->getRepository(Produkte::class)->find($id);
                } else {
                    $data1 = new Produkte();
                }
                break;
            case 6:
                if ($id) {
                    $data1 = $this->em->getRepository(VVTStatus::class)->find($id);
                } else {
                    $data1 = new VVTStatus();
                }
                break;
            case 11:
                if ($id) {
                    $data1 = $this->em->getRepository(DatenweitergabeGrundlagen::class)->find($id);
                } else {
                    $data1 = new DatenweitergabeGrundlagen();
                }
                break;
            case 12:
                if ($id) {
                    $data1 = $this->em->getRepository(DatenweitergabeStand::class)->find($id);
                } else {
                    $data1 = new DatenweitergabeStand();
                }
                break;
            case 21:
                if ($id) {
                    $data1 = $this->em->getRepository(AuditTomZiele::class)->find($id);
                } else {
                    $data1 = new AuditTomZiele();
                }
                break;
            default:

                break;

        }

        $data1->setActiv(true);
        $data1->setTeam($team);

        return $data1;
    }


    function delete($type, $id)
    {
        switch ($type) {
            case 1:
                $data = $this->em->getRepository(VVTPersonen::class)->findOneBy(array('id' => $id));
                break;
            case 2:
                $data = $this->em->getRepository(VVTDatenkategorie::class)->findOneBy(array('id' => $id));
                break;
            case 3:
                $data = $this->em->getRepository(VVTRisiken::class)->findOneBy(array('id' => $id));
                break;
            case 4:
                $data = $this->em->getRepository(VVTGrundlage::class)->findOneBy(array('id' => $id));
                break;
            case 5:
                $data = $this->em->getRepository(Produkte::class)->findOneBy(array('id' => $id));
                break;
            case 6:
                $data = $this->em->getRepository(VVTStatus::class)->findOneBy(array('id' => $id));
                break;
            case 11:
                $data = $this->em->getRepository(DatenweitergabeGrundlagen::class)->findOneBy(array('id' => $id));
                break;
            case 12:
                $data = $this->em->getRepository(DatenweitergabeStand::class)->findOneBy(array('id' => $id));
                break;
            case 21:
                $data = $this->em->getRepository(AuditTomZiele::class)->findOneBy(array('id' => $id));
                break;

            default:
                break;

        }

        return $data;
    }
}
