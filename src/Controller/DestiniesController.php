<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Destinies Controller
 *
 * @property \App\Model\Table\DestiniesTable $Destinies
 *
 * @method \App\Model\Entity\Destiny[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DestiniesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Admins']
        ];
        $destinies = $this->paginate($this->Destinies);

        $this->set(compact('destinies'));
    }

    /**
     * View method
     *
     * @param string|null $id Destiny id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $destiny = $this->Destinies->get($id, [
            'contain' => ['Admins', 'Reservations', 'Tickets']
        ]);

        $this->set('destiny', $destiny);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $destiny = $this->Destinies->newEntity();
        if ($this->request->is('post')) {
            $destiny = $this->Destinies->patchEntity($destiny, $this->request->getData());
            if ($this->Destinies->save($destiny)) {
                $this->Flash->success(__('The {0} has been saved.', 'Destiny'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Destiny'));
        }
        $admins = $this->Destinies->Admins->find('list', ['limit' => 200]);
        $this->set(compact('destiny', 'admins'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Destiny id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $destiny = $this->Destinies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $destiny = $this->Destinies->patchEntity($destiny, $this->request->getData());
            if ($this->Destinies->save($destiny)) {
                $this->Flash->success(__('The {0} has been saved.', 'Destiny'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Destiny'));
        }
        $admins = $this->Destinies->Admins->find('list', ['limit' => 200]);
        $this->set(compact('destiny', 'admins'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Destiny id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $destiny = $this->Destinies->get($id);
        if ($this->Destinies->delete($destiny)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Destiny'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Destiny'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
