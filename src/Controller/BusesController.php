<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Buses Controller
 *
 * @property \App\Model\Table\BusesTable $Buses
 *
 * @method \App\Model\Entity\Bus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BusesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $buses = $this->paginate($this->Buses);

        $this->set(compact('buses'));
    }

    /**
     * View method
     *
     * @param string|null $id Bus id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bus = $this->Buses->get($id, [
            'contain' => ['Tickets']
        ]);

        $this->set('bus', $bus);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bus = $this->Buses->newEntity();
        if ($this->request->is('post')) {
            $bus = $this->Buses->patchEntity($bus, $this->request->getData());
            if ($this->Buses->save($bus)) {
                $this->Flash->success(__('The {0} has been saved.', 'Bus'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Bus'));
        }
        $this->set(compact('bus'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Bus id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bus = $this->Buses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bus = $this->Buses->patchEntity($bus, $this->request->getData());
            if ($this->Buses->save($bus)) {
                $this->Flash->success(__('The {0} has been saved.', 'Bus'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Bus'));
        }
        $this->set(compact('bus'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Bus id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bus = $this->Buses->get($id);
        if ($this->Buses->delete($bus)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Bus'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Bus'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
