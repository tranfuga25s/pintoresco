<?php
App::uses('AppController', 'Controller');
/**
 * Ideas Controller
 *
 * @property Idea $Idea
 */
class IdeasController extends AppController {


	/**
	 * Paginas publicas
	 */
	 public function beforeFilter() {
	 	$this->Auth->allow( array( 'index' ) );
		parent::beforeFilter();
	 }
	 
	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this->Idea->recursive = 0;
		$this->set('ideas', $this->paginate());
	}

	/**
	 * administracion_index method
	 *
	 * @return void
	 */
	public function administracion_index() {
		$this->Idea->recursive = 0;
		$this->set('ideas', $this->paginate());
	}
	
	/**
	 * administracion_add method
	 *
	 * @return void
	 */
	public function administracion_add() {
		if ($this->request->is('post')) {
			$this->Idea->create();
			if ($this->Idea->save($this->request->data)) {
				$this->Session->setFlash(__('The idea has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The idea could not be saved. Please, try again.'));
			}
		}
	}
	
	/**
	 * administracion_edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function administracion_edit($id = null) {
		if (!$this->Idea->exists($id)) {
			throw new NotFoundException(__('Invalid idea'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Idea->save($this->request->data)) {
				$this->Session->setFlash(__('The idea has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The idea could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Idea.' . $this->Idea->primaryKey => $id));
			$this->request->data = $this->Idea->find('first', $options);
		}
	}

	/**
	 * administracion_delete method
	 *
	 * @throws NotFoundException
	 * @throws MethodNotAllowedException
	 * @param string $id
	 * @return void
	 */
	public function administracion_delete($id = null) {
		$this->Idea->id = $id;
		if (!$this->Idea->exists()) {
			throw new NotFoundException(__('Invalid idea'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Idea->delete()) {
			$this->Session->setFlash(__('Idea deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Idea was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
