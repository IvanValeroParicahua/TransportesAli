<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Destino Controller
 *
 * @property \App\Model\Table\DestinoTable $Destino
 *
 * @method \App\Model\Entity\Destino[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DestinoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Admin']
        ];
        $destino = $this->paginate($this->Destino);

        $this->set(compact('destino'));
    }

    /**
     * View method
     *
     * @param string|null $id Destino id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $destino = $this->Destino->get($id, [
            'contain' => ['Admin', 'Boleto', 'Reserva']
        ]);

        $this->set('destino', $destino);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $destino = $this->Destino->newEntity();
        if ($this->request->is('post')) {
            $destino = $this->Destino->patchEntity($destino, $this->request->getData());
            if ($this->Destino->save($destino)) {
                $this->Flash->success(__('The destino has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The destino could not be saved. Please, try again.'));
        }
        $admin = $this->Destino->Admin->find('list', ['limit' => 200]);
        $this->set(compact('destino', 'admin'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Destino id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $destino = $this->Destino->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $destino = $this->Destino->patchEntity($destino, $this->request->getData());
            if ($this->Destino->save($destino)) {
                $this->Flash->success(__('The destino has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The destino could not be saved. Please, try again.'));
        }
        $admin = $this->Destino->Admin->find('list', ['limit' => 200]);
        $this->set(compact('destino', 'admin'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Destino id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $destino = $this->Destino->get($id);
        if ($this->Destino->delete($destino)) {
            $this->Flash->success(__('The destino has been deleted.'));
        } else {
            $this->Flash->error(__('The destino could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
