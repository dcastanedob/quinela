<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    
    public function participantesAction(){
        
        $participantes = \ParticipanteQuery::create()->find();
        
        return new ViewModel(array(
            'participantes' => $participantes
        ));
    }
    public function seleccionAction(){
        $request = $this->getRequest();
         if($request->isPost()){
            
            
            $post_data = $request->getPost();
            $equipos_seleccionados = \ParticipanteQuery::create()->select(array('idequipo'))->find()->toArray();
            $equipos = \EquipoQuery::create()->filterByIdequipo($equipos_seleccionados, \Criteria::NOT_IN)->select(array('equipo_nombre'))->find()->toArray();
            $key_random = array_rand($equipos);
            
            $equipo_nombre = $equipos[$key_random];
            $equipo = \EquipoQuery::create()->filterByEquipoNombre($equipo_nombre)->findOne();
            
            $particiapente = new \Participante;
            $particiapente->setParticipanteNombre(strtoupper($post_data['nombre']))
                          ->setParticipanteEstatus(1)
                          ->setIdequipo($equipo->getIdequipo())
                          ->save();
            
            
            return new ViewModel(array(
                'equipo' => $equipo
            ));
            
 
            
        }else{
            return $this->redirect()->toUrl('/');
        }
    }


    public function indexAction()
    {
        
        $request = $this->getRequest();
        
        $lugares_disponibles = 8 - \ParticipanteQuery::create()->find()->count();
        if($lugares_disponibles == 0){
            return $this->redirect()->toUrl('/participantes');
        }
       
        
     
        return new ViewModel(array(
            'lugares_disponibles' => $lugares_disponibles
        ));
    }
}
