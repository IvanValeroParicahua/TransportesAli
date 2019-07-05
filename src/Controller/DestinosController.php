<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Destinos Controller
 *
 * @property \App\Model\Table\DestinosTable $Destinos
 *
 * @method \App\Model\Entity\Destino[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DestinosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Admins']
        ];
        $destinos = $this->paginate($this->Destinos);

        $this->set(compact('destinos'));
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
        $destino = $this->Destinos->get($id, [
            'contain' => ['Admins', 'Boleto', 'Reserva']
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
        $destino = $this->Destinos->newEntity();
        if ($this->request->is('post')) {
            $destino = $this->Destinos->patchEntity($destino, $this->request->getData());
            if ($this->Destinos->save($destino)) {
                $this->Flash->success(__('The destino has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The destino could not be saved. Please, try again.'));
        }
        $admins = $this->Destinos->Admins->find('list', ['limit' => 200]);
        $this->set(compact('destino', 'admins'));
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
        $destino = $this->Destinos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $destino = $this->Destinos->patchEntity($destino, $this->request->getData());
            if ($this->Destinos->save($destino)) {
                $this->Flash->success(__('The destino has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The destino could not be saved. Please, try again.'));
        }
        $admins = $this->Destinos->Admins->find('list', ['limit' => 200]);
        $this->set(compact('destino', 'admins'));
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
        $destino = $this->Destinos->get($id);
        if ($this->Destinos->delete($destino)) {
            $this->Flash->success(__('The destino has been deleted.'));
        } else {
            $this->Flash->error(__('The destino could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
